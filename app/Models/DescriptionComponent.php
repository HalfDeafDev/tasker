<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * @property string $id
 * @property string $body
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property-read \App\Models\TaskComponent|null $task
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DescriptionComponent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DescriptionComponent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DescriptionComponent query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DescriptionComponent whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DescriptionComponent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DescriptionComponent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DescriptionComponent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
#[Fillable('body')]
class DescriptionComponent extends Model
{
    //
    use HasUuids;

    public function task(): MorphOne {
        return $this->morphOne(TaskComponent::class, 'content');
    }
}
