<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
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
        		'name'		=>	'adib',
        		'email'		=>	'adib@adib',
        		'password'	=> bcrypt('adib'),
        	],
        	[
        		'name'		=>	'eka',
        		'email'		=>	'eka@eka',
        		'password'	=> bcrypt('eka'),
        	],
        ];

        DB::table('users')->truncate();
        DB::table('users')->insert($data);
    }
}
