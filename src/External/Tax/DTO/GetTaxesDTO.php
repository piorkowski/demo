<?php
declare(strict_types=1);


namespace App\External\Tax\DTO;


final readonly class GetTaxesDTO
{
    public function __construct(
        public string $country,
        public ?string $state,
    )
    {
    }
}
