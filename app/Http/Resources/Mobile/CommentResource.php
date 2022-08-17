<?php

namespace App\Http\Resources\Mobile;

use App\Http\Resources\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Stichoza\GoogleTranslate\GoogleTranslate;

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
 *      @OA\Property(
 *          property="user",
 *          ref="#/components/schemas/UserInfoResource"
 *          )
 *       ),
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
            // "tilte"          => $this->tilte,
            "tilte"          => GoogleTranslate::trans($this->tilte, app()->getLocale()),
            // "description"    => $this->description,
            "description"    => GoogleTranslate::trans($this->description, app()->getLocale()),
            "rating"         => $this->rating,
            "full_date"      => $this->full_date,
            // "visit_type"     => $this->visitType->name,
            "visit_type"     => GoogleTranslate::trans($this->visitType->name, app()->getLocale()),
            "created_at"     => $this->created_at,
            "images"         => ImageResource::collection($this->load('media')->getMedia('comment')),
            'user'           => new UserInfoResource($this->user),
        ];
    }
}
