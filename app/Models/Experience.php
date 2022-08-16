<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Experience extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [];


    ########## Accessors / Mutators ##########


    ########## Relations ##########

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function places()
    {
        return $this->belongsToMany(Place::class, 'experience_contents');
    }

    ########## Query ##########


    ########## Scopes ##########


    ########## Libraries ##########

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('experience')
            ->useFallbackUrl(config('app.url') . '/images/static/fallback-images/city.jpg');
    }

    ########## OverWrite ##########


}
