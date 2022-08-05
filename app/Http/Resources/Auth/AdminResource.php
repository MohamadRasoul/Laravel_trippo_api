<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *      title="AdminResource",
 *      description="AdminResource body data",
 *      type="object",
 *
 *
 *      @OA\Property(
 *         property="id",
 *         type="string"
 *      ),
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
 *
 *
 *      example={
 *         "id"               : "1",
 *         "name"             : "Mohamad",
 *         "username"         : "mohamad_ra",
 *         "email"            : "mralmaahlol@gmail.com",
 *      }
 * )
 */


class AdminResource extends JsonResource
{


    public function toArray($request)
    {
        // return parent::toArray($request);


        return [
            'id'               => $this->id,
            'name'             => $this->name,
            'username'         => $this->username,
            'email'            => $this->email,
        ];
    }
}
