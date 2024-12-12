<?php
declare(strict_types=1);

namespace App\External\Weather\Service;

use App\External\Weather\DTO\WeatherDTO;

class WeatherImperialUnitsService extends AbstractWeatherService
{
    protected function buildFromResponse(array $response): WeatherDTO
    {
        return new WeatherDTO(
            date: $response['current']['last_updated'],
            condition: $response['current']['condition']['text'],
            temperature: (string)$response['current']['temp_f'],
            wind: (string)$response['current']['wind_mph'],
            humidity: (string)$response['current']['humidity'],
            cloud: (string)$response['current']['cloud'],
            uv: (string)$response['current']['uv'],
            maxTemperature: (string)$response['forecast']['forecastday']['maxtemp_f'],
            minTemperature: (string)$response['forecast']['forecastday']['mintemp_f'],
            totalSnow: (string)$response['forecast']['forecastday']['totalsnow_cm'],
            totalPrecipitation: (string)$response['forecast']['forecastday']['totalprecip_in'],

        );
    }
}
