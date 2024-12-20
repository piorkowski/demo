<?php
declare(strict_types=1);

namespace App\External\Translation\Request;

use App\External\Translation\DTO\TranslationInputDTO;

class TranslateRequest extends AbstractDeeplRequest
{
    private const string URL = 'https://{api}.deepl.com/v2';

    public function getUrl(): string
    {
        return str_replace(
            ['{api}'],
            $this->apiProd ? 'api' : 'api-free' ,
            self::URL
        );
    }
}
