<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements JWTSubject, HasMedia

{
    use HasFactory, Notifiable, InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_of_birthday'  => 'datetime',
    ];

    ########## Accessors / Mutators ##########


    ########## Relations ##########
    public function cityViews()
    {
        return $this->morphedByMany(City::class, 'viewable', 'views')->withPivot('count');
    }

    public function placeViews()
    {
        return $this->morphedByMany(Place::class, 'viewable', 'views')->withPivot('count');
    }

    public function favoritesPlace()
    {
        return $this->hasMany(FavouritePlace::class);
    }

    public function plans()
    {
        return $this->hasMany(plan::class);
    }

    public function notifications()
    {
        return $this->belongsToMany(Notification::class, "user_notification")->withTimestamps();
    }



    ########## Query ##########


    ########## Scopes ##########


    ########## Libraries ##########

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('user')
            ->useFallbackUrl(config('app.url') . '/images/static/fallback-images/city.jpg')
            ->singleFile();

        $this
            ->addMediaCollection('idfront')
            ->useFallbackUrl(config('app.url') . '/images/static/fallback-images/city.jpg')
            ->singleFile();

        $this
            ->addMediaCollection('idback')
            ->useFallbackUrl(config('app.url') . '/images/static/fallback-images/city.jpg')
            ->singleFile();
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    ########## OverWrite ##########

}
