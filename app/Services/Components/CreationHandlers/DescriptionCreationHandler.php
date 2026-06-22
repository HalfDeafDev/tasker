<?php

namespace App\Services\Components\CreationHandlers;

use App\Enums\TaskComponentTypes;
use App\Models\Contracts\HasTaskComponents;
use App\Models\DescriptionComponent;
use App\Models\TaskComponent;
use LogicException;

class DescriptionCreationHandler implements CreatesComponentFromConfig, CreatesComponentFromReference
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function validateComponentContent(TaskComponent $taskComponent): DescriptionComponent
    {

    }

    public function createFromReference(HasTaskComponents $task, TaskComponent $component): TaskComponent
    {
        if (! $component->IsType(TaskComponentTypes::Description)) {
            throw new LogicException(
                'DescriptionCreationHandler received a component that is not of type '.TaskComponentTypes::Description->slug().'.');
        }

        $content = $component->content;

        if (! $content instanceof DescriptionComponent) {
            throw new LogicException('Expected Description Type Component');
        }

        $descriptionComponent = DescriptionComponent::create([
            'body' => $content->body,
        ]);

        $descriptionType = TaskComponentTypes::Description->model();

        /** @var TaskComponent $component */
        $component = $task->components()->make([
            'task_component_type_id' => $descriptionType->id,
            'sort_order' => $task->components()->count(),
        ]);

        $component->content()->associate($descriptionComponent);

        $component->save();

        return $component;
    }

    public function createFromConfig(HasTaskComponents $task, array $config): TaskComponent
    {
    }
}
