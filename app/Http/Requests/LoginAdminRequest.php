<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="LoginAdminRequest",
 *      description="LoginAdminRequest body data",
 *      type="object",
 *      required={"username","password"},
 *
 *
 *      @OA\Property(
 *         property="username",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="password",
 *         type="string"
 *      ),
 *
 *
 *      example={
 *         "username"              : "admin",
 *         "password"              : "12345678",
 *      }
 * )
 */

class LoginAdminRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username'   => ['required', 'string', 'max:255'],
            'password'   => ['required', 'string', 'min:6'],
        ];
    }


    public function validated($key = null, $default = null)
    {
        return [
            'username'   => $this->username,
            'password'   => $this->password,
        ];
    }
}
