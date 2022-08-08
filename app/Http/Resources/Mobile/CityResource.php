<?php

namespace App\Http\Resources\Mobile;

use App\Http\Resources\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      title="CityResource",
 *      description="CityResource body data",
 *      type="object",
 *
 *
 *      @OA\Property(
 *          property="id",
 *          type="string",
 *          example="1"
 *      ),
 *      @OA\Property(
 *          property="name",
 *          type="string",
 *          example="Aleppo"
 *      ),
 *      @OA\Property(
 *          property="description",
 *          type="string",
 *          example="Aleppo is a city in Syria, which serves as the capital of the Aleppo Governorate, the most populous Syrian governorate with an official population of 4.6 million in 2010. Aleppo is one of the oldest continuously inhabited cities in the world; it may have been inhabited since the sixth millennium BC"
 *      ),
 *      @OA\Property(
 *          property="latitude",
 *          type="string",
 *          example="36.2021"
 *      ),
 *      @OA\Property(
 *          property="longitude",
 *          type="string",
 *          example="37.1343"
 *      ),
 * 
 *      @OA\Property(
 *         property="data",
 *         @OA\Property(
 *            property="city",
 *            type="object",
 *            ref="#/components/schemas/ImageResource"
 *         ),
 *      ),
 *      @OA\Property(
 *         property="questions",
 *         type="array",
 *         @OA\Items(
 *            type="object",
 *            ref="#/components/schemas/QuestionResource"
 *         )
 *      ),
 * )
 */


class CityResource extends JsonResource
{


    public function toArray($request)
    {
        // return parent::toArray($request);

        $cityImage = $this->getMedia('city')->flatten();
        $cityImageAdmin = $this->getMedia('city_admin')->flatten();
        $images = $cityImage->merge($cityImageAdmin);
        // dd($this->questions());
        return [
            "id"           => $this->id,
            "name"         => $this->name,
            "description"  => $this->description,
            "views"        => $this->views,
            "latitude"     => $this->latitude,
            "longitude"    => $this->longitude,
            "images"       => ImageResource::collection($images),
            "questions"    => QuestionResource::collection($this->questions()->limit(3)->get())
        ];
    }
}
