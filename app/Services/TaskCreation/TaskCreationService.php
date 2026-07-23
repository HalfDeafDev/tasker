<?php

namespace App\Services\TaskCreation;

use App\Models\TaskDefinition;
use App\Models\TaskInstance;
use App\Models\User;
use App\Services\TaskCreation\CreationHandlers\TaskCreationResolver;

class TaskCreationService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private readonly TaskCreationResolver $taskCreationResolver,
    ) {
        //
    }

    public function createFromDefinition(TaskDefinition $definition, User $user): TaskInstance
    {
        return $this->taskCreationResolver
            ->usingDefinition($definition)
            ->createFromDefinition($definition, $user);
    }

    public function createFromConfig(Array $config, User $user): TaskInstance
    {
        return $this->taskCreationResolver
            ->usingConfig($config)
            ->createFromConfig($config, $user);
    }
}
