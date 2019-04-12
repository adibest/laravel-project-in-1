<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $table = 'products';

    protected $dates = ['deleted_at'];

    protected $fillable = [
    	'name', 'category_id', 'status', 'price'
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function order_detail()
    {
    	return $this->belongsTo(OrderDetail::class);
    }
}
