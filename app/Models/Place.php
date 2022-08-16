<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function featurePlaces()
    {
        return $this->hasMany(FeaturePlace::class);
    }

    public function options()
    {
        return $this->belongsToMany(Option::class, 'option_places');
    }

    public function optionPlaces()
    {
        return $this->hasMany(OptionPlace::class);
    }

    public function awards()
    {
        return $this->belongsToMany(Award::class, 'award_places');
    }


    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function favourite()
    {
        return $this->hasMany(FavouritePlace::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function userViews()
    {
        return $this->morphToMany(User::class, 'viewable', 'views')->withPivot('count');
    }
    ########## Query ##########


    public function isOpen()
    {
        $time_now = Carbon::now()->format('H:i:s');
        // dd($time_now, $this->open_at, $this->close_at);
        if ($time_now >= $this->open_at && $time_now <= $this->close_at) {
            return true;
        } else {
            return false;
        }
    }

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
