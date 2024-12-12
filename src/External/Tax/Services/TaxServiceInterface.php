<?php
declare(strict_types=1);

namespace App\External\Tax\Services;

interface TaxServiceInterface
{
    public function getTaxRates(): array;
}
