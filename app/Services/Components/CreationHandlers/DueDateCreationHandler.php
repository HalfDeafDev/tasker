<?php

namespace App\Services\Components\CreationHandlers;

use App\Enums\TaskComponentTypes;
use App\Models\Contracts\HasTaskComponents;
use App\Models\DescriptionComponent;
use App\Models\DueDateRule;
use App\Models\TaskComponent;
use Illuminate\Support\Facades\Validator;
use LogicException;

class DueDateCreationHandler implements CreatesComponentFromConfig, CreatesComponentFromReference
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
        if (! $component->isType(TaskComponentTypes::DueDateRule)) {
            throw new LogicException(
                'DueDateCreationHandler received a component that is not of type '.TaskComponentTypes::DueDateRule->slug().'.');
        }

        /** @var DueDateRule $content */
        $content = $component->assertContentIs(DueDateRule::class);

        return $this->createFromConfig($task, [
            'amount' => $content->amount,
            'unit' => $content->unit,
        ]);
    }

    public function createFromConfig(HasTaskComponents $task, array $config): TaskComponent
    {
        $validator = Validator::make($config, [
            'amount' => ['required', 'numeric', 'min:1'],
            'unit' => ['required', 'exists:time_units,slug'],
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
