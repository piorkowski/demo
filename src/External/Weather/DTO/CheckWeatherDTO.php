<?php
declare(strict_types=1);


namespace App\External\Weather\DTO;


final readonly class CheckWeatherDTO
{
    public function __construct(
        public string $location,
        public ?string $country,
    )
    {
    }

    public function getLocation(): string
    {
        return $this->location . ($this->country ? ', ' . $this->country : '');
    }
}
