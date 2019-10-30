<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrdersResource;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        return new OrdersResource(Order::all());
    }


    public function store(OrderStoreRequest $request)
    {
       $order=Order::UpdateOrCreate([
            'user_id'=>$request->user_id,
       ],[
           'status'=>'создан'
       ]);

        $order->products()->sync($request->products);

       return new OrderResource($order);
    }


    public function show($id)
    {
        //
    }



    public function update(OrderUpdateRequest $request, $id)
    {
        $order=Order::findOrFail($id);
        $order->update($request->only('status'));
        return new OrderResource($order);
    }


    public function destroy($id)
    {
        //
    }
}
