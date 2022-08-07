<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class City extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [];


    ########## Accessors / Mutators ##########


    ########## Relations ##########
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    ########## Query ##########


    ########## Scopes ##########


    ########## Libraries ##########

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('city')
            ->useFallbackUrl(env('APP_URL') . '/images/static/fallback-images/city.jpg');

        $this
            ->addMediaCollection('city_admin')
            ->useFallbackUrl(env('APP_URL') . '/images/static/fallback-images/city.jpg');
    }

    ########## OverWrite ##########


}
