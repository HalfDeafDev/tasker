<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class TaskComponent extends Model
{
    //
    use HasUuids;

    public function componentable(): MorphMany
    {
        return $this->morphMany('componentable', 'componentable_type');
    }
}
