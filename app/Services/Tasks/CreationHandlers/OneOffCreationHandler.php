<?php

namespace App\Services\Tasks\CreationHandlers;

use App\Models\TaskDefinition;
use App\Models\TaskInstance;
use App\Models\User;
use App\Services\Components\ComponentCreationService;

class OneOffCreationHandler implements CreatesTaskFromDefinition
{
    private readonly ComponentCreationService $componentCreationService;

    /**
     * Create a new class instance.
     */
    public function __construct(ComponentCreationService $componentCreationService)
    {
        $this->componentCreationService = $componentCreationService;
    }

    public function createFromDefinition(TaskDefinition $definition, User $user): TaskInstance
    {
        $task = $user->taskInstances()->create([
            'title' => $definition->title,
            'task_type_id' => $definition->task_type_id,
            'due_date' => null,
            'task_definition_id' => $definition->id,
            'active' => true,
            'completed' => false,
        ]);

        $components = $definition->components;

        foreach ($components as $component) {
            $this->componentCreationService
                ->createFromReferences($component, $task);
        }

        return $task;
    }
}
