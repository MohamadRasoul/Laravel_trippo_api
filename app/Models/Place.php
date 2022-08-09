<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Place extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

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

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    ########## Query ##########


    ########## Scopes ##########


    ########## Libraries ##########

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('place')
            ->useFallbackUrl(config('app.url') . '/images/static/fallback-images/place.jpg');
        $this
            ->addMediaCollection('place_admin')
            ->useFallbackUrl(config('app.url') . '/images/static/fallback-images/place.jpg');
        $this
            ->addMediaCollection('place_user')
            ->useFallbackUrl(config('app.url') . '/images/static/fallback-images/place.jpg');
    }

    ########## OverWrite ##########


}
