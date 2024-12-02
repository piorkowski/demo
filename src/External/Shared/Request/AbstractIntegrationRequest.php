<?php
declare(strict_types=1);


namespace App\External\Shared\Request;


class AbstractIntegrationRequest
{

    public function getUrl(): string
    {
        return '';
    }

    public function getHeaders(): array
    {
        return [];
    }

    public function getBody(): array
    {
        return [];
    }

    public function getMethod(): string
    {
        return '';
    }
}
