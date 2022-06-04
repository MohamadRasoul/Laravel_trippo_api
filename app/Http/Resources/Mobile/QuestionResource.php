<?php

namespace App\Http\Resources\Mobile;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      title="QuestionResource",
 *      description="QuestionResource body data",
 *      type="object",
 *
 *
 *      @OA\Property(
 *          property="id",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="text",
 *          type="string"
 *      ),
 *       @OA\Property(
 *          property="answers",
 *          type="array",
 *          @OA\Items(
 *             type="object",
 *             ref="#/components/schemas/AnswerResource"
 *          )
 *       ),
 *
 *      example={
 *          "id": 1,
 *          "text": "what is the most important thing in this city?",
 *
 *      }
 * )
 */


class QuestionResource extends JsonResource
{


    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id'        => $this->id,
            'text'      => $this->text,
            'answers'   => AnswerResource::collection($this->answers()->latest()->take(3)->get()),
        ];
    }
}
