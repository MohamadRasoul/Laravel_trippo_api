<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Enum;



class ApproveHostRequest extends FormRequest
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
            'is_host'         => 2,
        ];

        return $data;
    }
}
