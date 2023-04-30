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
    }
    public function update(int $id,Request $request){
        $order = Order::find($id);
        $order->item_name = $request->itemName;
        $order->quantity = $request->quantity;
        $order->price = $request->price;
        $order->client_id = $request->clientId;
        $order->save();
    }
    public function read(int $id){
        return Order::find($id);
    }
    public function readAll(){
        return Order::all();
    }
    public function delete(int $id){
        $order = Order::find($id);
        $order->delete();
    }
}
