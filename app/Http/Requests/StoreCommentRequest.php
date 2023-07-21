<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      title="StoreCommentRequest",
 *      description="StoreCommentRequest body data",
 *      type="object",
 *      required={"tilte","description","rating","full_date","images","visit_type_id"},
 *
 *
 *      @OA\Property(
 *         property="tilte",
 *         type="string",
 *         example="first comment"
 *      ),
 *      @OA\Property(
 *         property="description",
 *         type="string",
 *         example="this is the first comment"
 *      ),
 *      @OA\Property(
 *         property="rating",
 *         type="string",
 *         example="5"
 *      ),
 *      @OA\Property(
 *         property="full_date",
 *         type="string",
 *         example="5-10-2022"
 *      ),
 *
 *      @OA\Property(
 *          property="images",
 *          type="array",
 *          @OA\Items(type="string"),
 *          example={"image.png","image.png"},
 *
 *       ),
 *      @OA\Property(
 *         property="visit_type_id",
 *         type="string",
 *         example="1"
 *      ),
 *
 * )
 */

class StoreCommentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tilte'         => ['required',],
            'description'   => ['required',],
            'rating'        => ['required',],
            'full_date'     => ['required',],
            'images'        => ['nullable',],
            'visit_type_id' => ['required',],
        ];
    }


    public function validated($key = null, $default = null)
    {

        $data = [
            'tilte'         => $this->tilte,
            'description'   => $this->description,
            'rating'        => $this->rating,
            'full_date'     => $this->full_date,
            'visit_type_id' => $this->visit_type_id,
            'user_id'       => Auth::guard('user_api')->id(),
        ];

        return $data;
    }
}
