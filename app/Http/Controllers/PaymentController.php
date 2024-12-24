<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Payment;

class PaymentController extends Controller{

    public function paymentAdmin(){
        $payments = Payment::with(['order.user'])->get();
        return view('payment.index', compact('payments'));
    }

    public function paymentAdminUpdate(Request $request, $payment_id){
        try {
            $payment = Payment::findOrFail($request->payment_id);
            $payment->payment_status = $request->payment_status;
            $payment->save();

            return redirect('/paymentAdmin')->with('success', 'Status payment berhasil diubah');

        } catch (\Exception $e) {
            return redirect('/paymentAdmin')->with('error', 'Status payment gagal diubah. Coba lagi!');
        }
    }

    public function store(Request $request){
        try {
            // Update terlebih dahulu order status dari tabel order
            $orderStatus = Order::where('order_id', $request->order_id)->first();
            $orderStatus->update([
                'order_status' => 'unpaid',

            ]);

            $payment = new Payment;
            $payment->order_id = $request->order_id;
            $payment->payment_status = 'pending';
            $payment->payment_date = now();
            $payment->total_price_payment = $request->total_price_payment;
            $payment->save();

            return redirect('/payment/edit/'.$payment->payment_id)->with('success', 'Order berhasil dicheckout');

        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Order gagal dicheckout. Coba lagi!');
        }
    }

    public function choosePaymentMethod($payment_id){
        return view('store.payment', compact('payment_id'));
    }

    public function update(Request $request, $payment_id){
        try {
            $payment = Payment::findOrFail($payment_id);
            $payment->payment_method = $request->payment_method;
            $payment->save();
            return redirect('/myorders')->with('success', 'Order sudah diupdate, silahkan melakukan pembayaran');
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Order gagal dicheckout. Coba lagi!');
        }
    }
}
