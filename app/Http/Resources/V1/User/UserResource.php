<?php

namespace App\Http\Resources\V1\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'name'=> $this->name,
            'email'=> $this->email,
            'address'=> $this->address,
            'phone'=> $this->phone,
            'photoProfile'=> $this->photo_profile,
             'role'=> $this->getRoleNames(),
        ];
    }
}
