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

    public function userViews()
    {
        return $this->morphToMany(User::class, 'viewable', 'views')->withPivot('count');
    }

    ########## Query ##########


    ########## Scopes ##########


    ########## Libraries ##########

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('city')
            ->useFallbackUrl(config('app.url') . '/images/static/fallback-images/city.jpg');

        $this
            ->addMediaCollection('city_admin')
            ->useFallbackUrl(config('app.url') . '/images/static/fallback-images/city.jpg');

        $this
            ->addMediaCollection('city_user')
            ->useFallbackUrl(config('app.url') . '/images/static/fallback-images/city.jpg');
    }

    ########## OverWrite ##########


}
