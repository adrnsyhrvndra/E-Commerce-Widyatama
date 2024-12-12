<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;

class OrderController extends Controller{

    public function index(){
        $orderItem = OrderItem::whereHas('order', function ($query) {
            $query->where('user_id', auth()->user()->user_id);
        })->get();
    
        return view('store.myorder', compact('orderItem'));
    }

    public function store(Request $request){
        try {

            $user = User::with('orders')->find(auth()->user()->user_id);
            $order = new Order;

            // Jika ada data order lebih dari satu sesuai auth user, maka caranya akan berbeda ya 
            if($user->orders->count() > 0 && $user->orders->first()->order_status == 'pending'){

                // Update terlebih dahulu total price dari tabel order
                $orderTotalPriceData = Order::where('order_id', $request->order_id)->first();
                $orderTotalPriceData->update([
                    'total_price' => $orderTotalPriceData->total_price + $request->total_price * $request->quantity
                ]);
                
                $orderItem = new OrderItem;
                $orderItem->order_id = $request->order_id;
                $orderItem->product_id = $request->product_id;
                $orderItem->quantity = $request->quantity;
                $orderItem->price = $request->price;
                $orderItem->save();

            } else {
                $order->user_id = $request->user_id;
                $order->address_id = $request->address_id;
                $order->order_status = $request->order_status;
                $order->total_price = $request->total_price * $request->quantity;
                $order->order_date = $request->order_date;
                $order->save();
    
                $orderItem = new OrderItem;
                $orderItem->order_id = $order->order_id;
                $orderItem->product_id = $request->product_id;
                $orderItem->quantity = $request->quantity;
                $orderItem->price = $request->price;
                $orderItem->save();
            }


            return redirect('/')->with('success', 'Order berhasil ditambahkan');

        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Order gagal ditambahkan. Coba lagi! '.$e);
        }
    }

    public function delete($order_item_id){
        try {
            // Update terlebih dahulu total price dari tabel order
            $orderTotalPriceData = OrderItem::where('order_item_id', $order_item_id)->first();
            $orderTotalPriceData->order->update([
                'total_price' => $orderTotalPriceData->order->total_price - $orderTotalPriceData->price * $orderTotalPriceData->quantity
            ]);

            OrderItem::where('order_item_id', $order_item_id)->delete();
            $user = User::with('orders')->find(auth()->user()->user_id);
            $getOrderItemsDataByUserAuth = OrderItem::whereHas('order', function ($query) {
                $query->where('user_id', auth()->user()->user_id);
            })->get();

            if ($getOrderItemsDataByUserAuth->count() == 0) {
                $user->orders()->delete();
            }

            return redirect('/myorders')->with('success', 'Order berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/myorders')->with('error', 'Order gagal dihapus. Coba lagi!');
        }
    }
}
