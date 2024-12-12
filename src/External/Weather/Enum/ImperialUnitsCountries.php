<?php

declare(strict_types=1);

namespace App\External\Weather\Enum;

enum ImperialUnitsCountries: string
{
    case US = 'United States';
    case BS = 'Bahamas';
    case KY = 'Cayman Islands';
    case LR = 'Liberia';
    case BZ = 'Belize';

    public function getCountryCode(): string
    {
        return match ($this) {
            self::US => 'US',
            self::BS => 'BS',
            self::KY => 'KY',
            self::LR => 'LR',
            self::BZ => 'BZ',
        };
    }

    public function getCountryName(): string
    {
        return $this->value;
    }
}
