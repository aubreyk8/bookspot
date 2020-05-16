<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

/**
 * Trait HasFunctionalAuth
 * @package App\Traits
 */
trait HasFunctionalAuth
{
    /**
     * @param string $permission
     * @return bool
     */
    public function hasPermission(string $permission): bool
    {
        return Auth::user()->hasAccess($permission);
    }

    /**
     * @param array $permissions
     * @return bool
     */
    public function hasPermissions(array $permissions): bool
    {
        $user = Auth::user();

        foreach ($permissions as $permission) {
            if (!$user->hasAccess($permission)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param array $permissions
     * @return bool
     */
    public function hasEitherPermission(array $permissions): bool
    {
        $user = Auth::user();

        foreach ($permissions as $permission) {
            if ($user->hasAccess($permission)) {
                return true;
            }
        }

        return false;
    }
}
