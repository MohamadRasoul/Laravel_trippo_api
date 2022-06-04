<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
  * @OA\Schema(
  *      title="StoreAnswerRequest",
  *      description="StoreAnswerRequest body data",
  *      type="object",
  *      required={"text"},
  *
  *
  *      @OA\Property(
  *         property="text",
  *         type="string"
  *      ),
  *
  *
  *      example={
  *         "text"              : "Yes, I was very happy when visit it",
  *      }
  * )
  */

class StoreAnswerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'text' => ['required','string']
        ];
    }


    public function validated($key = null, $default = null)
    {
        return [
            'text' => $this->text,
            'user_id' => Auth::guard('user_api')->user()->id
        ];
    }
}
