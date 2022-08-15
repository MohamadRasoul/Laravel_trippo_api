<?php

namespace App\Http\Resources\Mobile;

use App\Http\Resources\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      title="PlanResource",
 *      description="PlanResource body data",
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
 *          example= "aleppo resturant",
 *      ),
 *      @OA\Property(
 *          property="description",
 *          type="string",
 *          example= "best resturant in aleppo",
 *      ),
 *      @OA\Property(
 *          property="image",
 *          ref="#/components/schemas/ImageResource"
 *          )
 *       ),
 *
 * )
 */


class PlanResource extends JsonResource
{


    public function toArray($request)
    {
        // return parent::toArray($request);


        return [
            'id'           => $this->id,
            'name'         => $this->name,
            'description'  => $this->description,
            'image'        => new ImageResource($this->getFirstMedia('plan')),
        ];
    }
}
