<?php
declare(strict_types=1);


namespace App\External\Weather\Request;

use App\External\Shared\Request\AbstractIntegrationRequest;
use App\External\Shared\Request\IntegrationRequestInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class WeatherApiRequest extends AbstractIntegrationRequest implements IntegrationRequestInterface
{
    private const URL = 'https://api.weatherapi.com/v1/forecast.json?key={key}&q={location}&days=1&aqi=yes&alerts=yes';

    private string $location;

    public function __construct(
        #[Autowire(env: 'string:WEATHER_API_KEY')]
        private readonly string $key,
    )
    {
    }

    public function __invoke(string $location): array
    {
        $this->location = $location;
    }

    public function getUrl(): string
    {
        return str_replace(
            ['{key}', '{location}'],
            [$this->key, $this->location],
            self::URL
        );
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
