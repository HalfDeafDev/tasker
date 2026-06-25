<?php

namespace App\Services\Tasks\CreationHandlers;

use App\Models\TaskDefinition;
use App\Models\TaskInstance;
use App\Models\User;

class OneOffCreationHandler implements CreatesTaskFromDefinition
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function createFromDefinition(TaskDefinition $definition, User $user): TaskInstance
    {
        return $user->taskInstances()->create([
            'title' => $definition->title,
            'task_type_id' => $definition->task_type_id,
            'due_date' => null,
            'task_definition_id' => $definition->id,
            'active' => true,
            'completed' => false,
        ]);
    }
}
