<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [];


    ########## Accessors / Mutators ##########


    ########## Relations ##########
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    ########## Query ##########


    ########## Scopes ##########


    ########## Libraries ##########


    ########## OverWrite ##########


}
