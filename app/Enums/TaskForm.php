<?php

namespace App\Enums;

use App\Models\TimeUnit;

enum TaskForm: string
{
    case Instance = 'instance';
    case Definition = 'definition';
}
