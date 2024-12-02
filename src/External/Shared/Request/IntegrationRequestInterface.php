<?php
declare(strict_types=1);


namespace App\External\Shared\Request;


interface IntegrationRequestInterface
{
    public function getUrl(): string;
    public function getHeaders(): array;
    public function getBody(): array;
    public function getMethod(): string;
}
