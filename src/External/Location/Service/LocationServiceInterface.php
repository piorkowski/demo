<?php
declare(strict_types=1);


namespace App\External\Location\Service;


use App\External\Location\DTO\Location;

interface LocationServiceInterface
{
    public function checkLocationForIP(string $ip): Location;
}
