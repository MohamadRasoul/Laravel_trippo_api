<?php

namespace App\Http\Resources\Mobile;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      title="BookingResource",
 *      description="BookingResource body data",
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
 *          property="price",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="people_count",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="is_active",
 *          type="string"
 *      ),
 *
 *
 *      example={
 *          "id": 1,
 *          "name": "mohamad_ra",
 *          "price": "2000",
 *          "people_count": "2",
 *          "is_active": "1",
 *      }
 * )
 */


class BookingResource extends JsonResource
{
    
    
    public function toArray($request)
    {
        // return parent::toArray($request);


        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'price'         => $this->price,
            'people_count'  => $this->people_count,
            'is_active'     => $this->is_active,
        ];
    }
}
