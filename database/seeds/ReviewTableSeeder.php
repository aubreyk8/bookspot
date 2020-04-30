<?php

use App\Models\Reviews;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Reviews::class, 100)->create();
    }
}
