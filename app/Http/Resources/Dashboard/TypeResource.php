<?php

namespace App\Http\Resources\Dashboard;

use App\Http\Resources\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      title="TypeResource",
 *      description="TypeResource body data",
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
 *          example= "any name",
 *      ),
 *      @OA\Property(
 *          property="options",
 *          type="array",
 *          @OA\Items(
 *             type="object",
 *             ref="#/components/schemas/OptionResource"
 *          )
 *       ),
 *       @OA\Property(
 *          property="image",
 *          @OA\Property(
 *             type="object",
 *             ref="#/components/schemas/ImageResource"
 *          )
 *       ),
 * )
 */
class TypeResource extends JsonResource
{


    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'options' => OptionResource::collection($this->options),
            'image' => new ImageResource($this->getFirstMedia('type')),
        ];
    }
}
