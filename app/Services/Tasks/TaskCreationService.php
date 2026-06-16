<?php

namespace App\Services\Tasks;

use App\Models\TaskDefinition;
use App\Models\TaskInstance;
use App\Models\User;
use App\Services\Tasks\CreationHandlers\TaskCreationResolver;

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

    public function instantiate(TaskDefinition $definition, User $user): TaskInstance
    {
        return $this->taskCreationResolver
            ->forDefinition($definition)
            ->instantiate($definition, $user);
    }
}
