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
            'date'=> $this->created_at,
        ];
    }
}
