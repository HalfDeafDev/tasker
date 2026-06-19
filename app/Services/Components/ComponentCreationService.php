<?php

namespace App\Services\Components;

use App\Models\TaskComponent;
use App\Models\TaskInstance;
use App\Models\User;
use App\Services\Components\CreationHandlers\ComponentCreationResolver;
use App\Services\Components\Creationhandlers\CreatesComponent;

class ComponentCreationService
{
    private readonly ComponentCreationResolver $componentCreationResolver;

    /**
     * Create a new class instance.
     */
    public function __construct(
        ComponentCreationResolver $componentCreationResolver,
    )
    {
        $this->componentCreationResolver = $componentCreationResolver;
        //
    }

    public function createFrom(
        TaskComponent $taskComponent,
        TaskInstance $taskInstance,
        User $user
    ): TaskComponent
    {
        return $this->componentCreationResolver
            ->forComponent($taskComponent)
            ->create()
    }
}
