<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="StoreFeatureTitleRequest",
 *      description="StoreFeatureTitleRequest body data",
 *      type="object",
 *      required={"title","image"},
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
class StoreFeatureTitleRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "title" => ['required', 'string', 'unique:feature_titles,title'],
            "image" => ['required', 'string']
        ];
    }


    public function validated($key = null, $default = null)
    {
        return [
            "title" => $this->title,
        ];
    }
}
