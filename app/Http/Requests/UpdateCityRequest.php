<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="UpdateCityRequest",
 *      description="UpdateCityRequest body data",
 *      type="object",
 *
 *      @OA\Property(
 *         property="name",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="image",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="description",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="latitude",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="longitude",
 *         type="string"
 *      ),
 *
 *
 *      example={
 *         "name"          : "Damascus",
 *         "image"         : "image.png",
 *         "description"   : "Damascus is the capital of Syria, the oldest capital in the world and, according to some, the fourth holiest city in Islam. It is colloquially known in Syria as aš-Šām and titled the City of Jasmine. Damascus is a major cultural center of the Levant and the Arab world.",
 *         "latitude"      : "33.5138",
 *         "longitude"     : "36.2765",
 *      }
 * )
 */

class UpdateCityRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'latitude' => ['nullable', 'string'],
            'longitude' => ['nullable', 'string'],
        ];
    }


    public function validated($key = null, $default = null)
    {
        return data_get($this->validator->validated(), $key, $default);
    }
}
