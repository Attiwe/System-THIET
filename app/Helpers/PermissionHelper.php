<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class PermissionHelper
{
     
    public static function hasPermission($permission)
    {
        $user = Auth::user();
        
        if (!$user) {
            return false;
        }

        return $user->hasPermission($permission);
    }

     
    public static function hasAnyPermission(array $permissions)
    {
        $user = Auth::user();
        
        if (!$user) {
            return false;
        }

        foreach ($permissions as $permission) {
            if ($user->hasPermission($permission)) {
                return true;
            }
        }
        return false;
    }

    
    public static function hasAllPermissions(array $permissions)
    {
        $user = Auth::user();
        
        if (!$user) {
            return false;
        }

        foreach ($permissions as $permission) {
            if (!$user->hasPermission($permission)) {
                return false;
            }
        }
        return true;
    }

  
    public static function getCurrentUser()
    {
        return Auth::user();
    }

     
    public static function isSuperAdmin()
    {
        $user = Auth::user();
        
        if (!$user) {
            return false;
        }

        return $user->isSuperAdmin();
    }
 
    public static function getCurrentUserName()
    {
        $user = Auth::user();
        return $user ? $user->name : null;
    }

     
    public static function getCurrentPermissions()
    {
        $user = Auth::user();
        
        if (!$user) {
            return [];
        }

        return $user->permissions->pluck('name')->toArray();
    }
}
