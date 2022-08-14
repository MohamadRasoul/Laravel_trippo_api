<?php

namespace App\Http\Resources\Mobile;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      title="AnswerResource",
 *      description="AnswerResource body data",
 *      type="object",
 *
 *
 *      @OA\Property(
 *          property="id",
 *          type="string",
 *          example= 1,
 *      ),
 *      @OA\Property(
 *          property="text",
 *          type="string",
 *          example= "Yes, I was very happy whev visit it",
 *      ),
 *      @OA\Property(
 *          property="user",
 *          ref="#/components/schemas/UserInfoResource"
 *          )
 *       ),
 * )
 */


class AnswerResource extends JsonResource
{


    public function toArray($request)
    {
        //        return parent::toArray($request);
        return [
            'id'        => $this->id,
            'text'      => $this->text,
            'user'      => new UserInfoResource($this->user),
        ];
    }
}
