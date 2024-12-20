<?php
declare(strict_types=1);

namespace App\External\Translation\Cache;

use App\External\Translation\DTO\TranslationInputDTO;
use App\External\Translation\DTO\TranslationResultDTO;

interface TranslationCacheAdapterInterface
{
    public function getTranslationFromCache(TranslationInputDTO $inputDTO): ?TranslationResultDTO;
    public function saveTranslationInCache(TranslationInputDTO $inputDTO, TranslationResultDTO $resultDTO): void;
}
