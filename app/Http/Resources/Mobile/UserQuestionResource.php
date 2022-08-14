<?php

namespace App\Http\Resources\Mobile;

use App\Http\Resources\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      title="UserQuestionResource",
 *      description="UserQuestionResource body data",
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
 *          example= "mohamad rasoul",
 *      ),
 *      @OA\Property(
 *          property="username",
 *          type="string",
 *          example= "mohamad_ra",
 *      ),
 *      @OA\Property(
 *          property="image",
 *          ref="#/components/schemas/ImageResource"
 *          )
 *       ),
 * )
 */


class UserQuestionResource extends JsonResource
{


    public function toArray($request)
    {
        return parent::toArray($request);


        return [
            "id"                => $this->id,
            "name"              => $this->first_name . ' ' . $this->last_name,
            "username"          => $this->username,
            'image'             => new ImageResource($this->getMedia('user')->flatten())
        ];
    }
}
