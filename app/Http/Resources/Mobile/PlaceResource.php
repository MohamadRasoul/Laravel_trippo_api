<?php

namespace App\Http\Resources\Mobile;

use App\Http\Resources\Dashboard\FeatureResource;
use App\Http\Resources\ImageResource;
use App\Models\FavouritePlace;
use App\Models\FeatureTitle;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

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
 *      @OA\Property(
 *         property="images",
 *         type="array",
 *         @OA\Items(
 *            type="object",
 *            ref="#/components/schemas/ImageResource"
 *         )
 *      ),
 *      @OA\Property(
 *         property="awards",
 *         type="array",
 *         @OA\Items(
 *            type="object",
 *            ref="#/components/schemas/AwardResource"
 *         )
 *      ),
 *      @OA\Property(
 *          property="options",
 *          type="array",
 *          @OA\Items(
 *             type="object",
 *             ref="#/components/schemas/OptionResource"
 *          )
 *       ),
 *       @OA\Property(
 *          property="features",
 *          type="object",
 *          @OA\Property(
 *             property="Miss Eliza Emard Sr.",
 *             type="array",
 *             @OA\Items(
 *                type="object",
 *                ref="#/components/schemas/FeatureResource"
 *             )
 *          ),
 *          @OA\Property(
 *             property="Lexus Cronin PhD",
 *             type="array",
 *             @OA\Items(
 *                type="object",
 *                ref="#/components/schemas/FeatureResource"
 *             )
 *          ),
 *       ),
 *
 * )
 */
class PlaceResource extends JsonResource
{

    public function toArray($request)
    {

        $placeImage = $this->getMedia('place')->flatten();
        $placeImageAdmin = $this->getMedia('place_admin')->flatten();
        $images = $placeImage->merge($placeImageAdmin);

        $user = auth('user_api')->user();

        $features = $this->features
            ->groupBy(function ($it) {
                return $it->featureTitle->title;
            })->map(function ($value, $key) {
                return FeatureResource::collection($value);
            });

        return [
            'id' => $this->id,
            'name' => $this->name,
            'about' => $this->about,
            'address' => $this->address,
            'latitude' => (float)$this->latitude,
            'longitude' => (float)$this->longitude,
            'ratting' => $this->ratting,
            // Todo
            'ratting_count' => rand(70, 2000),
            'views' => $this->views,
            'web_site' => $this->web_site,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'is_open' => $this->isOpen(),
            'is_favourite' => $user->favoritesPlace()->where('place_id', $this->id)->exists(),
            'open_at' => $this->open_at,
            'close_at' => $this->close_at,
            'created_at' => $this->created_at,
            'city'      => $this->city->name,
            'type'      => $this->type->name,
            "images"       => ImageResource::collection($images),
            "awards"       => AwardResource::collection($this->awards),
            'options'      => OptionResource::collection($this->options),
            "features"     => $features,
        ];
    }
}
