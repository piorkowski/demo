<?php
declare(strict_types=1);


namespace App\Shared\Command;


interface CommandBusInterface
{
    public function dispatch(CommandInterface $command): void;
}
