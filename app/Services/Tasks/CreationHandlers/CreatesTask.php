<?php

namespace App\Services\Tasks\CreationHandlers;

use App\Models\TaskDefinition;
use App\Models\TaskInstance;

interface CreatesTask
{
    //
    public function instantiate(TaskDefinition $definition, User $user): TaskInstance;
}
