<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [];


    ########## Accessors / Mutators ##########


    ########## Relations ##########
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    ########## Query ##########


    ########## Scopes ##########


    ########## Libraries ##########


    ########## OverWrite ##########


}
