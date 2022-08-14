<?php

namespace App\Http\Resources\Mobile;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      title="VisitTypeResource",
 *      description="VisitTypeResource body data",
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
 *
 *
 *      example={
 *          "id": 1,
 *          "name": "mohamad_ra",
 *      }
 * )
 */

class VisitTypeResource extends JsonResource
{


    public function toArray($request)
    {
        return parent::toArray($request);


        return [
            'id'        => $this->id,
            'name'      => $this->name,
        ];
    }
}
