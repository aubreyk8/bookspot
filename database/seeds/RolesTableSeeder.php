<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
           'slug' => 'administrator',
           'name' => 'Administrator',
           'permissions' => $this->getAdminPermissions(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'slug' => 'publisher',
            'name' => 'Publisher',
            'permissions' => $this->getPublisherPermissions(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
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
        $publisherPermissions = [
            'platform.index'
        ];

        return Dashboard::getPermission()
            ->collapse()
            ->reduce(static function (Collection $permissions, array $item) use ($publisherPermissions) {
                return $permissions->put($item['slug'], in_array($item['slug'], $publisherPermissions));
            }, collect());
    }
}
