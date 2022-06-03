<?php

namespace App\Http\Requests;

use App\Enums\GenderEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Enum;

/**
 * @OA\Schema(
 *      title="RegisterAdminRequest",
 *      description="RegisterAdminRequest body data",
 *      type="object",
 *      required={"name","username","email","password","comfirmation_password"},
 *
 *
 *      @OA\Property(
 *         property="name",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="username",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="email",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="password",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="comfirmation_password",
 *         type="string"
 *      ),
 *
 *
 *      example={
 *         "name"                  : "Mohamad Rasoul",
 *         "username"              : "admin",
 *         "email"                 : "mralmaahlol@gmail.com",
 *         "password"              : "12345678",
 *         "password_confirmation" : "12345678",
 *      }
 * )
 */
class RegisterAdminRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:admins,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];
    }


    public function validated($key = null, $default = null): array
    {
        return [
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ];
    }
}
