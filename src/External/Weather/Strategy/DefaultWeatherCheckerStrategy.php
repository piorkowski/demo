<?php
declare(strict_types=1);


namespace App\External\Weather\Strategy;

use App\External\Weather\DTO\WeatherDTO;
use App\External\Weather\Service\WeatherMetricUnitsService;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('weather_checker_strategy')]
readonly class DefaultWeatherCheckerStrategy implements WeatherCheckerStrategyInterface
{
    public function __construct(
        private WeatherMetricUnitsService $weatherService,
    )
    {
    }

    public function supports(?string $country): bool
    {
        return $country === null;
    }

    public function checkWeather(string $location): WeatherDTO
    {
        return $this->weatherService->getWeather($location);
    }
}
