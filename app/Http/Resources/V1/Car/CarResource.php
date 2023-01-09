<?php

namespace App\Http\Resources\V1\Car;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }
}
