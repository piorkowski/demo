<?php
declare(strict_types=1);


namespace App\External\Translation\Cache;


use App\External\Translation\DTO\TranslationInputDTO;
use App\External\Translation\DTO\TranslationResultDTO;
use App\Shared\Cache\CacheEntryInterface;

final readonly class TranslationCacheEntry implements CacheEntryInterface
{
    private const string GLOBAL_KEY_PREFIX = 'translation';
    private const int TTL = 31557600;

    public function __construct(
        private TranslationInputDTO $translationInputDTO,
        private TranslationResultDTO $translationResultDTO,
    )
    {
    }

    public function getKey(): string
    {
        return sprintf('%s:%s:%s', self::GLOBAL_KEY_PREFIX, $this->translationInputDTO->topic, $this->translationResultDTO->languageCode);
    }

    public function getValue(): string
    {
        return $this->translationResultDTO->message;
    }

    public function getTTL(): int
    {
        return self::TTL;
    }
}
