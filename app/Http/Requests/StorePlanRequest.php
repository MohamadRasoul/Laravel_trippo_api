<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="StorePlanRequest",
 *      description="StorePlanRequest body data",
 *      type="object",
 *      required={"name"},
 *
 *
 *      @OA\Property(
 *         property="name",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="description",
 *         type="string"
 *      ),
 *
 *
 *      example={
 *         "name"         : "aleppo resturant",
 *         "description"  : "best resturant in aleppo",
 *      }
 * )
 */

class StorePlanRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'          => ['required'],
            'description'   => ['nullable'],
        ];
    }


    public function validated($key = null, $default = null)
    {
        return [
            'name'          => $this->name,
            'description'   => $this->description,
            'user_id'       => auth('user_api')->id(),
        ];
    }
}
