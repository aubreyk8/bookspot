<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Orchid\Support\Facades\Dashboard;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Aubrey',
            'last_name' => 'Hlungwane',
            'email' => 'Hlungwaneak@inspiredhost.co.za',
            'password' => bcrypt('admin'),
            'permissions' => $this->getAdminPermissions(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        if (app()->environment('local')) {

            DB::table('users')->insert([
                'first_name' => 'Aubrey',
                'last_name' => 'Hlungwane',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'permissions' => $this->getAdminPermissions(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('users')->insert([
                'first_name' => 'Mike',
                'last_name' => 'Hove',
                'email' => 'mike@admin.com',
                'password' => bcrypt('admin'),
                'permissions' => $this->getPublisherPermissions(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('users')->insert([
                'first_name' => 'Prince',
                'last_name' => 'Sono',
                'email' => 'prince@admin.com',
                'password' => bcrypt('admin'),
                'permissions' => $this->getPublisherPermissions(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }

    /**
     * @return mixed
     */
    public function getAdminPermissions()
    {
        return Dashboard::getPermission()
            ->collapse()
            ->reduce(static function (Collection $permissions, array $item) {
                return $permissions->put($item['slug'], true);
            }, collect());
    }

    /**
     * @return mixed
     */
    public function getPublisherPermissions()
    {
        return Dashboard::getPermission()
            ->collapse()
            ->reduce(static function (Collection $permissions, array $item) {
                return $permissions->put($item['slug'], false);
            }, collect());
    }
}
