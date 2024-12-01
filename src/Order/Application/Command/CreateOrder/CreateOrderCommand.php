<?php
declare(strict_types=1);


namespace App\Order\Application\Command\CreateOrder;


use App\Shared\Command\CommandInterface;
use App\UI\DTO\CreateOrderDTO;

final readonly class CreateOrderCommand implements CommandInterface
{
    public function __construct(
        public CreateOrderDTO $createOrderDTO,
        public string $ip,
    )
    {
    }
}
