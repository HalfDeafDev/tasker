<?php

namespace App\Enums;

use App\Models\FrequencyType;
use App\Models\TaskType;

enum FrequencyTypes: string
{
    case Day = 'Day';
    case Period = 'Period';
    case Time = 'Time';

    public function name(): string
    {
        return $this->value;
    }

    public function slug(): string
    {
        return str_replace(' ', '-', strtolower($this->value));
    }

    public function seed(): array
    {
        return [
            'id' => $this->id(),
            'name' => $this->name(),
            'slug' => $this->slug(),
        ];
    }

    public function id(): string
    {
        return match ($this) {
            self::Day => 1,
            self::Period => 2,
            self::Time => 3,
        };
    }
}
