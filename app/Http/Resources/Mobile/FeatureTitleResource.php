<?php

namespace App\Http\Resources\Mobile;

use App\Http\Resources\Dashboard\FeatureResource;
use App\Http\Resources\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Stichoza\GoogleTranslate\GoogleTranslate;

/**
 * @OA\Schema(
 *      title="FeatureTitleResource",
 *      description="FeatureTitleResource body data",
 *      type="object",
 *
 *
 *      @OA\Property(
 *          property="id",
 *          type="string",
 *          example=1
 *      ),
 *      @OA\Property(
 *          property="title",
 *          type="string",
 *          example="intenet"
 *      ),
 *     @OA\Property(
 *          property="features",
 *          type="array",
 *          @OA\Items(
 *             type="object",
 *             ref="#/components/schemas/FeatureResource"
 *          )
 *       ),
 *       @OA\Property(
 *          property="image",
 *          ref="#/components/schemas/ImageResource"
 *          )
 *       ),
 *
 * )
 */
class FeatureTitleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'       => $this->id,
            // 'title'    => $this->title,
            'title'    => GoogleTranslate::trans($this->title, app()->getLocale()),
            'image'    => new ImageResource($this->getFirstMedia('featureTitle')),
            'features' => FeatureResource::collection($this->features),
        ];
    }
}
