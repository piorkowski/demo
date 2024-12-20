<?php
declare(strict_types=1);


namespace App\External\Translation\Cache;


use App\External\Translation\DTO\TranslationInputDTO;
use App\External\Translation\DTO\TranslationResultDTO;
use App\Shared\Cache\CacheEntryInterface;
use App\Shared\Cache\CacheQueryInterface;

final readonly class TranslationCacheQuery implements CacheQueryInterface
{
    private const string GLOBAL_KEY_PREFIX = 'translation';

    public function __construct(
        private TranslationInputDTO $translationInputDTO,
    )
    {
    }

    public function getKey(): string
    {
        return sprintf('%s:%s:%s', self::GLOBAL_KEY_PREFIX, $this->translationInputDTO->topic, $this->translationInputDTO->targetLanguage);
    }
}
