<?php

namespace App\Enums;

use App\Models\TaskType;

enum TaskTypes: string
{
    case Habit = 'habit';
    case OneOff = 'one-off';
    case Repeating = 'repeating';
    case Recurring = 'recurring';

    public function name(): string
    {
        return match ($this) {
            self::Habit => 'Habit',
            self::OneOff => 'One-off',
            self::Repeating => 'Repeating',
            self::Recurring => 'Recurring',
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
            'slug' => $this->slug(),
        ];
    }

    public function id(): string
    {
        return TaskType::where('slug', $this->slug())
            ->firstOrFail()
            ->id;
    }
}
