<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller{

    public function index(){
        $orderItem = OrderItem::whereHas('order', function ($query) {
            $query->where('user_id', auth()->user()->user_id);
        })->get();
    
        return view('store.myorder', compact('orderItem'));
    }

    public function store(Request $request){
        try {

            $order = new Order;
            $order->user_id = $request->user_id;
            $order->address_id = $request->address_id;
            $order->order_status = $request->order_status;
            $order->total_price = $request->total_price;
            $order->order_date = $request->order_date;
            $order->save();

            $orderItem = new OrderItem;
            $orderItem->order_id = $order->order_id;
            $orderItem->product_id = $request->product_id;
            $orderItem->quantity = $request->quantity;
            $orderItem->price = $request->price;
            $orderItem->save();

            return redirect('/')->with('success', 'Order berhasil ditambahkan');

        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Order gagal ditambahkan. Coba lagi!');
        }
    }
}
