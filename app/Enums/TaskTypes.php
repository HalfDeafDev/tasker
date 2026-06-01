<?php

namespace App\Enums;

enum TaskTypes: string
{
    case Habit = 'Habit';
    case OneOff = 'OneOff';
    case Repeating = 'Repeating';
    case Recurring = 'Recurring';
}
