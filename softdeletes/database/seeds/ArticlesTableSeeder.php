<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
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
        		'user_id'	=> 1,
        		'title'		=> 'snnsmdsmd',
        		'content'	=> 'affa aftaf atftaf',
        	],
        	[
        		'user_id'	=> 2,
        		'title'		=> 'sada',
        		'content'	=> 'sdasd sadsad atftsdasdaf',
        	],
        ];

        DB::table('articles')->truncate();
        DB::table('articles')->insert($data);
    }
}
