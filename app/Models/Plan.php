<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Plan extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [];


    ########## Accessors / Mutators ##########


    ########## Relations ##########

    public function planContents()
    {
        return $this->hasMany(PlanContent::class);
    }

    ########## Query ##########


    ########## Scopes ##########

    public function scopePublic($query)
    {
        return $query->where('is_private', false);
    }

    public function scopePrivate($query)
    {
        return $query->where('completed', true);
    }

    ########## Libraries ##########

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('plan')
            ->useFallbackUrl(config('app.url') . '/images/static/fallback-images/city.jpg')
            ->singleFile();
    }

    ########## OverWrite ##########


}
