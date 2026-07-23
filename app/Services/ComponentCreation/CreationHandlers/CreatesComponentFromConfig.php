<?php

namespace App\Services\ComponentCreation\Creationhandlers;

use App\Models\Contracts\HasTaskComponents;
use App\Models\TaskComponent;

interface CreatesComponentFromConfig
{
    public function createFromConfig(
        HasTaskComponents $task,
        array $config
    ): TaskComponent;
}
