<?php

namespace App\Order\Domain\Enum;

enum OrderStatus: string
{
    case PENDING = 'pending';
    case PROCESSING = 'processing';
    case SHIPPED = 'shipped';
    case DELIVERED = 'delivered';
    case CANCELED = 'canceled';
    case REFUNDED = 'refunded';

    public function isFinal(): bool
    {
        return match ($this) {
            self::DELIVERED, self::CANCELED, self::REFUNDED => true,
            default => false,
        };
    }

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::PROCESSING => 'Processing',
            self::SHIPPED => 'Shipped',
            self::DELIVERED => 'Delivered',
            self::CANCELED => 'Canceled',
            self::REFUNDED => 'Refunded',
        };
    }
}
