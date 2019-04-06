<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenggunaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[
        		'nama' => 'adib',
        		'email' => 'adib@gmail.com',
        		'password' => bcrypt('adib'),
        	],
        	[
        		'nama' => 'bita',
        		'email' => 'bita@gmail.com',
        		'password' => bcrypt('bita'),
        	],
        ];

        DB::table('pengguna')->truncate();
        DB::table('pengguna')->insert($data);
    }
}
