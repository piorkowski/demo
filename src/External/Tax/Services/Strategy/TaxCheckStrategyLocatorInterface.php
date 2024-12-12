<?php
declare(strict_types=1);


namespace App\External\Tax\Services\Strategy;


use App\External\Tax\DTO\GetTaxesDTO;

interface TaxCheckStrategyLocatorInterface
{
    public function locate(GetTaxesDTO $getTaxesDTO): TaxCheckStrategyInterface;
}
