<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Enum;



class RequestHostUserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            "idfront" => ['required', 'string'],
            "idback" => ['required', 'string'],
            "city_id" => ['required', 'numeric'],
        ];
    }


    public function validated($key = null, $default = null)
    {
         $data = [
            'city_id'         => $this->city_id,
            'is_host'         => 1,
        ];

        return $data;
    }
}
