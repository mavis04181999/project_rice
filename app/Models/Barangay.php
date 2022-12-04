<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barangay extends Model
{
    use HasFactory;

    protected $table = 'barangay';

    protected $guarded = [];

    const CREATED_AT = 'initdt';
    const UPDATED_AT = 'upddt';

    public function city() : BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function municipality() : BelongsTo
    {
        return $this->belongsTo(Municipality::class);
    }
}
