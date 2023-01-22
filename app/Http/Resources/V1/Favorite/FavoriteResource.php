<?php

namespace App\Http\Resources\V1\Favorite;

use App\Http\Resources\V1\Product\ProductResource;
use App\Http\Resources\V1\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class FavoriteResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'product'=> ProductResource::make($this->product),
            'user'=> UserResource::make($this->user),
        ];
    }
}
