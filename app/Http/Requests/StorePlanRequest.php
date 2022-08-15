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
 *      @OA\Property(
 *         property="city_id",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="image",
 *         type="string"
 *      ),
 *
 *
 *      example={
 *         "name"         : "aleppo resturant",
 *         "description"  : "best resturant in aleppo",
 *         "city_id"  : 1,
 *         "image"  : "image.png",
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
            'city_id'       => ['required'],
            'image'         => ['nullable'],
        ];
    }


    public function validated($key = null, $default = null)
    {
        $data = [
            'name'          => $this->name,
            'description'   => $this->description,
            'user_id'       => auth('user_api')->id(),
        ];

        return $data;
    }
}
