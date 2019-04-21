<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
    	'name', 'category_id', 'status', 'price'
    ];
    
    protected $dates = ['deleted_at'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function order_detail()
    {
    	return $this->hasMany(OrderDetail::class);
    }
}
