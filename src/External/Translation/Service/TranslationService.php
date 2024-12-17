<?php
declare(strict_types=1);


namespace App\External\Translation\Service;


use App\External\Shared\Gateway\GatewayInterface;
use App\External\Translation\DTO\TranslationInputDTO;
use App\External\Translation\DTO\TranslationResultDTO;

class TranslationService
{
    public function __construct(
        private GatewayInterface $gateway,
    )
    {
    }

    public function translate(TranslationInputDTO $translationInputDTO): TranslationResultDTO
    {

    }
    public function checkIsValidLanguage(TranslationInputDTO $translationInputDTO): bool
    {

    }

    private function check()
    {

    }
}
