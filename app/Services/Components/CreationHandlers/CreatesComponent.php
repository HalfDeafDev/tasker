<?php

namespace App\Services\Components\Creationhandlers;


use App\Models\TaskComponent;

interface CreatesComponent
{
    public function create(TaskComponent $taskComponent): TaskComponent;
}
