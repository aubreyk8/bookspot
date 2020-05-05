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
        $description = 'Where the Crawdads Sing is a 2018 novel by Delia Owens. It has topped the The New York Times ' .
                        'Fiction Best Sellers of 2019 and the The New York Times Fiction Best Sellers of 2020 for a ' .
                        'combined 30 non-consecutive weeks. The story follows two timelines that slowly intertwine';

        DB::table('books')->insert([
            'title' => 'All i ever wanted',
            'description' => $description,
            'category_id' => 34,
            'slug' => 'all-i-ever-wanted-1',
            'isbn' => '37737337373',
            'user_id' => 2,
            'status' => true,
            'cover_image' => 'https://media.gettyimages.com/photos/stack-of-books-picture-id157482029?s=612x612'
        ]);


        DB::table('books')->insert([
            'title' => 'All i ever wanted',
            'description' => $description,
            'category_id' => 34,
            'slug' => 'all-i-ever-wanted-2',
            'isbn' => '37737337373',
            'user_id' => 2,
            'status' => true,
            'cover_image' => 'https://media.gettyimages.com/photos/stack-of-books-picture-id157482029?s=612x612',
        ]);


        DB::table('books')->insert([
            'title' => 'All i ever wanted',
            'description' => $description,
            'category_id' => 1,
            'slug' => 'all-i-ever-wanted-3',
            'isbn' => '37737337373',
            'user_id' => 2,
            'status' => false,
            'cover_image' => 'https://media.gettyimages.com/photos/stack-of-books-picture-id157482029?s=612x612',
        ]);


        DB::table('books')->insert([
            'title' => 'All i ever wanted',
            'description' => $description,
            'category_id' => 5,
            'slug' => 'all-i-ever-wanted-4',
            'isbn' => '37737337373',
            'user_id' => 3,
            'status' => true,
            'cover_image' => 'https://media.gettyimages.com/photos/stack-of-books-picture-id157482029?s=612x612',
        ]);


        DB::table('books')->insert([
            'title' => 'All i ever wanted',
            'description' => $description,
            'category_id' => 17,
            'slug' => 'all-i-ever-wanted-5',
            'isbn' => '37737337373',
            'user_id' => 3,
            'status' => false,
            'cover_image' => 'https://media.gettyimages.com/photos/stack-of-books-picture-id157482029?s=612x612',
        ]);
    }
}
