<?php
declare(strict_types=1);

namespace App\External\Weather\Service;

use App\External\Weather\DTO\WeatherDTO;

interface WeatherServiceInterface
{
    public function getWeather(string $location): WeatherDTO;
}
