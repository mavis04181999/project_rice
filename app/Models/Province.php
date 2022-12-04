<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    use HasFactory;

    protected $guarded = [];

    const CREATED_AT = 'initdt';
    const UPDATED_AT = 'upddt';

    public function cities() : HasMany
    {
        return $this->hasMany(City::class);
    }

    public function municipalities() : hasMany
    {
        return $this->hasMany(Municipality::class);
    }
}
