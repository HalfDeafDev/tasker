<?php

namespace App\Services\ComponentCreation\Creationhandlers;


use App\Models\Contracts\HasTaskComponents;
use App\Models\TaskComponent;

interface CreatesComponentFromReference
{
    public function createFromReference(
        HasTaskComponents $task,
        TaskComponent $component
    ): TaskComponent;
}
