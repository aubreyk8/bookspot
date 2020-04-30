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
            'isbn' => '37737337373'
        ]);


        DB::table('books')->insert([
            'title' => 'All i ever wanted',
            'category' => 'ROMANCE',
            'slug' => 'all-i-ever-wanted',
            'isbn' => '37737337373'
        ]);


        DB::table('books')->insert([
            'title' => 'All i ever wanted',
            'category' => 'ROMANCE',
            'slug' => 'all-i-ever-wanted',
            'isbn' => '37737337373'
        ]);


        DB::table('books')->insert([
            'title' => 'All i ever wanted',
            'category' => 'ROMANCE',
            'slug' => 'all-i-ever-wanted',
            'isbn' => '37737337373'
        ]);


        DB::table('books')->insert([
            'title' => 'All i ever wanted',
            'category' => 'ROMANCE',
            'slug' => 'all-i-ever-wanted',
            'isbn' => '37737337373'
        ]);
    }
}
