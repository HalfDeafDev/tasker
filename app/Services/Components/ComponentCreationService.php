<?php

namespace App\Services\Components;

use App\Enums\TaskComponentTypes;
use App\Models\Contracts\HasTaskComponents;
use App\Models\TaskComponent;
use App\Services\Components\CreationHandlers\ComponentCreationResolver;

class ComponentCreationService
{
    private readonly ComponentCreationResolver $componentCreationResolver;

    /**
     * Create a new class instance.
     */
    public function __construct(
        ComponentCreationResolver $componentCreationResolver,
    ) {
        $this->componentCreationResolver = $componentCreationResolver;
        //
    }

    public function createFromReferences(
        TaskComponent $component,
        HasTaskComponents $task,
    ): TaskComponent {
        return $this->componentCreationResolver
            ->forComponent($component)
            ->createFromReference($task, $component);
    }

    public function createFromConfig(
        Array $config,
        TaskComponentTypes $type,
        HasTaskComponents $task,
    ): TaskComponent {
        return $this->componentCreationResolver
            ->forComponentType($type)
            ->createFromConfig($task, $config);
    }
}
