<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductsResource extends ResourceCollection
{

    public function toArray($request)
    {
        return  ProductResource::collection($this->collection);
    }
}
