<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
	use SoftDeletes;

    protected $fillable = [
    	'user_id', 'title', 'content'
    ];

    protected $dates = [
    	'deleted_at'
    ];
}
