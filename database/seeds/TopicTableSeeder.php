<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 5; $i++) {
            DB::table('topics')->insert([
                'topic' => 'Documentation',
                'brief_description' => 'Start from now, you can easily manage your time and it has reminder to let you know every time.',
                'book_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('topics')->insert([
                'topic' => 'Community Helps & Supports',
                'brief_description' => 'Start from now, you can easily manage your time and it has reminder to let you know every time.',
                'book_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('topics')->insert([
                'topic' => 'Documentation',
                'brief_description' => 'Start from now, you can easily manage your time and it has reminder to let you know every time.',
                'book_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('topics')->insert([
                'topic' => 'Community Helps & Supports',
                'brief_description' => 'Start from now, you can easily manage your time and it has reminder to let you know every time.',
                'book_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('topics')->insert([
                'topic' => 'Documentation',
                'brief_description' => 'Start from now, you can easily manage your time and it has reminder to let you know every time.',
                'book_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('topics')->insert([
                'topic' => 'Community Helps & Supports',
                'brief_description' => 'Start from now, you can easily manage your time and it has reminder to let you know every time.',
                'book_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('topics')->insert([
                'topic' => 'Documentation',
                'brief_description' => 'Start from now, you can easily manage your time and it has reminder to let you know every time.',
                'book_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('topics')->insert([
                'topic' => 'Community Helps & Supports',
                'brief_description' => 'Start from now, you can easily manage your time and it has reminder to let you know every time.',
                'book_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('topics')->insert([
                'topic' => 'Documentation',
                'brief_description' => 'Start from now, you can easily manage your time and it has reminder to let you know every time.',
                'book_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('topics')->insert([
                'topic' => 'Community Helps & Supports',
                'brief_description' => 'Start from now, you can easily manage your time and it has reminder to let you know every time.',
                'book_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('topics')->insert([
                'topic' => 'Documentation',
                'brief_description' => 'Start from now, you can easily manage your time and it has reminder to let you know every time.',
                'book_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('topics')->insert([
                'topic' => 'Community Helps & Supports',
                'brief_description' => 'Start from now, you can easily manage your time and it has reminder to let you know every time.',
                'book_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        }
    }
}
