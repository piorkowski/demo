<?php
declare(strict_types=1);

namespace App\External\Translation\Service;

use App\External\Shared\Gateway\GatewayInterface;
use App\External\Shared\Request\IntegrationRequestInterface;
use App\External\Translation\Cache\TranslationCacheAdapterInterface;
use App\External\Translation\DTO\TranslationInputDTO;
use App\External\Translation\DTO\TranslationResultDTO;
use App\External\Translation\Enum\Formality;
use App\External\Translation\Enum\Model;
use App\External\Translation\Exception\CharacterLimitUsedException;
use App\External\Translation\Exception\TooLongMessageException;
use App\External\Translation\Request\CheckSupportedLanguagesRequest;
use App\External\Translation\Request\CheckUsageRequest;
use App\External\Translation\Request\TranslateRequest;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

readonly class TranslationService implements TranslationServiceInterface
{
    public function __construct(
        private GatewayInterface $gateway,
        private TranslationCacheAdapterInterface $cache,
        #[Autowire(env: 'string:DEEPL_API_KEY')]
        protected readonly string $apiKey,
        #[Autowire(env: 'bool:DEEPL_API_PROD')]
        protected readonly bool $apiProd,
    )
    {
    }

    public function translate(TranslationInputDTO $translationInputDTO): ?TranslationResultDTO
    {
        $translation = $this->processTranslation($translationInputDTO);
    }

    public function translateOfficial(TranslationInputDTO $translationInputDTO): ?TranslationResultDTO
    {
        $translation = $this->processTranslation($translationInputDTO, true);
    }

    protected function processTranslation(TranslationInputDTO $translationInputDTO, bool $official = false): ?TranslationResultDTO
    {
        try {
            $translation = $this->getFromCache($translationInputDTO);
            if (null !== $translation) {
                return $translation;
            }

            $this->checkIsValidLanguage($translationInputDTO);
            $this->validateMessage($translationInputDTO);

            $translationData = $this->gateway->sendRequest($this->prepareTranslationRequest($translationInputDTO, true));
            $translation = new TranslationResultDTO($translationData['text'], $translationData['target_lang']);
            $this->saveResultInCache($translationInputDTO, $translation);

            return $translation;
        } catch (\Exception $exception) {

        }
    }

    private function prepareTranslationRequest(TranslationInputDTO $translationInputDTO, bool $official = false): IntegrationRequestInterface
    {
        return new TranslateRequest(
            $this->apiKey,
            $this->apiProd,
            $translationInputDTO,
            false === $official ? Model::PREFER_QUALITY_OPTIMIZED->value : Model::QUALITY_OPTIMIZED->value,
            false === $official ? Formality::DEFAULT->value : Formality::MORE->value,
        );
    }

    private function checkIsValidLanguage(TranslationInputDTO $translationInputDTO): void
    {
        $supportedLanguages = $this->gateway->sendRequest(new CheckSupportedLanguagesRequest($this->apiKey, $this->apiProd));
    }

    private function validateMessage(TranslationInputDTO $translationInputDTO): void
    {
        if(
            ($this->apiProd === false && strlen($translationInputDTO->message) > 500000) ||
            ($this->apiProd === true && strlen($translationInputDTO->message) > 1000000)) {
            throw new TooLongMessageException();
        }

        $remainLimitData = $this->gateway->sendRequest(new CheckUsageRequest($this->apiKey, $this->apiProd));
        if($remainLimitData['character_limit'] >= $remainLimitData['character_count']){
            throw new CharacterLimitUsedException();
        }

        if (0 > ($remainLimitData['character_limit'] - $remainLimitData['character_count'] - strlen($translationInputDTO->message))) {
            throw new TooLongMessageException();
        }
    }

    private function getFromCache(TranslationInputDTO $translationInputDTO): ?TranslationResultDTO
    {
        $translation = $this->cache->getTranslationFromCache($translationInputDTO);

        return $translation ?? null;
    }

    private function saveResultInCache(TranslationInputDTO $translationInputDTO, TranslationResultDTO $resultDTO): void
    {
        $this->cache->saveTranslationInCache($translationInputDTO, $resultDTO);
    }
}
