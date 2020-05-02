<?php

use App\Models\Visitor;
use Illuminate\Database\Seeder;

class VisitorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Visitor::class, 2000)->create();
    }
}
