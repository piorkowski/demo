<?php
declare(strict_types=1);

namespace App\UI\Action;

use App\External\Location\DTO\Location;
use App\External\Location\Service\LocationServiceInterface;
use App\External\Weather\DTO\CheckWeatherDTO;
use App\External\Weather\DTO\WeatherDTO;
use App\External\Weather\Service\WeatherServiceInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/', name: 'homepage', methods: ['GET'])]
readonly class CheckWeatherAction
{
    public function __construct(
        private WeatherServiceInterface $weatherService,
        private LocationServiceInterface $locationService,
    )
    {
    }

    public function __invoke(Request $request): JsonResponse
    {

        return new JsonResponse([$this->getWeatherInVisitorLocation($this->getVisitorLocation($request))]);
    }

    private function getVisitorLocation(Request $request): Location
    {
        return $this->locationService->checkLocationForIP($request->getClientIp());
    }

    private function getWeatherInVisitorLocation(Location $location): WeatherDTO
    {
        return $this->weatherService->getWeather(new CheckWeatherDTO($location->city, $location->country));
    }
}
