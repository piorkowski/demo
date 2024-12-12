<?php
declare(strict_types=1);


namespace App\External\Weather\Strategy;

use App\External\Weather\Exception\UnableToMatchStrategyException;
use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;

final readonly class WeatherCheckerStrategyLocator implements WeatherCheckerStrategyLocatorInterface
{
    /**
     * @param WeatherCheckerStrategyInterface[] $weatherCheckerStrategies
     */
    public function __construct(
        #[TaggedIterator('weather_checker_strategy')]
        private iterable $weatherCheckerStrategies,
    ) {
    }

    /**
     * @throws UnableToMatchStrategyException
     */
    public function locate(?string $country): WeatherCheckerStrategyInterface
    {
        foreach ($this->weatherCheckerStrategies as $strategy) {
            if ($strategy->supports($country)) {
                return $strategy;
            }
        }

        throw new UnableToMatchStrategyException();
    }
}
