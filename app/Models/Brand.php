<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model{
    protected $table = 'brands';
    protected $primaryKey = 'brand_id';
    protected $fillable = ['brand_name', 'brand_logo'];
}
