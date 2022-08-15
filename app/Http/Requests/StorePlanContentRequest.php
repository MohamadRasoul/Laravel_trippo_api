<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="StorePlanContentRequest",
 *      description="StorePlanContentRequest body data",
 *      type="object",
 *      required={"full_date","comment","place_id"},
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

class StorePlanContentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'place_id'    => ['required'],
            'full_date'   => ['required'],
            'comment'     => ['nullable'],
        ];
    }


    public function validated($key = null, $default = null)
    {
        return data_get($this->validator->validated(), $key, $default);
    }
}
