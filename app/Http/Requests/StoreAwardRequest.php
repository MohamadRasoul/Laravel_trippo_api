<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="StoreAwardRequest",
 *      description="StoreAwardRequest body data",
 *      type="object",
 *      required={"name","description","donor","image"},
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
 *     @OA\Property(
 *         property="donor",
 *         type="string"
 *      ),
 *     @OA\Property(
 *         property="image",
 *         type="string"
 *      ),
 *
 *
 *      example={
 *         "name": "award name",
 *         "description": "award description",
 *         "donor": "award donor",
 *         "image": "awardImageName.jpg",
 *      }
 * )
 */
class StoreAwardRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => ['required', 'string'],
            "description" => ['required', 'string'],
            "donor" => ['required', 'string'],
            "image" => ['required', 'string'],
        ];
    }


    public function validated($key = null, $default = null)
    {
        return [
            "name" => $this->name,
            "description" => $this->description,
            "donor" => $this->donor,
        ];
    }
}
