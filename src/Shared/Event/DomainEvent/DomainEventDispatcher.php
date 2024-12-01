<?php
declare(strict_types=1);

namespace App\Shared\Event\DomainEvent;

use App\Domain\Event\DomainEventDispatcherInterface;
use App\Domain\Event\DomainEventInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

readonly class DomainEventDispatcher implements DomainEventDispatcherInterface
{
    public function __construct(
        private EventDispatcherInterface $eventDispatcher
    ) {
    }

    public function dispatch(DomainEventInterface $event): void
    {
        $this->eventDispatcher->dispatch($event);
    }
}
