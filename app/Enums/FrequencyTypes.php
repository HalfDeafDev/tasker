<?php

namespace App\Enums;

use App\Models\FrequencyType;
use App\Models\TaskType;

enum FrequencyTypes: string
{
    case Day = 'day';
    case Period = 'period';
    case Time = 'time';

    public function name(): string
    {
        return match ($this) {
            self::Day => 'Day',
            self::Period => 'Period',
            self::Time => 'Time',
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
        return FrequencyType::where('slug', $this->slug())
            ->firstOrFail()
            ->id;
    }
}
