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
            $this->call(PublishingTableSeeder::class);
            $this->call(ReviewTableSeeder::class);
            $this->call(SalesTableSeeder::class);
            $this->call(VisitorTableSeeder::class);
            $this->call(ThemeTableSeeder::class);
            $this->call(TestimonialTableSeeder::class);
            $this->call(ReviewersTableSeeder::class);
            $this->call(TopicTableSeeder::class);
        }

        $this->call(UserTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UserRoleTableSeedder::class);
        $this->call(CategoryTableSeeder::class);
    }
}
