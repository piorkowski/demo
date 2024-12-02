<?php
declare(strict_types=1);


namespace App\Visitor\Domain\Model;


use App\Shared\Model\DomainEventModel;

class Visit extends DomainEventModel
{
    public function __construct(
        public readonly string $id,
        public readonly string $ip,
        public readonly Location $location,

    )
    {
    }
}
