<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="UpdatePlanContentRequest",
 *      description="UpdatePlanContentRequest body data",
 *      type="object",
 *      required={},
 *
 *
 *      @OA\Property(
 *         property="place_id",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="full_date",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="comment",
 *         type="string"
 *      ),
 *
 *      example={
 *         "place_id"       : 1,
 *         "full_date"      : "5-11-2022",
 *         "comment"        : "sdad asdasda asd sada sdasd dasda",
 *      }
 * )
 */

class UpdatePlanContentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'place_id'    => ['nullable'],
            'full_date'   => ['nullable'],
            'comment'     => ['nullable'],
        ];
    }


    public function validated($key = null, $default = null)
    {
        return data_get($this->validator->validated(), $key, $default);
    }
}
