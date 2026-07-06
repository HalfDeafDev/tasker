<?php

namespace Database\Seeders;

use App\Enums\TimeUnits;
use App\Models\TimeUnit;
use Illuminate\Database\Seeder;

class TimeUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        foreach (TimeUnits::cases() as $timeUnit) {
            TimeUnit::updateOrCreate($timeUnit->seed());
        }
    }
}
