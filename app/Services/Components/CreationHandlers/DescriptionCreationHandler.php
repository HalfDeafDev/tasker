<?php

namespace App\Services\Components\CreationHandlers;

use App\Enums\TaskComponentTypes;
use App\Models\Contracts\HasTaskComponents;
use App\Models\DescriptionComponent;
use App\Models\TaskComponent;
use Illuminate\Support\Facades\Validator;
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

    public function createFromReference(HasTaskComponents $task, TaskComponent $component): TaskComponent
    {
        if (! $component->isType(TaskComponentTypes::Description)) {
            throw new LogicException(
                'DescriptionCreationHandler received a component that is not of type '.TaskComponentTypes::Description->slug().'.');
        }

        /** @var DescriptionComponent $content */
        $content = $component->assertContentIs(DescriptionComponent::class);

        return $this->createFromConfig($task, [
            'body' => $content->body,
        ]);
    }

    public function createFromConfig(HasTaskComponents $task, array $config): TaskComponent
    {
        $validator = Validator::make($config, [
            'body' => ['required', 'string'],
        ]);

        $validated = $validator->validate();

        $descriptionComponent = DescriptionComponent::create([
            'body' => $validated['body'],
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
}
