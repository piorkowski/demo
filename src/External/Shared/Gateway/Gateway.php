<?php
declare(strict_types=1);


namespace App\External\Shared\Gateway;


use App\External\Shared\Request\IntegrationRequestInterface;
use Symfony\Component\HttpClient\HttpClient;

class Gateway
{
    public function __construct(
        HttpClient $httpClient,
    )
    {
    }

    public function sendRequest(IntegrationRequestInterface $request)
    {

    }
}
