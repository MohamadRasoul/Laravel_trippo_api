<?php

namespace App\Listeners;

use App\Enums\ModelEnum;
use App\Events\showModel;

class incShowModel
{
    public function __construct()
    {
        //
    }

    public function handle(showModel $event)
    {
        $user = auth('user')->user();
        if (isset($user)) {
            switch ($event->modelType) {
                case ModelEnum::City:
                    $city = $event->modal;
                    $city->views = $city->increment;
                    $city->save();
                    if ($user->citys()->where('viewable_id',  $city->id)->exists()) {
                        $user->citys()->updateExistingPivot($city->id, ['count' => $city->user()->first()->pivot->count + 1]);
                    } else {
                        $user->citys()->attach($city->id, ['count' => 1]);
                    }
                    break;
            }
        }
    }
}
