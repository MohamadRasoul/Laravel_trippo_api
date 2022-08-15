<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanContent extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [];


    ########## Accessors / Mutators ##########


    ########## Relations ##########
    public function plan()
    {
        return $this->belongsTo(PlanContent::class);
    }
 
    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    ########## Query ##########


    ########## Scopes ##########


    ########## Libraries ##########


    ########## OverWrite ##########


}
