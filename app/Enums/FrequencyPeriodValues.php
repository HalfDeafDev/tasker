<?php

namespace App\Enums;

enum FrequencyPeriodValues: string
{
    case Minute = 'Minute';
    case Hour = 'Hour';
    case Day = 'Day';
    case Week = 'Week';
    case Month = 'Month';
    case Quarter = 'Quarter';
    case HalfAnnual = 'Half Annual';
    case Annual = 'Annual';

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
            self::Minute => 1,
            self::Hour => 2,
            self::Day => 3,
            self::Week => 4,
            self::Month => 5,
            self::Quarter => 6,
            self::HalfAnnual => 7,
            self::Annual => 8,
        };
    }
}
