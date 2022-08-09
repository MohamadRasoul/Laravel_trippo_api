<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Schema(
 *      title="UpdatePlaceRequest",
 *      description="UpdatePlaceRequest body data",
 *      type="object",
 *      required={"username","email"},
 *
 *
 *      
 *       @OA\Property(
 *          property="name",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="about",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="image",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="address",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="latitude",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="longitude",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="web_site",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="phone_number",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="email",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="open_at",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="close_at",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="type_id",
 *          type="integer"
 *      ),
 *      @OA\Property(
 *          property="city_id",
 *          type="integer"
 *      ),
 *      @OA\Property(
 *          property="features[]",
 *          type="array",
 *          @OA\Items(type="integer")
 *       ),
 *      @OA\Property(
 *          property="options[]",
 *          type="array",
 *          @OA\Items(type="integer")
 *       ),
 *      @OA\Property(
 *          property="awards[]",
 *          type="array",
 *          @OA\Items(type="integer")
 *       ),
 *
 *      example={
 *         "name"          : "Green Table",
 *         "about"         : "best coffe to enjoy with your friends",
 *         "image"         : "image.png",
 *         "address"       : "address - address - address",
 *         "latitude"      : "33.65166",
 *         "longitude"      : "36.5165",
 *         "web_site"      : "www.web_site.com",
 *         "phone_number"  : "0958600569",
 *         "email"         : "email@email.com",
 *         "open_at"       : "10:00:00",
 *         "close_at"      : "22:00:00",
 *         "type_id"      : "1",
 *         "city_id"      : "1",
 *         "features"      : {1,2},
 *         "options"       : {1,2},
 *         "awards"        : {1,2},
 *      }
 * )
 *
 */
class UpdatePlaceRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => ['required', 'string'],
            "about" => ['required', 'string'],
            "address" => ['required', 'string'],
            "latitude" => ['required', 'string'],
            "longitude" => ['required', 'string'],
            "web_site" => ['required', 'string'],
            "phone_number" => ['required', 'string'],
            "email" => ['required', 'email'],
            "open_at" => ['required', 'string'],
            "close_at" => ['required', 'string'],
            "features.*" => ['required', 'numeric'],
            "options.*" => ['required', 'numeric'],
            "awards.*" => ['required', 'numeric'],
            "type_id" => ['required', 'numeric'],
            "city_id" => ['required', 'numeric'],
        ];
    }


    public function validated($key = null, $default = null)
    {
        $data = [
            "name" => $this->name,
            "about" => $this->about,
            "address" => $this->address,
            "latitude" => $this->latitude,
            "longitude" => $this->longitude,
            "web_site" => $this->web_site,
            "phone_number" => $this->phone_number,
            "email" => $this->email,
            "open_at" => $this->open_at,
            "close_at" => $this->close_at,
            "type_id" => $this->type_id,
            "city_id" => $this->city_id,
            "admin_id" => Auth::guard('admin_api')->user()->id,
        ];

        return array_filter($data, function ($value) {
            return !is_null($value);
        });
    }
}
