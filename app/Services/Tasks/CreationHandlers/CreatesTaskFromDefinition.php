<?php

namespace App\Services\Tasks\CreationHandlers;

use App\Models\TaskDefinition;
use App\Models\TaskInstance;
use App\Models\User;

interface CreatesTaskFromDefinition
{
    //
    public function createFromDefinition(TaskDefinition $definition, User $user): TaskInstance;
}
