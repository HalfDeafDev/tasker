<?php

namespace App\Enums;

use App\Models\TaskComponentType;

enum TaskComponentTypes: string
{
    case Description = 'description';
    case DueDateRule = 'dueDateRule';

    public function name(): string
    {
        return match ($this) {
            self::Description => 'Description',
            self::DueDateRule => 'Due Date Rule',
        };
    }

    public function slug(): string
    {
        return $this->value;
    }

    public function seed(): array
    {
        return [
            'name' => $this->name(),
            'slug' => $this->value,
        ];
    }

    public function id(): string
    {
        return $this->model()->id;
    }

    public function model(): TaskComponentType
    {
        return TaskComponentType::where('slug', $this->slug())
            ->firstOrFail();
    }
}
