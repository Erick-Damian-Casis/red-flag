<?php

namespace App\Http\Resources\V1\Car;

use App\Http\Resources\V1\Catalogue\CatalogueResource;
use App\Http\Resources\V1\Product\ProductResource;
use App\Http\Resources\V1\Sale\SaleResource;
use App\Http\Resources\V1\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'product'=> ProductResource::make($this->product),
            'sale'=> SaleResource::make($this->sale),
            'user'=> UserResource::make($this->user),
            'size'=> CatalogueResource::make($this->size),
            'color'=> CatalogueResource::make($this->color),
            'totalPrice'=> $this->total_price,
            'amount'=> $this->amount,
        ];
    }
}
