<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class TaskComponent extends Model
{
    //
    use HasUuids;

    protected $fillable = [
        'task_component_type_id',
        'sort_order',
    ];

    public function componentOwner(): MorphTo
    {
        return $this->morphTo('component_owner');
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
