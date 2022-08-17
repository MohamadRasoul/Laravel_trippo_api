<?php

namespace App\Http\Resources\Mobile;

use App\Http\Resources\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      title="ExperienceResource",
 *      description="ExperienceResource body data",
 *      type="object",
 *
 *
 *      @OA\Property(
 *          property="id",
 *          type="string",
 *          example= 1,
 *      ),
 *      @OA\Property(
 *          property="name",
 *          type="string",
 *          example= "Royce O'Kon",
 *      ),
 *      @OA\Property(
 *          property="about",
 *          type="string",
 *          example= "Consequatur numquam omnis in maiores iusto maiores. Quam optio rerum eaque quidem. Blanditiis beatae repellendus magni magni aut.",
 *      ),
 *      @OA\Property(
 *          property="ratting",
 *          type="string",
 *          example= "Quisquam omnis ut reprehenderit temporibus corrupti. Enim quia dolores a quidem quia. Et ipsa doloribus est saepe. Qui quia dicta eaque est molestiae magni sit.",
 *      ),
 *      @OA\Property(
 *          property="views",
 *          type="string",
 *          example= "107622",
 *      ),
 *      @OA\Property(
 *          property="address",
 *          type="string",
 *          example= "Maiores voluptatem quis sunt magni enim illo. Et aliquid aut iste eum eveniet cum placeat. Voluptate corporis dolorem deleniti fuga aut aut. Quibusdam qui excepturi delectus et eius illum.",
 *      ),
 *      @OA\Property(
 *          property="latitude",
 *          type="string",
 *          example= "267937",
 *      ),
 *      @OA\Property(
 *          property="longitude",
 *          type="string",
 *          example= "195991",
 *      ),
 *      @OA\Property(
 *          property="price_begin",
 *          type="string",
 *          example= "150",
 *      ),
 *      @OA\Property(
 *         property="images",
 *         type="array",
 *         @OA\Items(
 *            type="object",
 *            ref="#/components/schemas/ImageResource"
 *         )
 *      ),
 *      @OA\Property(
 *          property="user",
 *          ref="#/components/schemas/UserInfoResource"
 *          )
 *       ),
 *      @OA\Property(
 *         property="places",
 *         type="array",
 *         @OA\Items(
 *            type="object",
 *            ref="#/components/schemas/PlaceInfoResource"
 *         )
 *      ),
 *
 * )
 */
//  *      @OA\Property(
//  *         property="bookings",
//  *         type="array",
//  *         @OA\Items(
//  *            type="object",
//  *            ref="#/components/schemas/BookingResource"
//  *         )
//  *      ),

class ExperienceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "about" => $this->about,
            "ratting" => (int) $this->ratting,
            "views" => (int) $this->views,
            "price_begin" => (int) $this->price_begin,
            "address" => $this->address,
            "latitude" => $this->latitude,
            "longitude" => $this->longitude,
            "images"     => ImageResource::collection($this->load('media')->getMedia('experience')),
            "user" => new UserInfoResource($this->user),
            "places" => PlaceInfoResource::collection($this->places),
            // "bookings" => BookingResource::collection($this->bookings),
        ];
    }
}
