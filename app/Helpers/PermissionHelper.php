<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class PermissionHelper
{
    /**
     * التحقق من وجود صلاحية معينة
     */
    public static function hasPermission($permission)
    {
        $user = Auth::user();
        
        if (!$user) {
            return false;
        }

        return $user->hasPermission($permission);
    }

    /**
     * التحقق من وجود أي من الصلاحيات المحددة
     */
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

    /**
     * التحقق من وجود جميع الصلاحيات المحددة
     */
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

    /**
     * الحصول على معلومات المستخدم الحالي
     */
    public static function getCurrentUser()
    {
        return Auth::user();
    }

    /**
     * التحقق من كون المستخدم مدير عام
     */
    public static function isSuperAdmin()
    {
        $user = Auth::user();
        
        if (!$user) {
            return false;
        }

        return $user->isSuperAdmin();
    }

    /**
     * الحصول على اسم المستخدم الحالي
     */
    public static function getCurrentUserName()
    {
        $user = Auth::user();
        return $user ? $user->name : null;
    }

    /**
     * الحصول على جميع الصلاحيات الحالية
     */
    public static function getCurrentPermissions()
    {
        $user = Auth::user();
        
        if (!$user) {
            return [];
        }

        return $user->permissions->pluck('name')->toArray();
    }
}
