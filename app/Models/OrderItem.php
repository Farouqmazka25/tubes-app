<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderItem extends Model
{
   protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

public function product()
{
    return $this->belongsTo(Product::class);
}
}
