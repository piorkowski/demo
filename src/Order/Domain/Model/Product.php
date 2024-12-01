<?php
declare(strict_types=1);


namespace App\Order\Domain\Model;


class Product
{
    public function __construct(
        public string $id,
        public string $name,
        public int $price,
    )
    {
    }
}
