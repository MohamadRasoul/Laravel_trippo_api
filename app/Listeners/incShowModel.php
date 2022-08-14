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
        $user = auth('user_api')->user();
        if (isset($user)) {
            switch ($event->modelType) {
                case ModelEnum::City:
                    $city = $event->modal;
                    $city->views = $city->increment;
                    $city->save();
                    if ($user->cityViews()->where('viewable_id',  $city->id)->exists()) {
                        $user->cityViews()->updateExistingPivot($city->id, ['count' => $city->userViews()->first()->pivot->count + 1]);
                    } else {
                        $user->cityViews()->attach($city->id);
                    }
                    break;
                case ModelEnum::Place:
                    $place = $event->modal;
                    $place->views = $place->increment;
                    $place->save();
                    if ($user->placeViews()->where('viewable_id',  $place->id)->exists()) {
                        $user->placeViews()->updateExistingPivot($place->id, ['count' => $place->userViews()->first()->pivot->count + 1]);
                    } else {
                        $user->placeViews()->attach($place->id);
                    }
                    break;
            }
        }
    }
}
