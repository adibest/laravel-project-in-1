<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
    	'name'
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
