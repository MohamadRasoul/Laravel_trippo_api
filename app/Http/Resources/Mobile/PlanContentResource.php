<?php

namespace App\Http\Resources\Mobile;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      title="PlanContentResource",
 *      description="PlanContentResource body data",
 *      type="object",
 *
 *
 *      @OA\Property(
 *          property="id",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="full_date",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="comment",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="place_id",
 *          type="string"
 *      ),
 *
 *
 *      example={
 *          "id": 10,
 *          "full_date": "2022-08-15",
 *          "comment": "Est exercitationem consequatur repellat qui nesciunt ut alias. Quia alias delectus aut numquam dolorem enim voluptatem. Aut molestiae ut et animi aut ut minima.",
 *          "place_id": 48,
 *      }
 * )
 */


class PlanContentResource extends JsonResource
{


    public function toArray($request)
    {


        return [
            'id'           => $this->id,
            "place_id"     => $this->place_id,
            "full_date"    => $this->full_date,
            "comment"      => $this->comment,
        ];
    }
}
