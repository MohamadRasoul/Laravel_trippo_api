<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="StoreOptionRequest",
 *      description="StoreOptionRequest body data",
 *      type="object",
 *      required={"name"},
 *
 *
 *      @OA\Property(
 *         property="name",
 *         type="string"
 *      ),
 *
 *
 *      example={
 *         "name"              : "any name",
 *      }
 * )
 */
class StoreOptionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => ['required', 'string']
        ];
    }


    public function validated($key = null, $default = null)
    {
        return data_get($this->validator->validated(), $key, $default);
    }
}
