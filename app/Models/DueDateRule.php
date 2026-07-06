<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $id
 * @property int $amount
 * @property string $unit
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property-read \App\Models\TaskDefinition|null $definition
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DueDateRule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DueDateRule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DueDateRule query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DueDateRule whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DueDateRule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DueDateRule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DueDateRule whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DueDateRule whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DueDateRule extends Model
{
    use HasUuids;
    protected $fillable = [
        'task_definition_id',
        'unit',
        'amount',
    ];

    public function definition(): BelongsTo
    {
        return $this->belongsTo(TaskDefinition::class);
    }
}
