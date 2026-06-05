<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

#[Fillable('body')]
class DescriptionComponent extends Model
{
    //
    use HasUuids;

    public function task(): MorphOne {
        return $this->morphOne(TaskComponent::class, 'content');
    }
}
