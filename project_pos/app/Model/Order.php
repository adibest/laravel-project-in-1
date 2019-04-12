<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
    	'table_number', 'total', 'payment_id', 'user_id'
    ];

    public function payment()
    {
    	return $this->belongsTo(Payment::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
