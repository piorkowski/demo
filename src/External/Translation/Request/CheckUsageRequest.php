<?php
declare(strict_types=1);

namespace App\External\Translation\Request;

class CheckUsageRequest extends AbstractDeeplRequest
{
    private const URL = 'https://{api}.deepl.com/v2/usage';

    public function getUrl(): string
    {
        return str_replace(
            ['{api}'],
            $this->apiProd ? 'api' : 'api-free' ,
            self::URL
        );
    }
}
