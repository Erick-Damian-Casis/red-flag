<?php

namespace App\Http\Resources\V1\Car;

use App\Http\Resources\V1\Catalogue\CatalogueResource;
use App\Http\Resources\V1\Product\ProductResource;
use App\Http\Resources\V1\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'product'=> ProductResource::make($this->product),
            'user'=> UserResource::make($this->user),
            'size'=> CatalogueResource::make($this->size),
            'color'=> CatalogueResource::make($this->color),
            'totalPrice'=> $this->total_price,
            'state'=> $this->state,
        ];
    }
}
