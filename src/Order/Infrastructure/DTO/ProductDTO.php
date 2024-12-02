<?php
declare(strict_types=1);


namespace App\Order\Infrastructure\DTO;


use Symfony\Component\Validator\Constraints as Assert;

class ProductDTO
{
    public function __construct(
        #[Assert\NotBlank]
        public string $productName,
        #[Assert\NotBlank]
        public int $quantity,
        #[Assert\NotBlank]
        public int $price,
    )
    {
    }
}
