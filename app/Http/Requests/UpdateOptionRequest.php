<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="UpdateOptionRequest",
 *      description="UpdateOptionRequest body data",
 *      type="object",
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
class UpdateOptionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => ['nullable', 'string']
        ];
    }


    public function validated($key = null, $default = null)
    {
        return data_get($this->validator->validated(), $key, $default);
    }
}
