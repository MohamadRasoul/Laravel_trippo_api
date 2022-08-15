<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      title="ImageResource",
 *      description="ImageResource body data",
 *      type="object",
 *
 *
 *      @OA\Property(
 *          property="id",
 *          type="string",
 *          example="1"
 *      ),
 *      @OA\Property(
 *          property="url",
 *          type="string",
 *          example="http://127.0.0.1:8000/media/1/image.png"
 *      ),
 *      @OA\Property(
 *          property="order",
 *          type="string",
 *          example="1"
 *      ),
 *      @OA\Property(
 *          property="hash",
 *          type="string",
 *          example="LROykk$jy=x][WV@GZS~jEaxXmXS"
 *      ),
 *
 * )
 */


class ImageResource extends JsonResource
{


    public function toArray($request)
    {

        return [
            'id'       => $this->id,
            'url'      =>  $this->original_url,
            'order'    => $this->order_column,
            'hash'     => isset($this->custom_properties['hash']) ? $this->custom_properties['hash'] : null,
        ];
    }
}
