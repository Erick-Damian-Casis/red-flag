<?php

namespace App\Http\Resources\V1\Sale;

use App\Http\Resources\V1\Car\CarResource;
use App\Http\Resources\V1\Payment\PaymentResource;
use App\Http\Resources\V1\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'invoice'=> $this->invoice,
            'payment'=> PaymentResource::make($this->payment),
            'user'=> UserResource::make($this->user),
            'total'=> $this->total,
            'date'=> $this->created_at,
        ];
    }
}
