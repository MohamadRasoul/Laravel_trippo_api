<?php

namespace App\Http\Resources\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

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
 *      @OA\Property(
 *          property="image",
 *          type="string",
 *          example="image.jpg"
 *      ),
 *     @OA\Property(
 *          property="features",
 *          type="array",
 *          @OA\Items(
 *             type="object",
 *             ref="#/components/schemas/FeatureResource"
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
            'id' => $this->id,
            'title' => $this->title,
            'image' => $this->getFirstMediaUrl('featureTitle'),
            'features' => FeatureResource::collection($this->features)
        ];
    }
}
