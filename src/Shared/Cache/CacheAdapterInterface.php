<?php
declare(strict_types=1);

namespace App\Shared\Cache;

interface CacheAdapterInterface
{
    public function get(CacheEntryInterface $cacheEntry): ?array;

    public function set(CacheEntryInterface $cacheEntry): void;
}
