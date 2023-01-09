<?php

namespace App\Http\Resources\V1\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name'=> $this->name,
            'email'=> $this->email,
            'address'=> $this->address,
            'phone'=> $this->phone,
            'photoProfile'=> $this->photo_profile,
            'password'=> $this->password,
            // 'role'=> $this->getRoleNames(),
        ];
    }
}
