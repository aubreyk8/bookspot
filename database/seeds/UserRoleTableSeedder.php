<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleTableSeedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_users')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);

        if (app()->environment('local')) {
            DB::table('role_users')->insert([
                'user_id' => 2,
                'role_id' => 2,
            ]);

            DB::table('role_users')->insert([
                'user_id' => 3,
                'role_id' => 2,
            ]);
        };
    }
}
