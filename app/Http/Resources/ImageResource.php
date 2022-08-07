<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

// /**
//  * @OA\Schema(
//  *      title="ImageResource",
//  *      description="ImageResource body data",
//  *      type="object",
//  *
//  *
//  *      @OA\Property(
//  *          property="id",
//  *          type="string"
//  *      ),
//  *      @OA\Property(
//  *          property="username",
//  *          type="string"
//  *      ),
//  *
//  *
//  *      example={
//  *          "id": 1,
//  *          "username": "mohamad_ra",
//  *      }
//  * )
//  */


class ImageResource extends JsonResource
{


    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id'       => $this->id,
            'url'      => $this->original_url,
            'order'    => $this->order_column,
            'hash'     => count($this->custom_properties) > 0 ? $this->custom_properties['hash'] : null,
        ];
    }
}
