<?php
declare(strict_types=1);


namespace App\Order\Application\Repository;


use App\Order\Domain\Model\Order;
use Symfony\Component\Validator\Constraints\Uuid;

interface OrderReadRepositoryInterface
{
    public function getOrder(Uuid $uuid): Order;
}
