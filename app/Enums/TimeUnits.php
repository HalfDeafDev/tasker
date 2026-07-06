<?php

namespace App\Enums;

use App\Models\TimeUnit;

enum TimeUnits: string
{
    case Second = 'second';
    case Minute = 'minute';
    case Hour = 'hour';
    case Day = 'day';
    case Week = 'week';
    case Month = 'month';
    case Year = 'year';

    public function name(Plurality $plurality = Plurality::Singular): string
    {
        if ($plurality === Plurality::Singular) {
            return match ($this) {
                self::Second => 'Second',
                self::Minute => 'Minute',
                self::Hour => 'Hour',
                self::Day => 'Day',
                self::Week => 'Week',
                self::Month => 'Month',
                self::Year => 'Year',
            };
        }

        return match ($this) {
            self::Second => 'Seconds',
            self::Minute => 'Minutes',
            self::Hour => 'Hours',
            self::Day => 'Days',
            self::Week => 'Weeks',
            self::Month => 'Months',
            self::Year => 'Years',
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
        return TimeUnit::where('slug', $this->slug())
            ->firstOrFail()
            ->id;
    }
}
