<?php
declare(strict_types=1);

namespace App\External\Location\Request;

use App\External\Shared\Request\AbstractIntegrationRequest;
use App\External\Shared\Request\IntegrationRequestInterface;

class IPLocationApiRequest extends AbstractIntegrationRequest implements IntegrationRequestInterface
{
    private const URL = 'http://ip-api.com/json/{ip}';

    private string $ip;

    public function __construct(string $ip)
    {
        $this->ip = $ip;
    }

    public function getUrl(): string
    {
        return str_replace('{ip}', $this->ip, self::URL);
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
