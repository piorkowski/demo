<?php
declare(strict_types=1);


namespace App\External\Weather\Strategy;


interface WeatherCheckerStrategyLocatorInterface
{
    public function locate(string $country): WeatherCheckerStrategyInterface;
}
