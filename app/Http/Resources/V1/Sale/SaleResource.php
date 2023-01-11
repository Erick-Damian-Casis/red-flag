<?php

namespace App\Http\Resources\V1\Sale;

use App\Http\Resources\V1\Car\CarResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'car'=> CarResource::make($this->car),
            'invoice'=> $this->invoice,
            'total'=> $this->total,

            'score'=> $this->score,
            'discount'=> $this->discount,
            'priceDiscount'=> $this->price_discount,
            'description'=> $this->description,
            'state'=> $this->state,
        ];
    }
}
