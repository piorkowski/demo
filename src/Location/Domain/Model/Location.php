<?php
declare(strict_types=1);


namespace App\Location\Domain\Model;


readonly class Location
{
    public function __construct(
        public string $uuid,
        public string $countryCode,
        public string $countryName,
        public string $city,
        public string $longitude,
        public string $latitude,
    )
    {
    }
}
