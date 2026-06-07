<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TaskComponentType extends Model
{
    //
    use HasUuids;

    public $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function taskComponents(): HasMany
    {
        return $this->hasMany(TaskComponent::class);
    }
}
