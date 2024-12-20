<?php
declare(strict_types=1);

namespace App\External\Translation\Cache;

use App\External\Translation\DTO\TranslationInputDTO;
use App\External\Translation\DTO\TranslationResultDTO;
use App\Shared\Cache\CacheAdapterInterface;
use App\Shared\Cache\CacheEntryInterface;

final readonly class TranslationCacheAdapter
{
    public function __construct(
        private readonly CacheAdapterInterface $cacheAdapter,
    ) {
    }

    public function getTranslationFromCache(TranslationInputDTO $inputDTO): ?TranslationResultDTO
    {
        try {
            $cachedTranslation = $this->cacheAdapter->get(new TranslationCacheQuery($inputDTO));
            if(null !== $cachedTranslation) {
                return new TranslationResultDTO($cachedTranslation['message'], $cachedTranslation['languageCode']);
            }

            return null;
        } catch (\Throwable $exception) {
            return null;
        }
    }

    public function saveTranslationInCache(TranslationInputDTO $inputDTO, TranslationResultDTO $resultDTO): void
    {
        try {
            $this->cacheAdapter->set(new TranslationCacheEntry($inputDTO, $resultDTO));
        } catch (\Throwable $exception) {
        }
    }
}
