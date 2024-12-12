<?php
declare(strict_types=1);


namespace App\External\Tax\Services\Strategy;


use App\External\Tax\DTO\GetTaxesDTO;
use App\External\Tax\DTO\TaxesDTO;

interface TaxCheckStrategyInterface
{
    public function getTaxes(GetTaxesDTO $getTaxesDTO): TaxesDTO;
}
