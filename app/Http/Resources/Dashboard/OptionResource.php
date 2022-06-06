<?php

namespace App\Http\Resources\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      title="OptionResource",
 *      description="OptionResource body data",
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
 *          "name": "any thing",
 *      }
 * )
 */
class OptionResource extends JsonResource
{


    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
