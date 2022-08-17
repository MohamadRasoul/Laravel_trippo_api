<?php

namespace App\Http\Resources\Mobile;

use Illuminate\Http\Resources\Json\JsonResource;
use Stichoza\GoogleTranslate\GoogleTranslate;

/**
 * @OA\Schema(
 *      title="QuestionResource",
 *      description="QuestionResource body data",
 *      type="object",
 *
 *
 *      @OA\Property(
 *          property="id",
 *          type="string",
 *          example="1"
 *      ),
 *      @OA\Property(
 *          property="text",
 *          type="string",
 *          example="what is the most important thing in this city?"
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
 *       @OA\Property(
 *          property="answers",
 *          type="array",
 *          @OA\Items(
 *             type="object",
 *             ref="#/components/schemas/AnswerResource"
 *          )
 *       ),
 *
 * )
 */


class QuestionResource extends JsonResource
{


    public function toArray($request)
    {
        //        return parent::toArray($request);

        return [
            'id'           => $this->id,
            // 'text'         => $this->text,
            'text'         => GoogleTranslate::trans($this->text, app()->getLocale()),
            'created_at'   => $this->created_at,
            'user'         => new UserInfoResource($this->user),
            'answers'      => AnswerResource::collection($this->answers()->latest()->limit(3)->get()),
        ];
    }
}
