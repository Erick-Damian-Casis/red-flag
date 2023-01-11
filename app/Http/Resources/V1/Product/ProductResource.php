<?php

namespace App\Http\Resources\V1\Product;

use App\Http\Resources\V1\Catalogue\CatalogueResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'category'=> CatalogueResource::make($this->category),
            'gender'=> CatalogueResource::make($this->gender),
            'name'=> $this->name,
            'price'=> $this->price,
            'image'=> $this->image,
            'stock'=> $this->stock,
            'score'=> $this->score,
            'discount'=> $this->discount,
            'priceDiscount'=> $this->price_discount,
            'description'=> $this->description,
            'state'=> $this->state,
        ];
    }
}
