<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="UpdateAwardRequest",
 *      description="UpdateAwardRequest body data",
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
class UpdateAwardRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => ['nullable', 'string'],
            "description" => ['nullable', 'string'],
            "donor" => ['nullable', 'string'],
            "image" => ['nullable', 'string'],
        ];
    }


    public function validated($key = null, $default = null)
    {
        $data = [
            "name" => $this->name,
            "description" => $this->description,
            "donor" => $this->donor,
        ];

        return array_filter($data, function ($value) {
            return !is_null($value);
        });
    }
}
