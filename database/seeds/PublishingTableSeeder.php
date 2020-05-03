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
            'cover_image' => 'https://media.gettyimages.com/photos/stack-of-books-picture-id157482029?s=612x612'
        ]);


        DB::table('books')->insert([
            'title' => 'All i ever wanted',
            'category' => 'ROMANCE',
            'slug' => 'all-i-ever-wanted',
            'isbn' => '37737337373',
            'user_id' => 2,
            'status' => true,
            'cover_image' => 'https://media.gettyimages.com/photos/stack-of-books-picture-id157482029?s=612x612',
        ]);


        DB::table('books')->insert([
            'title' => 'All i ever wanted',
            'category' => 'ROMANCE',
            'slug' => 'all-i-ever-wanted',
            'isbn' => '37737337373',
            'user_id' => 2,
            'status' => false,
            'cover_image' => 'https://media.gettyimages.com/photos/stack-of-books-picture-id157482029?s=612x612',
        ]);


        DB::table('books')->insert([
            'title' => 'All i ever wanted',
            'category' => 'ROMANCE',
            'slug' => 'all-i-ever-wanted',
            'isbn' => '37737337373',
            'user_id' => 3,
            'status' => true,
            'cover_image' => 'https://media.gettyimages.com/photos/stack-of-books-picture-id157482029?s=612x612',
        ]);


        DB::table('books')->insert([
            'title' => 'All i ever wanted',
            'category' => 'ROMANCE',
            'slug' => 'all-i-ever-wanted',
            'isbn' => '37737337373',
            'user_id' => 3,
            'status' => false,
            'cover_image' => 'https://media.gettyimages.com/photos/stack-of-books-picture-id157482029?s=612x612',
        ]);
    }
}
