<?php
declare(strict_types=1);


namespace App\Order\Domain\Model;


use App\Order\Domain\Enum\OrderStatus;
use App\Shared\Model\DomainEventModel;

class Order extends DomainEventModel
{
    /** @param Product[] $products */
    public function __construct(
        public string $id,
        public OrderStatus $status,
        public array $products,
        public \DateTimeInterface $createdAt,
        public \DateTimeInterface $updatedAt,
    )
    {
    }


}
