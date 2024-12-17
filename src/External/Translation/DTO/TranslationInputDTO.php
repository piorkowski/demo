<?php
declare(strict_types=1);


namespace App\External\Translation\DTO;


final readonly class TranslationInputDTO
{
    public function __construct(
        public string $message,
        public ?string $sourceLanguage = null,
        public string $targetLanguage,
    )
    {
    }
}
