<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    protected $table = 'orangtua';

    protected $fillable = [
    	'id_santri', 'nik', 'nama', 'gender', 'pekerjaan', 'pendidikan'
    ];

    public function santri()
    {
    	return $this->belongsTo(Santri::class, 'id_santri');
    }
}
