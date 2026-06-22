<?php

namespace App\Models\Contracts;

use App\Models\TaskComponent;
use Illuminate\Database\Eloquent\Relations\MorphMany;

interface HasTaskComponents
{
    /**
     * @return MorphMany<TaskComponent, $this>
     */
    public function components(): MorphMany;
}
