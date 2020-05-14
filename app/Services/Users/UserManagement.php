<?php

namespace App\Services\Users;

use App\Models\User;

/**
 * Class UserManagement
 * @package App\Services\Users
 */
class UserManagement
{
    /**
     * @param array $inputs
     * @return User
     */
    public function createUser(array $inputs): User
    {
        $user = isset($inputs['id']) ? User::find($inputs['id']) : new User();
        $user->first_name = $inputs['first_name'];
        $user->last_name = $inputs['last_name'];
        $user->email = $inputs['email'];
        $user->password = is_null($inputs['id']) ? bcrypt('BookSpot@20#') : $user->password;
        $user->save();

        $user->replaceRoles($inputs['roles']);

        return $user;
    }
}
