<?php
declare(strict_types=1);


namespace App\External\Location\DTO;


class Location
{
    public function __construct(
        public string $country,
        public string $countryCode,
        public string $regionCode,
        public string $regionName,
        public string $city,
        public float  $latitude,
        public float  $longitude,
    )
    {

    }
}
