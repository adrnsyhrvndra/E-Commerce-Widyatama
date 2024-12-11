<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'user_id',
        'address_id',
        'order_status',
        'total_price',
        'order_date',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function address(){
        return $this->belongsTo(Address::class, 'address_id');
    }
}
