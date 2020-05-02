<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublishingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'title' => 'All i ever wanted',
            'category' => 'ROMANCE',
            'slug' => 'all-i-ever-wanted',
            'isbn' => '37737337373',
            'user_id' => 2,
            'status' => true,
        ]);


        DB::table('books')->insert([
            'title' => 'All i ever wanted',
            'category' => 'ROMANCE',
            'slug' => 'all-i-ever-wanted',
            'isbn' => '37737337373',
            'user_id' => 2,
            'status' => true,
        ]);


        DB::table('books')->insert([
            'title' => 'All i ever wanted',
            'category' => 'ROMANCE',
            'slug' => 'all-i-ever-wanted',
            'isbn' => '37737337373',
            'user_id' => 2,
            'status' => false,
        ]);


        DB::table('books')->insert([
            'title' => 'All i ever wanted',
            'category' => 'ROMANCE',
            'slug' => 'all-i-ever-wanted',
            'isbn' => '37737337373',
            'user_id' => 3,
            'status' => true,
        ]);


        DB::table('books')->insert([
            'title' => 'All i ever wanted',
            'category' => 'ROMANCE',
            'slug' => 'all-i-ever-wanted',
            'isbn' => '37737337373',
            'user_id' => 3,
            'status' => false,
        ]);
    }
}
