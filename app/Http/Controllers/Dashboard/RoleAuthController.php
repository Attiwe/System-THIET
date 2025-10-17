<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class RoleAuthController extends Controller
{
    /**
     * Show the role login form
     */
    public function showRoleLoginForm()
    {
        // إذا كان المستخدم مسجل دخول كـ user عادي، أظهر له خيار تسجيل دخول الصلاحيات
        if (Auth::check()) {
            return view('auth.role-login');
        }
        
        return redirect()->route('login');
    }

    /**
     * Handle role login
     */
    public function roleLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // البحث عن الصلاحية بالبريد الإلكتروني
        $role = Roles::where('email', $credentials['email'])->first();

        if ($role && Hash::check($credentials['password'], $role->password)) {
            // حفظ معلومات الصلاحية في الجلسة
            $permissions = $role->permissions->pluck('name')->toArray();
            
            // ضمان أن المدير العام له جميع الصلاحيات دائماً
            if ($role->email === 'admin@college.edu') {
                $allPermissions = \App\Models\Permission::pluck('name')->toArray();
                $permissions = array_unique(array_merge($permissions, $allPermissions));
            }
            
            Session::put('role_auth', [
                'id' => $role->id,
                'role' => $role->role,
                'email' => $role->email,
                'permissions' => $permissions,
            ]);

            return redirect()->route('roles.index')
                ->with('success', 'تم تسجيل الدخول كـ ' . $role->role . ' بنجاح');
        }

        throw ValidationException::withMessages([
            'email' => __('بيانات الدخول غير صحيحة'),
        ]);
    }

    /**
     * Handle role logout
     */
    public function roleLogout(Request $request)
    {
        Session::forget('role_auth');
        
        return redirect()->route('dashboard')
            ->with('success', 'تم تسجيل الخروج من الصلاحية بنجاح');
    }

    /**
     * Check if user has specific permission
     */
    public static function hasPermission($permission)
    {
        $roleAuth = Session::get('role_auth');
        
        if (!$roleAuth) {
            return false;
        }

        return in_array($permission, $roleAuth['permissions']) || in_array('super.admin', $roleAuth['permissions']);
    }

    /**
     * Get current role info
     */
    public static function getCurrentRole()
    {
        return Session::get('role_auth');
    }
}
