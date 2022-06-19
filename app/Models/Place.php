<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [];


    ########## Accessors / Mutators ##########


    ########## Relations ##########
    public function features()
    {
        return $this->belongsToMany(Feature::class, 'feature_places');
    }

    public function options()
    {
        return $this->belongsToMany(Feature::class, 'feature_places');
    }

    public function awards()
    {
        return $this->belongsToMany(Feature::class, 'award_places');
    }

    ########## Query ##########


    ########## Scopes ##########


    ########## Libraries ##########


    ########## OverWrite ##########


}
