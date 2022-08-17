<?php

namespace App\Http\Resources\Dashboard;

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
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="text",
 *          type="string"
 *      ),
 *
 *
 *      example={
 *          "id": 1,
 *          "text": "Yes, I was very happy whev visit it",
 *      }
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
            'text'       => $this->text,

        ];
    }
}
