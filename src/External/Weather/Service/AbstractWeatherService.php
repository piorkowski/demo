<?php
declare(strict_types=1);


namespace App\External\Weather\Service;


use App\External\Shared\Gateway\GatewayInterface;
use App\External\Weather\DTO\WeatherDTO;
use App\External\Weather\Request\WeatherApiRequest;

abstract class AbstractWeatherService
{
    public function __construct(
        protected GatewayInterface $gateway,
    )
    {
    }

    public function getWeather(string $location): WeatherDTO
    {
        $response = $this->gateway->sendRequest(new WeatherApiRequest($location));

        return $this->buildFromResponse($response);
    }

    protected function buildFromResponse(array $response): WeatherDTO
    {
        return new WeatherDTO(
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
        );
    }
}
