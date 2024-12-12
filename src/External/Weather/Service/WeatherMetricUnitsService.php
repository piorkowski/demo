<?php
declare(strict_types=1);

namespace App\External\Weather\Service;

use App\External\Weather\DTO\WeatherDTO;

class WeatherMetricUnitsService extends AbstractWeatherService
{
    protected function buildFromResponse(array $response): WeatherDTO
    {
        return new WeatherDTO(
            date: $response['current']['last_updated'],
            condition: $response['current']['condition']['text'],
            temperature: (string)$response['current']['temp_c'],
            wind: (string)$response['current']['wind_kph'],
            humidity: (string)$response['current']['humidity'],
            cloud: (string)$response['current']['cloud'],
            uv: (string)$response['current']['uv'],
            maxTemperature: (string)$response['forecast']['forecastday'][0]['day']['maxtemp_c'],
            minTemperature: (string)$response['forecast']['forecastday'][0]['day']['mintemp_c'],
            totalSnow: (string)$response['forecast']['forecastday'][0]['day']['totalsnow_cm'],
            totalPrecipitation: (string)$response['forecast']['forecastday'][0]['day']['totalprecip_mm'],

        );
    }
}
