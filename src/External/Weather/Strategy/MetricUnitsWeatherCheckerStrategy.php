<?php
declare(strict_types=1);

namespace App\External\Weather\Strategy;

use App\External\Weather\DTO\WeatherDTO;
use App\External\Weather\Enum\ImperialUnitsCountries;
use App\External\Weather\Service\WeatherMetricUnitsService;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('weather_checker_strategy')]
readonly class MetricUnitsWeatherCheckerStrategy implements WeatherCheckerStrategyInterface
{
    public function __construct(
        private WeatherMetricUnitsService $weatherService,
    )
    {
    }

    public function supports(?string $country): bool
    {
        foreach (ImperialUnitsCountries::cases() as $imperialUnitsCountries) {
            if ($imperialUnitsCountries->getCountryCode() !== $country || $imperialUnitsCountries->getCountryName() !== $country) {
                return true;
            }
        }

        return false;
    }

    public function checkWeather(string $location): WeatherDTO
    {
        return $this->weatherService->getWeather($location);
    }
}
