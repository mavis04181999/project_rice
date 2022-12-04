<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Farm_Extended extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'farm_extended';

    protected $guarded = [];

    protected $casts = [
        'page3_source_id' => 'array',
        'page3_frequency' => 'array',
        'page3_occurenceofflood_ds_months' => 'array',
        'page3_occurenceofflood_ws_months' => 'array',

        'page4_source_id' => 'array',
        'page4_frequency' => 'array',
        'page4_occurenceofsalinity_ds_months' => 'array',
        'page4_occurenceofsalinity_ws_months' => 'array',
        'page4_checkbox_sourceOfIrrigation' => 'array',
        'page4_sourceOfIrrigation_saltfree' => 'array',
        'page4_indicatorofsalinity' => 'array',

        'page5_frequency' => 'array',
        'page5_occurenceofdrought_ds_months' => 'array',
        'page5_occurenceofdrought_ws_months' => 'array',
        'page5_checkbox_sourceOfIrrigation' => 'array',
        'page5_sourceOfIrrigation_saltfree' => 'array',
        'page5_indicatorofdrought' => 'array',
    ];

    const CREATED_AT = 'initdt';
    const UPDATED_AT = 'upddt';

    public function farm() : BelongsTo
    {
        return $this->belongsTo(Farm::class);
    }
}
