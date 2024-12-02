<?php
declare(strict_types=1);


namespace App\External\Shared\Gateway;


use App\External\Shared\Request\IntegrationRequestInterface;

interface GatewayInterface
{
        public function sendRequest(IntegrationRequestInterface $request): array;
}
