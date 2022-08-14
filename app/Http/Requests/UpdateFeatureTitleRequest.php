<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="UpdateFeatureTitleRequest",
 *      description="UpdateFeatureTitleRequest body data",
 *      type="object",
 *
 *
 *      @OA\Property(
 *         property="title",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="image",
 *         type="string"
 *      ),
 *
 *
 *      example={
 *         "title"   : "any Title",
 *         "image"   : "image.png",
 *      }
 * )
 */
class UpdateFeatureTitleRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "title" => ['nullable', 'string', 'unique:feature_titles,title'],
            "image" => ['nullable', 'string']
        ];
    }


    public function validated($key = null, $default = null)
    {
        $data = [
            "title" => $this->title,
        ];


        return array_filter($data, function ($value) {
            return !is_null($value);
        });
    }
}
