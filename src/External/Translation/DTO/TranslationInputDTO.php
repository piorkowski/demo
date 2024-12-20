<?php
declare(strict_types=1);


namespace App\External\Translation\DTO;


final readonly class TranslationInputDTO
{
    public function __construct(
        public string $topic,
        public string $message,
        public string $targetLanguage,
        public ?string $sourceLanguage = null,
    )
    {
    }
}
