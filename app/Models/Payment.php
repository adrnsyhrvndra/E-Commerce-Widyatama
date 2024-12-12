<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model{
    protected $table = 'payments';
    protected $primaryKey = 'payment_id';
    protected $fillable = ['order_id','payment_method','payment_status','payment_date','total_price_payment'];

    public function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }

}
