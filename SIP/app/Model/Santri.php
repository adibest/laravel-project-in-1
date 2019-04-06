<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $table = 'santri';

    protected $fillable = [
    	'nisn', 'nama', 'tempat_lahir', 'tanggal_lahir', 'alamat'
    ];

    public function orangtua()
    {
    	return $this->hasMany(Orangtua::class, 'id_santri');
    }
}
