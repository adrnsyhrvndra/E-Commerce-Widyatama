<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addresses extends Model{
      protected $table = 'addresses';
      protected $primaryKey = 'address_id';
      protected $fillable = ['user_id', 'address_label', 'receipt_name', 'province', 'city_or_regency', 'district', 'postal_code', 'full_address', 'address_note', 'is_main'];

      public function user(){
          return $this->belongsTo(User::class);
      }
}