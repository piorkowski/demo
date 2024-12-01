<?php
declare(strict_types=1);


namespace App\External\Location\Request;


class IPLocationApiRequest implements CheckIPLocationInterface
{
    private const URL = 'http://ip-api.com/json//';

    public function getCheckLocationForIP(string $ip): array
    {
        // TODO: Implement getCheckLocationForIP() method.
    }
}
