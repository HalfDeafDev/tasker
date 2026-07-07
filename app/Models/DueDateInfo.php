<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DueDateInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DueDateInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DueDateInfo query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DueDateInfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DueDateInfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DueDateInfo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DueDateInfo extends Model
{
    //
    use HasUuids;

    protected $fillable = [
        'due_date',
    ];
}
