<?php
declare(strict_types=1);

namespace App\External\Translation\Request;

use App\External\Shared\Request\AbstractIntegrationRequest;
use App\External\Shared\Request\IntegrationRequestInterface;
use App\External\Translation\DTO\TranslationInputDTO;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

abstract class AbstractDeeplRequest extends AbstractIntegrationRequest implements IntegrationRequestInterface
{
    public function __construct(
        protected readonly string $apiKey,
        protected readonly bool $apiProd,
        protected readonly ?TranslationInputDTO $translationInput,
        protected readonly ?string $model,
        protected readonly ?string $formality,
    )
    {

    }

    public function getHeaders(): array
    {
        return[
            'Content-Type: application/json',
            'Authorization: DeepL-Auth-Key ' . $this->apiKey,
        ];
    }

    public function getBody(): array
    {
        return [
            'text' => $this->translationInput->message,
            'source_lang' => $this->translationInput->sourceLanguage,
            'target_lang' => $this->translationInput->targetLanguage,
            'formality' => $this->formality,
            'model' => $this->model,
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
}
