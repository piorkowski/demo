<?php
declare(strict_types=1);


namespace App\External\Location\Service;


use App\External\Location\DTO\Location;
use App\External\Location\Request\IPLocationApiRequest;
use App\External\Shared\Gateway\GatewayInterface;

readonly class LocationService implements LocationServiceInterface
{
    public function __construct(
        private GatewayInterface $gateway,
    )
    {
    }

    public function checkLocationForIP(string $ip): Location
    {
        $response = $this->gateway->sendRequest(new IPLocationApiRequest($ip));

        return $this->buildLocationFromResponse($response);
    }

    private function buildLocationFromResponse(array $response): Location
    {
        return new Location(
            country: $response['country'],
            countryCode: $response['countryCode'],
            regionCode: $response['regionName'],
            regionName: $response['region'],
            city: $response['city'],
            latitude: $response['lat'],
            longitude: $response['lon'],
        );
    }
}
