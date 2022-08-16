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
 *      title="PlaceInfoResource",
 *      description="PlaceResource body data",
 *      type="object",
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
 *          property="ratting",
 *          type="string",
 *          example=5
 *      ),
 *      @OA\Property(
 *          property="type",
 *          type="string",
 *          example="hotel"
 *      ),
 *      @OA\Property(
 *         property="images",
 *         type="array",
 *         @OA\Items(
 *            type="object",
 *            ref="#/components/schemas/ImageResource"
 *         )
 *      ),
 * )
 */
class PlaceInfoResource extends JsonResource
{

    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'about' => $this->about,
            'ratting' => $this->ratting,
            'ratting_count' => $this->comments()->count(),
            'type' => $this->type->name,
            "images"    => new ImageResource($this->getFirstMedia('place')),
        ];
    }
}
