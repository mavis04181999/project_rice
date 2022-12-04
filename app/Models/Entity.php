<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;

    protected $table = 'entity';

    protected $guarded = [];

    const CREATED_AT = 'initdt';
    const UPDATED_AT = 'upddt';
}
