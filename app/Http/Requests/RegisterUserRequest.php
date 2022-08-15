<?php

namespace App\Http\Requests;

use App\Enums\GenderEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Enum;

/**
 * @OA\Schema(
 *      title="RegisterUserRequest",
 *      description="RegisterUserRequest body data",
 *      type="object",
 *      required={"first_name","last_name","username","email","password","comfirmation_password","about","gender","date_of_birthday","phone_number","latitude","longitude"},
 *
 *
 *      @OA\Property(
 *         property="first_name",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="last_name",
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
 *      @OA\Property(
 *         property="about",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="gender",
 *         type="string",
 *         enum={"male","female"},
 *      ),
 *      @OA\Property(
 *         property="date_of_birthday",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="phone_number",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="latitude",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="longitude",
 *         type="string"
 *      ),
 *
 *
 *      example={
 *         "first_name"            : "Mohamad",
 *         "last_name"             : "Rasoul",
 *         "username"              : "mohamad_ra",
 *         "email"                 : "mralmaahlol@gmail.com",
 *         "password"              : "12345678",
 *         "password_confirmation" : "12345678",
 *         "about"                 : "this is my profile",
 *         "gender"                : "male",
 *         "date_of_birthday"      : "15-9-1998",
 *         "phone_number"          : "0958600569",
 *         "latitude"              : "36.1654",
 *         "longitude"             : "37.1545",
 *      }
 * )
 */
class RegisterUserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];
    }


    public function validated($key = null, $default = null): array
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ];
    }
}
