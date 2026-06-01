<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskComponent extends Model
{
    //
    use HasUuids;

    public function taskInstance(): BelongsTo
    {
        return $this->belongsTo(TaskInstance::class);
    }
}
