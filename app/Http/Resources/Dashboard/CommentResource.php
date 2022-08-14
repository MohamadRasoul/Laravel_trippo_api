<?php

namespace App\Http\Resources\Dashboard;

use App\Http\Resources\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      title="CommentResource",
 *      description="CommentResource body data",
 *      type="object",
 *
 *
 *      @OA\Property(
 *          property="id",
 *          type="string",
 *          example= 7,
 *      ),
 *      @OA\Property(
 *          property="tilte",
 *          type="string",
 *          example= "first comment",
 *      ),
 *      @OA\Property(
 *          property="description",
 *          type="string",
 *          example= "this is the first comment",
 *      ),
 *      @OA\Property(
 *          property="rating",
 *          type="string",
 *          example= "5",
 *      ),
 *      @OA\Property(
 *          property="full_date",
 *          type="string",
 *          example= "5-10-2022",
 *      ),
 *      @OA\Property(
 *          property="visit_type",
 *          type="string",
 *          example= "family",
 *      ),
 *      @OA\Property(
 *          property="created_at",
 *          type="string",
 *          example= "2022-08-14T17:46:00.000000Z"
 *      ),
 *      @OA\Property(
 *         property="images",
 *         type="array",
 *         @OA\Items(
 *            type="object",
 *            ref="#/components/schemas/ImageResource"
 *         )
 *      ),
 * )
 */


class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);
        // return $this->getMedia('comment')->flatten();
        return [
            "id"             => $this->id,
            "tilte"          => $this->tilte,
            "description"    => $this->description,
            "rating"         => $this->rating,
            "full_date"      => $this->full_date,
            "visit_type"     => $this->visitType->name,
            "created_at"     => $this->created_at,
            "images"         => ImageResource::collection($this->getMedia('comment')->flatten()),
        ];
    }
}
