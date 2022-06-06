<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="UpdateFeatureRequest",
 *      description="UpdateFeatureRequest body data",
 *      type="object",
 *
 *
 *      @OA\Property(
 *         property="title",
 *         type="string"
 *      ),
 *
 *      example={
 *         "title"              : "any thing",
 *      }
 * )
 */
class UpdateFeatureRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "title" => ['required', 'string', 'unique:features,title'],

        ];
    }


    public function validated($key = null, $default = null)
    {
        return data_get($this->validator->validated(), $key, $default);
    }
}
