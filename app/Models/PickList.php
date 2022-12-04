<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PickList extends Model
{
    use HasFactory;

    protected $table = 'picklist';
    
    protected $guarded = [];

    const CREATED_AT = 'initdt';
    const UPDATED_AT = 'upddt';

    public function picklistitems() : HasMany
    {
        return $this->hasMany(PickListItem::class);
    }
}
