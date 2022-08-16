<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="StoreNotificationRequest",
 *      description="StoreNotificationRequest body data",
 *      type="object",
 *      required={"title","description"},
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

class StoreNotificationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['required'],
        ];
    }


    public function validated($key = null, $default = null)
    {
        return [
            "title" => $this->title,
            "description" => $this->description,
        ];
    }
}
