<?php

declare(strict_types=1);

namespace App\External\Location\Request;

interface CheckIPLocationInterface
{
    public function getCheckLocationForIP(string $ip): array;
}
