<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyPeriodValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyPeriodValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyPeriodValue query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyPeriodValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyPeriodValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyPeriodValue whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyPeriodValue whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FrequencyPeriodValue whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FrequencyPeriodValue extends Model
{
    protected $fillable = [
        'id',
        'name',
        'slug',
    ];
}
