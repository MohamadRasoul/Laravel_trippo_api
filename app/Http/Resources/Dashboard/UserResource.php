<?php

namespace App\Http\Resources\Dashboard;

use App\Http\Resources\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;




class UserResource extends JsonResource
{
    public function toArray($request)
    {

        return [
            'id'               => $this->id,
            'first_name'       => $this->first_name,
            'last_name'        => $this->last_name,
            'username'         => $this->username,
            "idfront"        =>  new ImageResource($this->getFirstMedia('idfront')),
            "idback"        => new ImageResource($this->getFirstMedia('idback')),
        ];
    }
}
