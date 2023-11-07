<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Enum;


// /**
//  * @OA\Schema(
//  *      title="UpdateUserRequest",
//  *      description="UpdateUserRequest body data",
//  *      type="object",
//  *      required={"username","email"},
//  *
//  *
//  *      @OA\Property(
//  *         property="username",
//  *         type="string"
//  *      ),
//  *      @OA\Property(
//  *         property="email",
//  *         type="string"
//  *      ),
//  *
//  *
//  *      example={
//  *         "username"              : "mohamad_ra",
//  *         "email"                 : "mohamad.rasoul.almahlol@gmail.com",
//  *      }
//  * )
//  */

class UpdateUserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            "first_name" => ['required', 'string'],
            "last_name" => ['required', 'string'],
            "username" => ['required', 'string'],
            "password" => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'about' => ['nullable', 'string', 'max:255'],
            'gender' => ['nullable', 'max:255'],
            'date_of_birthday' => ['nullable', 'string', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:255'],
            'latitude' => ['nullable', 'string', 'max:255'],
            'longitude' => ['nullable', 'string', 'max:255'],
        ];
    }


    public function validated($key = null, $default = null)
    {
         $data = [
            'first_name'         => $this->first_name,
            'last_name'   => $this->last_name,
            'username'        => $this->username,
            'password'     => Hash::make($this->password),
            'email'      => $this->email,
            'about' => $this->about,
            'gender' => $this->gender,
            'date_of_birthday' => $this->date_of_birthday,
            'phone_number' => $this->phone_number,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ];

        return $data;
    }
}
