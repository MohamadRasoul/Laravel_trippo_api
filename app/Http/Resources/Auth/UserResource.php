<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * @OA\Schema(
 *      title="UserResource",
 *      description="UserResource body data",
 *      type="object",
 *
 *
 *
 *      @OA\Property(
 *         property="id",
 *         type="string"
 *      ),
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
 *         property="about",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="gender",
 *         type="string"
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
 *         "id"               : "1",
 *         "first_name"       : "Mohamad",
 *         "last_name"        : "Rasoul",
 *         "username"         : "mohamad_ra",
 *         "email"            : "mohamad.rasoul.almahlol@gmail.com",
 *         "about"            : "this is my profile",
 *         "gender"           : "male",
 *         "date_of_birthday" : "1998-09-15T00:00:00.000000Z",
 *         "phone_number"     : "0958600569",
 *         "latitude"         : "36.1654",
 *         "longitude"        : "37.1545",
 *      }
 * )
 */


class UserResource extends JsonResource
{


    public function toArray($request)
    {
        // return parent::toArray($request);


        return [
            'id'               => $this->id,
            'first_name'       => $this->first_name,
            'last_name'        => $this->last_name,
            'username'         => $this->username,
            'email'            => $this->email,
            'about'            => $this->about,
            'is_host'          => (Boolean) $this->is_host,
            'gender'           => $this->gender,
            'date_of_birthday' => $this->date_of_birthday,
            'phone_number'     => $this->phone_number,
            'latitude'         => $this->latitude,
            'longitude'        => $this->longitude,
        ];
    }
}
