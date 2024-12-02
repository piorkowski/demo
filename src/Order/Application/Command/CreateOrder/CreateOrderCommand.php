<?php
declare(strict_types=1);


namespace App\Order\Application\Command\CreateOrder;


use App\Order\Infrastructure\DTO\CreateOrderDTO;
use App\Shared\Command\CommandInterface;

final readonly class CreateOrderCommand implements CommandInterface
{
    public function __construct(
        public CreateOrderDTO $createOrderDTO,
        public string $ip,
    )
    {
    }
}
