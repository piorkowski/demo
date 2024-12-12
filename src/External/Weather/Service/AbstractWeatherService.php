<?php
declare(strict_types=1);


namespace App\External\Weather\Service;


use App\External\Shared\Gateway\GatewayInterface;
use App\External\Weather\DTO\WeatherDTO;
use App\External\Weather\Request\WeatherApiRequest;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

abstract class AbstractWeatherService
{
    public function __construct(
        protected GatewayInterface $gateway,
        #[Autowire(env: 'string:WEATHER_API_KEY')]
        protected readonly string $key,
    )
    {
    }

    public function getWeather(string $location): WeatherDTO
    {
        $response = $this->gateway->sendRequest(new WeatherApiRequest($this->key, $location));

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
