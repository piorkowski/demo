<?php
declare(strict_types=1);

namespace App\External\Weather\Service;

use App\External\Weather\DTO\WeatherDTO;

class WeatherMetricUnitsService extends AbstractWeatherService implements WeatherServiceInterface
{
    protected function buildFromResponse(array $response): WeatherDTO
    {
        return new WeatherDTO(
            date: $response['current']['last_updated'],
            condition: $response['current']['condition']['text'],
            temperature: $response['current']['temp_c'],
            wind: $response['current']['wind_kph'],
            humidity: $response['current']['humidity'],
            cloud: $response['current']['cloud'],
            uv: $response['current']['uv'],
            maxTemperature: $response['current']['forecast']['forecastday']['maxtemp_c'],
            minTemperature: $response['current']['forecast']['forecastday']['mintemp_c'],
            totalSnow: $response['current']['forecast']['forecastday']['totalsnow_cm'],
            totalPrecipitation: $response['current']['forecast']['forecastday']['totalprecip_mm'],

        );
    }
}
