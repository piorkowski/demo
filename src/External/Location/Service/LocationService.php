<?php
declare(strict_types=1);


namespace App\External\Location\Service;


use App\External\Location\DTO\Location;
use App\External\Location\Exception\CannotLocateIpException;
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
        try {
            if ($this->isPrivateIP($ip)) {
                $ip = '156.23.54.102';
            }
            $response = $this->gateway->sendRequest(new IPLocationApiRequest($ip));

            if ('fail' === $response['status']) {
                throw new CannotLocateIpException($response['message']);
            }

            return $this->buildLocationFromResponse($response);
        } catch (\Exception $exception) {

        }
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

    private function isPrivateIP(string $ip): bool
    {
        $privateRanges = [
            '10.0.0.0|10.255.255.255',
            '172.16.0.0|172.31.255.255',
            '192.168.0.0|192.168.255.255',
            '127.0.0.0|127.255.255.255',
            '169.254.0.0|169.254.255.255'
        ];

        $longIp = ip2long($ip);

        if ($longIp === false) {
            return false;
        }

        foreach ($privateRanges as $range) {
            [$start, $end] = explode('|', $range);
            if ($longIp >= ip2long($start) && $longIp <= ip2long($end)) {
                return true;
            }
        }

        return false;
    }
}
