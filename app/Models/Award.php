<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Award extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [];


    ########## Accessors / Mutators ##########


    ########## Relations ##########
    public function places()
    {
        return $this->belongsToMany(Place::class, 'award_places');
    }

    ########## Query ##########


    ########## Scopes ##########


    ########## Libraries ##########
   
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('award')
            ->useFallbackUrl(config('app.url') . '/images/static/fallback-images/city.jpg')
            ->singleFile();
    }

    ########## OverWrite ##########


}
