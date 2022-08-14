<?php

namespace App\Http\Resources\Dashboard;

use App\Http\Resources\ImageResource;
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
 *          example="2022-06-06T17:38:54.000000Z"
 *      ),
 *
 *      @OA\Property(
 *         property="images",
 *         type="array",
 *         @OA\Items(
 *            type="object",
 *            ref="#/components/schemas/ImageResource"
 *         )
 *      ),
 *       @OA\Property(
 *          property="options",
 *          type="array",
 *          @OA\Items(
 *             type="object",
 *             ref="#/components/schemas/OptionResource"
 *          )
 *       ),
 * )
 */
class PlaceResource extends JsonResource
{

    public function toArray($request)
    {

        $placeImage = $this->getMedia('place')->flatten();
        $placeImageAdmin = $this->getMedia('place_admin')->flatten();
        $images = $placeImage->merge($placeImageAdmin);


        // $feature = $this->features()->groupBy(function ($it) {
        //     return $it->content->id;
        // })->map(function ($products, $content_id) {
        //     $content = Content::find($content_id);
        //     return new ContentWithProductResource($content, $products);
        // })->flatten(1);

        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'about'         => $this->about,
            'address'       => $this->address,
            'latitude'      => $this->latitude,
            'longitude'     => $this->longitude,
            'ratting'       => (int)$this->ratting,
            'views'         => (int)$this->views,
            'web_site'      => $this->web_site,
            'phone_number'  => $this->phone_number,
            'email'         => $this->email,
            'open_at'       => $this->open_at,
            'close_at'      => $this->close_at,
            'created_at'    => $this->created_at,
            "images"        => ImageResource::collection($images),
            'options'       => OptionResource::collection($this->options),
            'features'      => OptionResource::collection($this->options),
        ];
    }
}
