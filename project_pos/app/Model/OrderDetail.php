<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';

    protected $fillable = [
    	'order_id', 'product_id' , 'quantity', 'note', 'subtotal'
    ];

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }

    public function product()
    {
    	return $this->hasMany(Product::class);
    }
}
