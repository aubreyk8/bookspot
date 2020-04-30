<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment('local')) {
            $this->call(UserTableSeeder::class);
            $this->call(PublishingTableSeeder::class);
            $this->call(ReviewTableSeeder::class);
        }

        $this->call(RolesTableSeeder::class);
        $this->call(UserRoleTableSeedder::class);
    }
}
