<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyDayValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyDayValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyDayValue query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyDayValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyDayValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyDayValue whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyDayValue whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyDayValue whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FrequencyDayValue extends Model
{
    protected $fillable = [
        'id',
        'name',
        'slug',
    ];
}
