<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StressProneArea extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'stresspronearea';

    protected $guarded = [];

    const CREATED_AT = 'initdt';
    const UPDATED_AT = 'upddt';

    protected $casts = [
        'stressEcosystem' => 'array'
    ];
}
