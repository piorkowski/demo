<?php
declare(strict_types=1);

namespace App\External\Shared\Gateway;

use App\External\Shared\Request\IntegrationRequestInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

readonly class Gateway implements GatewayInterface
{
    public function __construct(
        private HttpClientInterface $httpClient,
    )
    {
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function sendRequest(IntegrationRequestInterface $request): array
    {
        $response = $this->httpClient->request(
            $request->getMethod(),
            $request->getUrl(),
            [
                'headers' => $request->getHeaders(),
                'json' => $request->getBody(),
            ]
        );

        return $response->toArray();
    }
}
