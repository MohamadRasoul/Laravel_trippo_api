<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="UpdateNotificationRequest",
 *      description="UpdateNotificationRequest body data",
 *      type="object",
 *      required={},
 *
 *
 *
 *      @OA\Property(
 *         property="title",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="description",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="image",
 *         type="string"
 *      ),
 *
 *
 *      example={
 *         "title"          : "notification title",
 *         "description"    : "notification description",
 *         "image"          : "image.png",
 *      }
 * )
 */

class UpdateNotificationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['nullable'],
            'description' => ['nullable'],
            'image' => ['nullable'],
        ];
    }


    public function validated($key = null, $default = null)
    {
        return data_get($this->validator->validated(), $key, $default);
    }
}
