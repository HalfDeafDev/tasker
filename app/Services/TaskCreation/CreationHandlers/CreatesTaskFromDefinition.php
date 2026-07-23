<?php

namespace App\Services\TaskCreation\CreationHandlers;

use App\Models\TaskDefinition;
use App\Models\TaskInstance;
use App\Models\User;

interface CreatesTaskFromDefinition
{
    //
    public function createFromDefinition(TaskDefinition $definition, User $user): TaskInstance;
}
