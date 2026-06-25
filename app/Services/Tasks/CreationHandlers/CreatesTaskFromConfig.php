<?php

namespace App\Services\Tasks\CreationHandlers;

use App\Models\TaskDefinition;
use App\Models\TaskInstance;
use App\Models\User;

interface CreatesTaskFromConfig
{
    //
    public function createFromConfig(Array $config, User $user): TaskInstance;
}
