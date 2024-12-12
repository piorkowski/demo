<?php
declare(strict_types=1);

namespace App\External\Weather\Service;

use App\External\Weather\DTO\CheckWeatherDTO;
use App\External\Weather\DTO\WeatherDTO;
use App\External\Weather\Strategy\WeatherCheckerStrategyLocatorInterface;

readonly class WeatherService implements WeatherServiceInterface
{
    public function __construct(
        private WeatherCheckerStrategyLocatorInterface $weatherCheckerStrategyLocator
    )
    {
    }

    public function getWeather(CheckWeatherDTO $location): WeatherDTO
    {
        return $this->weatherCheckerStrategyLocator->locate($location->country)->checkWeather($location->getLocation());
    }
}
