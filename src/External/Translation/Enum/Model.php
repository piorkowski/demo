<?php

namespace App\External\Translation\Enum;

enum Model: string
{
    case PREFER_QUALITY_OPTIMIZED = 'prefer_quality_optimized';
    case QUALITY_OPTIMIZED = 'quality_optimized';
    case LATENCY_OPTIMIZED = 'latency_optimized';

}
