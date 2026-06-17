<?php

namespace App\Services\Tasks\CreationHandlers;

use App\Models\TaskDefinition;
use App\Models\TaskInstance;
use App\Models\User;

interface CreatesTask
{
    //
    public function instantiate(TaskDefinition $definition, User $user): TaskInstance;
}
