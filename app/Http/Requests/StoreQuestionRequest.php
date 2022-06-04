<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
  * @OA\Schema(
  *      title="StoreQuestionRequest",
  *      description="StoreQuestionRequest body data",
  *      type="object",
  *      required={"text"},
  *
  *      @OA\Property(
  *         property="text",
  *         type="string"
  *      ),
  *
  *
  *      example={
  *         "text"              : "hello... can any one tell me about this city??",
  *      }
  * )
  */

class StoreQuestionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'text'      => ['required','string']
        ];
    }


    public function validated($key = null, $default = null)
    {
        return [
            'text' => $this->text,
            'user_id' => Auth::guard('user_api')->user()
        ];
    }
}
