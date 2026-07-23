<?php

namespace App\Services\TaskCreation\CreationHandlers;

use App\Models\TaskDefinition;
use App\Models\TaskInstance;
use App\Models\User;

interface CreatesTaskFromConfig
{
    //
    public function createFromConfig(Array $config, User $user): TaskInstance;
}
