<?php

namespace App\Http\Resources\Mobile;

use Illuminate\Http\Resources\Json\JsonResource;
use Stichoza\GoogleTranslate\GoogleTranslate;

/**
 * @OA\Schema(
 *      title="FeatureResource",
 *      description="FeatureResource body data",
 *      type="object",
 *
 *
 *      @OA\Property(
 *          property="id",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="title",
 *          type="string"
 *      ),
 *
 *
 *      example={
 *          "id": 1,
 *          "title": "5G network",
 *      }
 * )
 */
class FeatureResource extends JsonResource
{


    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            // 'title' => $this->title,
            'title' => GoogleTranslate::trans($this->title, app()->getLocale()),
        ];
    }
}
