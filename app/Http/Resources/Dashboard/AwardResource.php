<?php

namespace App\Http\Resources\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      title="AwardResource",
 *      description="AwardResource body data",
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
 *          property="donor",
 *          type="string"
 *      ),
 *
 *
 *      example={
 *          "id": 1,
 *          "name": "award name",
 *          "description": "award description",
 *          "donor": "award donor",
 *          "image": "awardImagePath",
 *      }
 * )
 */
class AwardResource extends JsonResource
{


    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'donor' => $this->donor,
            'image' => $this->getFirstMediaUrl('award'),
        ];
    }
}
