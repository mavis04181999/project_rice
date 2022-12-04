<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Farm extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CascadeSoftDeletes;

    protected $cascadeDeletes = ['farm_extended'];

    protected $guarded = [];

    const CREATED_AT = 'initdt';
    const UPDATED_AT = 'upddt';

    protected $casts = [
        'stressEcosystem' => 'array'
    ];

    public function farmer() : BelongsTo
    {
        return $this->belongsTo(Farmer::class);
    }

    public function farm_extended() : HasOne
    {
        return $this->hasOne(Farm_Extended::class);
    }
}
