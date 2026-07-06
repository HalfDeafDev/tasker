<?php

namespace App\Enums;

use App\Models\TimeUnit;

enum Plurality: string
{
    case Singular = 'singular';
    case Plural = 'plural';
}
