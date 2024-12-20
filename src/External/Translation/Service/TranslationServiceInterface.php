<?php
declare(strict_types=1);


namespace App\External\Translation\Service;


use App\External\Shared\Gateway\GatewayInterface;
use App\External\Translation\DTO\TranslationInputDTO;
use App\External\Translation\DTO\TranslationResultDTO;

interface TranslationServiceInterface
{
    public function translate(TranslationInputDTO $translationInputDTO): ?TranslationResultDTO;
    public function translateOfficial(TranslationInputDTO $translationInputDTO): ?TranslationResultDTO;
}
