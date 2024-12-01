<?php
declare(strict_types=1);

namespace App\Tax\DTO;

use Symfony\Component\Validator\Constraints as Assert;

final class CheckTaxDTO
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Length(exactly: 2)]
        public string $country,
        public ?string $state,
    ) {
    }

}
