<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    protected $guarded = [];

    const CREATED_AT = 'initdt';
    const UPDATED_AT = 'upddt';

    public function province() : BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function barangays() : HasMany
    {
        return $this->hasMany(Barangay::class);
    }
}
