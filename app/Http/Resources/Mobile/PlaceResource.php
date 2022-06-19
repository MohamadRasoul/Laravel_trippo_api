<?php

namespace App\Http\Resources\Mobile;

use Illuminate\Http\Resources\Json\JsonResource;


/**
 * @OA\Schema(
 *      title="PlaceResource",
 *      description="PlaceResource body data",
 *      type="object",
 *
 *
 *
 *      @OA\Property(
 *          property="id",
 *          type="string",
 *          example=1
 *      ),
 *      @OA\Property(
 *          property="name",
 *          type="string",
 *          example="Green Table"
 *      ),
 *      @OA\Property(
 *          property="about",
 *          type="string",
 *          example="best coffe to enjoy with your friends"
 *      ),
 *      @OA\Property(
 *          property="address",
 *          type="string",
 *          example="address - address - address"
 *      ),
 *      @OA\Property(
 *          property="latitude",
 *          type="string",
 *          example="33.65166"
 *      ),
 *      @OA\Property(
 *          property="longitude",
 *          type="string",
 *          example="36.5165"
 *      ),
 *      @OA\Property(
 *          property="ratting",
 *          type="string",
 *          example=5
 *      ),
 *      @OA\Property(
 *          property="views",
 *          type="string",
 *          example=59
 *      ),
 *      @OA\Property(
 *          property="web_site",
 *          type="string",
 *          example="www.web_site.com"
 *      ),
 *      @OA\Property(
 *          property="phone_number",
 *          type="string",
 *          example="0958600569"
 *      ),
 *      @OA\Property(
 *          property="email",
 *          type="string",
 *          example="email@email.com"
 *      ),
 *      @OA\Property(
 *          property="open_at",
 *          type="string",
 *          example="10:00:00"
 *      ),
 *      @OA\Property(
 *          property="close_at",
 *          type="string",
 *          example="22:00:00"
 *      ),
 *      @OA\Property(
 *          property="created_at",
 *          type="string",
 *          example="2022-06-06 17:38:54"
 *      ),
 *
 *
 * )
 */
class PlaceResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'about' => $this->about,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'ratting' => $this->ratting,
            'views' => $this->views,
            'web_site' => $this->web_site,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'open_at' => $this->open_at,
            'close_at' => $this->close_at,
            'created_at' => $this->created_at,
        ];
    }
}
