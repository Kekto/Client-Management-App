<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function create(Request $request){
        $order = new Order();
        $order->item_name = $request->itemName;
        $order->quantity = $request->quantity;
        $order->price = $request->price;
        $order->client_id = $request->clientId;
        $order->save();

        return response(['Message' => 'Order created successfuly'],201);
    }
    public function update(int $id,Request $request){
        $order = Order::find($id);
        $order->item_name = $request->itemName;
        $order->quantity = $request->quantity;
        $order->price = $request->price;
        $order->client_id = $request->clientId;
        $order->save();

        return response(['Message' => 'Order updated successfuly'],200);
    }
    public function read(int $id){
        return response(['Message' => 'Order '.$id,'Order' => Client::find($id)],200);
    }
    public function readAll(){
        return Order::all();
    }
    public function delete(int $id){
        $order = Order::find($id);
        $order->delete();
    }
}
