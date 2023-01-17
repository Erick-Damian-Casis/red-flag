<?php

namespace App\Http\Resources\V1\Payment;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name' =>$this->name,
        ];
    }
}
