<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{
      protected $table = 'products';
      protected $primaryKey = 'product_id';
      protected $fillable = ['product_name', 'product_description', 'product_price', 'product_image', 'brand_id', 'category_id'];

      public function brands(){
            return $this->belongsTo(Brand::class, 'brand_id');
      }

      public function categories(){
            return $this->belongsTo(Categorie::class, 'category_id');
      }

      public function orderItems(){
            return $this->hasMany(OrderItem::class, 'order_item_id');
      }
    
}
