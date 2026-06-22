<?php

namespace App\Services\Components\Creationhandlers;


use App\Models\Contracts\HasTaskComponents;
use App\Models\TaskComponent;

interface CreatesComponentFromReference
{
    public function createFromReference(
        HasTaskComponents $task,
        TaskComponent $component
    ): TaskComponent;
}
