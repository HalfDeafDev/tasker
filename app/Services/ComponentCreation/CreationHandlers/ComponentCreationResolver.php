<?php

namespace App\Services\ComponentCreation\CreationHandlers;

use App\Enums\TaskComponentTypes;
use App\Enums\TaskForm;
use App\Models\TaskComponent;

class ComponentCreationResolver
{


    private function mapping(TaskComponentTypes $taskComponentTypes): CreatesComponentFromConfig|CreatesComponentFromReference
    {
        return app(match ($taskComponentTypes) {
            TaskComponentTypes::Description => DescriptionCreationHandler::class,
            TaskComponentTypes::DueDateRule => DueDateRuleHandler::class,
            default => throw new \InvalidArgumentException("Unknown component type & form combination: {$taskComponentTypes->name}"),
        });
    }

    public function forComponent(TaskComponent $taskComponent): CreatesComponentFromReference
    {
        return $this->mapping(TaskComponentTypes::from($taskComponent->componentType->slug));
    }

    public function forComponentType(TaskComponentTypes $taskComponentTypes): CreatesComponentFromConfig
    {
        return $this->mapping($taskComponentTypes);
    }
}
