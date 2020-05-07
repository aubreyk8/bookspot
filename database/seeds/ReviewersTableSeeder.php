<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('reviewers')->insert([
                'image' => '/images/team-1.png',
                'names' => 'Adam Smith',
                'job_title' => 'Co-Founder / CEO',
                'facebook' => 'https://www.facebook.com/AubreyKodar',
                'twitter' => 'https://twitter.com/AubreyKodar',
                'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.' .
                             ' Lorem Ipsum has been typesetting industry',
                'book_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('reviewers')->insert([
                'image' => '/images/team-2.png',
                'names' => 'Jonathon Gramble',
                'job_title' => 'Co-Founder / CEO',
                'facebook' => 'https://www.facebook.com/AubreyKodar',
                'twitter' => 'https://twitter.com/AubreyKodar',
                'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.' .
                    ' Lorem Ipsum has been typesetting industry',
                'book_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('reviewers')->insert([
                'image' => '/images/team-3.png',
                'names' => 'Jonathon Gramble',
                'job_title' => 'Co-Founder / CEO',
                'message' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.' .
                    ' Lorem Ipsum has been typesetting industry',
                'book_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
