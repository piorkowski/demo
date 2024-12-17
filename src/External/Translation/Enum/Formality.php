<?php

namespace App\External\Translation\Enum;

enum Formality: string
{
    case DEFAULT = 'default';
    case MORE = 'more';
    case LESS = 'less';
    case PREFER_MORE = 'prefer_more';
    case PREFER_LESS = 'prefer_less';
}
