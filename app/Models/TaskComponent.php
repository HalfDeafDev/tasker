<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

#[Fillable(
    'task_component_type_id', 'sort_order',
)]
class TaskComponent extends Model
{
    //
    use HasUuids;

    public function componentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function content(): MorphTo
    {
        return $this->morphTo();
    }

    public function taskComponentType(): BelongsTo
    {
        return $this->belongsTo(TaskComponentType::class);
    }
}
