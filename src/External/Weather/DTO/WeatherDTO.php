<?php
declare(strict_types=1);


namespace App\External\Weather\DTO;


class WeatherDTO
{
    public function __construct(
        public string $date,
        public string $condition,
        public string $temperature,
        public string $wind,
        public string $humidity,
        public string $cloud,
        public string $uv,
        public string $maxTemperature,
        public string $minTemperature,
        public string $totalSnow,
        public string $totalPrecipitation,
    )
    {
    }
}
