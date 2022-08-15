<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Enum;



class RejectHostRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
        ];
    }


    public function validated($key = null, $default = null)
    {
         $data = [
            'is_host'         => 0,
        ];

        return $data;
    }
}
