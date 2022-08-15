<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="UpdatePlanRequest",
 *      description="UpdatePlanRequest body data",
 *      type="object",
 *      required={"username","email"},
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

class UpdatePlanRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'          => ['nullable'],
            'description'   => ['nullable'],
        ];
    }



    public function validated($key = null, $default = null)
    {
        return data_get($this->validator->validated(), $key, $default);
    }
}
