<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->insert([
            'primary_color' => '0000cc',
            'secondary_color' => 'FED600',
            'cover_image_height' => '450',
            'secondary_image_height' => '250',
            'book_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('themes')->insert([
            'primary_color' => '0000cc',
            'secondary_color' => 'FED600',
            'cover_image_height' => '450',
            'secondary_image_height' => '450',
            'book_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('themes')->insert([
            'primary_color' => '0000cc',
            'secondary_color' => 'FED600',
            'cover_image_height' => '450',
            'secondary_image_height' => '450',
            'book_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('themes')->insert([
            'primary_color' => '0000cc',
            'secondary_color' => 'FED600',
            'cover_image_height' => '450',
            'secondary_image_height' => '450',
            'book_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('themes')->insert([
            'primary_color' => '0000cc',
            'secondary_color' => 'FED600',
            'cover_image_height' => '450',
            'secondary_image_height' => '450',
            'book_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
