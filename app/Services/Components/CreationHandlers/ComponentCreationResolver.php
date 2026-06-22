<?php

namespace App\Services\Components\CreationHandlers;

use App\Enums\TaskComponentTypes;
use App\Models\TaskComponent;

class ComponentCreationResolver
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function forComponent(TaskComponent $taskComponent): CreatesComponentFromReference
    {
        return match ($taskComponent->type) {
            TaskComponentTypes::Description => app(DescriptionCreationHandler::class),
        };
    }
}
