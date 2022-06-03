<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


/**
 * @OA\Schema(
 *      title="StoreCityRequest",
 *      description="StoreCityRequest body data",
 *      type="object",
 *      required={"name","description","latitude","longitude"},
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
 *         "name"          : "Aleppo",
 *         "description"   : "Aleppo is a city in Syria, which serves as the capital of the Aleppo Governorate, the most populous Syrian governorate with an official population of 4.6 million in 2010. Aleppo is one of the oldest continuously inhabited cities in the world; it may have been inhabited since the sixth millennium BC",
 *         "latitude"      : "36.2021",
 *         "longitude"     : "37.1343",
 *      }
 * )
 */
class StoreCityRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'latitude' => ['required', 'string'],
            'longitude' => ['required', 'string'],
        ];
    }


    public function validated($key = null, $default = null)
    {
        return data_get($this->validator->validated(), $key, $default);
    }
}
