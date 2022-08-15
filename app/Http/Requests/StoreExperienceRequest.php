<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="StoreExperienceRequest",
 *      description="StoreExperienceRequest body data",
 *      type="object",
 *      required={"name","about","address"},
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
 *          property="price_begin",
 *          type="string",
 *          example= "150",
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
 *      @OA\Property(
 *          property="images",
 *          type="array",
 *          @OA\Items(type="string"),
 *          example={"image.png","image.png"},
 *          
 *       ),
 *
 * )
 */

class StoreExperienceRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'about' => ['required'],
            'address' => ['required'],
            'price_begin' => ['required'],
            'latitude' => ['nullable'],
            'longitude' => ['nullable'],
            'images'    => ['nullable',],
        ];
    }


    public function validated($key = null, $default = null)
    {
        return [
            'name' => $this->name,
            'about' => $this->about,
            'address' => $this->address,
            'price_begin' => $this->price_begin,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'user_id' => auth('user_api')->id(),
        ];
    }
}
