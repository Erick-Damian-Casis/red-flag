<?php

namespace App\Http\Resources\V1\Catalogue;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CatalogueCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }
}
