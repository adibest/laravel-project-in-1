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
        		'name' => 'John Lennon',
        		'email' => 'johnlen@gmail.com',
        		'password' => bcrypt('text')
        	],
        	[
        		'name' => 'Jane Lennon',
        		'email' => 'janelen@gmail.com',
        		'password' => bcrypt('text')
        	],
        ];

        DB::table('users')->truncate();
        DB::table('users')->insert($data);
    }
}
