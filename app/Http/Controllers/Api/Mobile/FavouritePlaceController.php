<?php

namespace App\Http\Controllers\Api\Mobile;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFavouritPlaceRequest;
use App\Http\Resources\Mobile\FavouritePlaceResource;
use App\Http\Resources\Mobile\PlaceResource;
use App\Models\FavouritePlace;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouritePlaceController extends Controller
{
    public function index()
    {
        $places = array();
        $user_id = Auth::guard('user_api')->user()->id;
        $favouriteplace = FavouritePlace::where('user_id',$user_id)->orderBy('id')->get();

        foreach ($favouriteplace as  $favourite) {
            $place = Place::where('id',$favourite->place_id)->first();
            $places[]=$place;
        }
        return response()->success(
            'this is all FavouritePlace',
            [
                "places" => PlaceResource::collection($places),
            ]
        );
    }

    public function changeStatus($place_id, FavouritePlace $favouritePlace)
    {
       
        $place = Place::find($place_id);
        $userHasPosts = Place::has('favourite')->find($place_id);
        $favourite = FavouritePlace::where('user_id', Auth::guard('user_api')->user()->id)->first();

        if ($userHasPosts && $favourite) {
        
                FavouritePlace::where('place_id',$place_id)->first()->delete();
                return response()->success(
                    'favourite is removed success',
                    [
                        "place" => new PlaceResource($place),
                    ]
                );
            
        } else {
            $favourite = $favouritePlace::create(
                [
                    'place_id' => $place_id,
                    'user_id'  => Auth::guard('user_api')->user()->id
                ]
            );
            return response()->success(
                'favourite is added success',
                [
                    "place" => new PlaceResource($place),
                ]
            );
        }
    }
}
