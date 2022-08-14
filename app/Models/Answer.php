<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [];


    ########## Accessors / Mutators ##########


    ########## Relations ##########
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    ########## Query ##########


    ########## Scopes ##########


    ########## Libraries ##########


    ########## OverWrite ##########


}
