<?php
declare(strict_types=1);


namespace App\External\Weather\Request;


class WeatherApiRequest
{
    private const URL = 'https://api.weatherapi.com/v1/forecast.json?key={key}&q={location}&days=1&aqi=yes&alerts=yes';
}
