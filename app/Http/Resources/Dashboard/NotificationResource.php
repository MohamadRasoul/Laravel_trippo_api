<?php

namespace App\Http\Resources\Dashboard;

use App\Http\Resources\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      title="NotificationResource",
 *      description="NotificationResource body data",
 *      type="object",
 *
 *
 *      @OA\Property(
 *          property="id",
 *          type="string",
 *          example= 1,
 *      ),
 *      @OA\Property(
 *          property="title",
 *          type="string",
 *          example= "notification title",
 *      ),
 *      @OA\Property(
 *          property="description",
 *          type="string",
 *          example= "notification description",
 *      ),
 *
 *       @OA\Property(
 *          property="image",
 *          @OA\Property(
 *             type="object",
 *             ref="#/components/schemas/ImageResource"
 *          )
 *       ),
 * )
 */


class NotificationResource extends JsonResource
{


    public function toArray($request)
    {
        // return parent::toArray($request);


        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            "image"        => new ImageResource($this->getFirstMedia('notification')),
        ];
    }
}
