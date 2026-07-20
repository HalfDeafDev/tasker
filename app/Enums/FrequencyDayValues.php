<?php

namespace App\Enums;

enum FrequencyDayValues: string
{
    case Monday = 'Monday';
    case Tuesday = 'Tuesday';
    case Wednesday = 'Wednesday';
    case Thursday = 'Thursday';
    case Friday = 'Friday';
    case Saturday = 'Saturday';
    case Sunday = 'Sunday';

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

    public function id(): int
    {
        return match ($this) {
            self::Monday => 1,
            self::Tuesday => 2,
            self::Wednesday => 3,
            self::Thursday => 4,
            self::Friday => 5,
            self::Saturday => 6,
            self::Sunday => 7
        };
    }
}
