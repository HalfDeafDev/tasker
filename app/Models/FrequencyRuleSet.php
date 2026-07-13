<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class FrequencyRuleSet extends Model
{
    protected $fillable = [
        'name',
    ];

    public function frequencyOwner(): MorphTo
    {
        return $this->morphTo('frequency_owner');
    }
}
