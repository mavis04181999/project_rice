<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PickListItem extends Model
{
    use HasFactory;

    protected $table = 'picklistitem';

    protected $guarded = [];

    const CREATED_AT = 'initdt';
    const UPDATED_AT = 'upddt';

    public function picklist() : BelongsTo
    {
        return $this->belongsTo(PickList::class);
    }

    public function scopeCivilStatus($query)
    {
        return $query->where('pick_list_id', 1);
    }

    public function scopeEducation($query)
    {
        return $query->where('pick_list_id', 2);
    }

    public function scopeFrequency($query)
    {
        return $query->where('pick_list_id', 3);
    }

    public function scopeIndicatorOfDrought($query)
    {
        return $query->where('pick_list_id', 4);
    }

    public function scopeIndicatorOfSalinity($query)
    {
        return $query->where('pick_list_id', 5);
    }

    public function scopeLandTenurialStatus($query)
    {
        return $query->where('pick_list_id', 6);
    }

    public function scopeMonths($query)
    {
        return $query->where('pick_list_id', 7);
    }
    
    public function scopeSourceOfFloods($query)
    {
        return $query->where('pick_list_id', 8);
    }

    public function scopeSourceOfIrrigation($query)
    {
        return $query->where('pick_list_id', 9);
    }

    public function scopeSourceOfSalinity($query)
    {
        return $query->where('pick_list_id', 10);
    }
}
