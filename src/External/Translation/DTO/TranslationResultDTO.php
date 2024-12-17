<?php
declare(strict_types=1);


namespace App\External\Translation\DTO;


final readonly class TranslationResultDTO
{
    public function __construct(
        public string $message,
        public string $languageCode,
    )
    {
    }
}
