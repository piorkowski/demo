<?php
declare(strict_types=1);


namespace App\Order\Infrastructure\DTO;


use Symfony\Component\Validator\Constraints as Assert;

class CreateOrderDTO
{
    /** @param ProductDTO[] $products */
    public function __construct(
        #[Assert\Email]
        #[Assert\NotBlank]
        public string $email,
        public array $products = [],
    )
    {
    }
}
