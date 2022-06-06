<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="StoreTypeRequest",
 *      description="StoreTypeRequest body data",
 *      type="object",
 *      required={"name","image"},
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
class StoreTypeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => ['required', 'string', 'unique:types,name'],
            "image" => ['required', 'string']
        ];
    }


    public function validated($key = null, $default = null)
    {
        return [
            "name" => $this->name,
        ];
    }
}
