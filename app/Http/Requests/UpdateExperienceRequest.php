<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="UpdateExperienceRequest",
 *      description="UpdateExperienceRequest body data",
 *      type="object",
 *      required={},
 *
 *
 *      @OA\Property(
 *         property="name",
 *         type="string",
 *         example="experiance name",
 *      ),
 *      @OA\Property(
 *         property="about",
 *         type="string",
 *         example="experiance about",
 *      ),
 *      @OA\Property(
 *         property="address",
 *         type="string",
 *         example="experiance address",
 *      ),
 *      @OA\Property(
 *         property="latitude",
 *         type="string",
 *         example=36.2435,
 *      ),
 *      @OA\Property(
 *         property="longitude",
 *         type="string",
 *         example=36.2435,
 *      ),
 *
 *
 * )
 */

class UpdateExperienceRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['nullable'],
            'about' => ['nullable'],
            'address' => ['nullable'],
            'latitude' => ['nullable'],
            'longitude' => ['nullable'],
            'price_begin' => ['nullable'],
        ];
    }


    public function validated($key = null, $default = null)
    {
        return data_get($this->validator->validated(), $key, $default);
    }
}
