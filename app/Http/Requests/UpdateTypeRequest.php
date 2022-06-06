<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="UpdateTypeRequest",
 *      description="UpdateTypeRequest body data",
 *      type="object",
 *
 *
 *      @OA\Property(
 *         property="name",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="image",
 *         type="string"
 *      ),
 *
 *
 *      example={
 *         "name"   : "any name",
 *         "image"   : "image.jpg",
 *      }
 * )
 */
class UpdateTypeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => ['nullable', 'string', 'unique:types,name'],
            "image" => ['nullable', 'string']
        ];
    }


    public function validated($key = null, $default = null)
    {
        return [
            "name" => $this->name,
        ];
    }
}
