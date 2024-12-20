<?php
declare(strict_types=1);

namespace App\External\Translation\Request;

use App\External\Translation\DTO\TranslationInputDTO;

class CheckUsageRequest extends AbstractDeeplRequest
{
    private const string URL = 'https://{api}.deepl.com/v2/usage';

    public function __construct(string $apiKey, bool $apiProd)
    {
        parent::__construct($apiKey, $apiProd, null, null, null);
    }

    public function getUrl(): string
    {
        return str_replace(
            ['{api}'],
            $this->apiProd ? 'api' : 'api-free' ,
            self::URL
        );
    }
}
