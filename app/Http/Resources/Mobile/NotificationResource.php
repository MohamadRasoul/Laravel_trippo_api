<?php

namespace App\Http\Resources\Mobile;

use Illuminate\Http\Resources\Json\JsonResource;

// /**
//  * @OA\Schema(
//  *      title="NotificationResource",
//  *      description="NotificationResource body data",
//  *      type="object",
//  *
//  *
//  *      @OA\Property(
//  *          property="id",
//  *          type="string"
//  *      ),
//  *      @OA\Property(
//  *          property="username",
//  *          type="string"
//  *      ),
//  *
//  *
//  *      example={
//  *          "id": 1,
//  *          "username": "mohamad_ra",
//  *      }
//  * )
//  */


class NotificationResource extends JsonResource
{
    
    
    public function toArray($request)
    {
        return parent::toArray($request);


        // return [
        //     'id'             => $this->id,
        // ];
    }
}
