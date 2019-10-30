<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrdersResource extends ResourceCollection
{

    public function toArray($request)
    {
        return  OrderResource::collection($this->collection);
    }
}
