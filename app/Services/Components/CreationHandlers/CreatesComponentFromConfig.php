<?php

namespace App\Services\Components\Creationhandlers;

use App\Models\Contracts\HasTaskComponents;
use App\Models\TaskComponent;

interface CreatesComponentFromConfig
{
    public function createFromConfig(
        HasTaskComponents $task,
        array $config
    ): TaskComponent;
}
