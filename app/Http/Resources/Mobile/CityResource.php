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
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="name",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="description",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="latitude",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="longitude",
 *          type="string"
 *      ),
 *
 *
 *      example={
 *           "id": 11,
 *           "name": "Aleppo",
 *           "description": "Aleppo is a city in Syria, which serves as the capital of the Aleppo Governorate, the most populous Syrian governorate with an official population of 4.6 million in 2010. Aleppo is one of the oldest continuously inhabited cities in the world; it may have been inhabited since the sixth millennium BC",
 *           "latitude": "36.2021",
 *           "longitude": "37.1343",
 *      }
 * )
 */


class CityResource extends JsonResource
{


    public function toArray($request)
    {
//        return parent::toArray($request);

        return [
            "id"           => $this->id,
            "name"         => $this->name,
            "description"  => $this->description,
            "images"       => ImageResource::collection($this->getMedia('city')->flatten()),
            "latitude"     => $this->latitude,
            "longitude"    => $this->longitude,
        ];
    }
}
