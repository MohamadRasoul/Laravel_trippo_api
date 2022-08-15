<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Comment extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [];


    ########## Accessors / Mutators ##########


    ########## Relations ##########
    public function visitType()
    {
        return $this->belongsTo(VisitType::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    ########## Query ##########


    ########## Scopes ##########


    ########## Libraries ##########

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('comment')
            ->useFallbackUrl(config('app.url') . '/images/static/fallback-images/city.jpg');
    }

    ########## OverWrite ##########


}
