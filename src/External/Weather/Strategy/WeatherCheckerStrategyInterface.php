<?php
declare(strict_types=1);


namespace App\External\Weather\Strategy;


use App\External\Weather\DTO\WeatherDTO;

interface WeatherCheckerStrategyInterface
{
    public function supports(?string $country) : bool;

    public function checkWeather(string $location): WeatherDTO;
}
