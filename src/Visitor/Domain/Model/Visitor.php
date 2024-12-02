<?php
declare(strict_types=1);


namespace App\Visitor\Domain\Model;


use App\Shared\Model\DomainEventModel;

class Visitor extends DomainEventModel
{
    public function __construct(
        public readonly string $id,
        public readonly string $email,
        public array $visits,
        public \DateTimeInterface $createdAt,
        public \DateTimeInterface $updatedAt
    )
    {
    }


}
