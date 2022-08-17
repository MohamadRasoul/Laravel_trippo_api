<?php

namespace App\Http\Resources\Mobile;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;
use Stichoza\GoogleTranslate\GoogleTranslate;

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
 *          property="created_at",
 *          type="string",
 *          example="2022-08-15T11:39:55.000000Z"
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
            'id'         => $this->id,
            // 'text'       => $this->text,
            'text'       => GoogleTranslate::trans($this->text, app()->getLocale()),
            'created_at' => $this->created_at,
            'user'       => new UserInfoResource($this->user),
        ];
    }
}
