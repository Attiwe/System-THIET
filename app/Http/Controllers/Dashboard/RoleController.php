<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = \App\Models\User::with('permissions')->orderBy('created_at', 'desc')->paginate(10);
        return view('pages.roles.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // التحقق من الصلاحيات
        if (!\App\Helpers\PermissionHelper::hasPermission('roles.create') && !\App\Helpers\PermissionHelper::isSuperAdmin()) {
            abort(403, 'ليس لديك صلاحية للوصول لهذه الصفحة');
        }

        $permissions = Permission::orderBy('group')->orderBy('display_name')->get()->groupBy('group');
        return view('pages.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // التحقق من الصلاحيات
        if (!\App\Helpers\PermissionHelper::hasPermission('roles.create') && !\App\Helpers\PermissionHelper::isSuperAdmin()) {
            abort(403, 'ليس لديك صلاحية للوصول لهذه الصفحة');
        }
        $validator = Validator::make($request->all(), [
            'role' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id',
        ], [
            'role.required' => 'اسم الصلاحية مطلوب',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني غير صحيح',
            'email.unique' => 'البريد الإلكتروني موجود بالفعل',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'كلمة المرور يجب أن تكون 6 أحرف على الأقل',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // إنشاء مستخدم جديد
            $user = \App\Models\User::create([
                'name' => $request->role,
                'email' => $request->email,
                'password' => $request->password,
                'email_verified_at' => now(),
            ]);

            // ربط الصلاحيات بالمستخدم
            if ($request->has('permissions')) {
                $user->permissions()->attach($request->permissions);
            }

            return redirect()->route('roles.index')
                ->with('success', 'تم إنشاء المستخدم بنجاح');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء إنشاء الصلاحية: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->load('permissions');
        return view('pages.roles.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $permissions = Permission::orderBy('group')->orderBy('display_name')->get()->groupBy('group');
        $user->load('permissions');
        $selectedPermissions = $user->permissions->pluck('id')->toArray();
        
        return view('pages.roles.edit', compact('user', 'permissions', 'selectedPermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id',
        ], [
            'role.required' => 'اسم الصلاحية مطلوب',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني غير صحيح',
            'email.unique' => 'البريد الإلكتروني موجود بالفعل',
            'password.min' => 'كلمة المرور يجب أن تكون 6 أحرف على الأقل',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // منع تعديل المستخدمين المحميين
            if ($user->email === 'admin@college.edu' || $user->email === 'ebrahim@gmail.com' || $user->is_protected) {
                return redirect()->route('roles.index')
                    ->with('error', 'لا يمكن تعديل هذا المستخدم! هذا مستخدم محمي.');
            }

            $data = [
                'name' => $request->role,
                'email' => $request->email,
            ];

            // تحديث كلمة المرور إذا تم إدخالها
            if ($request->filled('password')) {
                $data['password'] = $request->password;
            }

            $user->update($data);

            // تحديث الصلاحيات
            if ($request->has('permissions')) {
                $user->permissions()->sync($request->permissions);
            } else {
                $user->permissions()->detach();
            }

            return redirect()->route('roles.index')
                ->with('success', 'تم تحديث المستخدم بنجاح');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء تحديث الصلاحية: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            // منع حذف المستخدمين المحميين
            if ($user->email === 'admin@college.edu' || $user->email === 'ebrahim@gmail.com' || $user->is_protected) {
                return redirect()->route('roles.index')
                    ->with('error', 'لا يمكن حذف هذا المستخدم! هذا مستخدم محمي.');
            }

            // حذف الصلاحيات المرتبطة
            $user->permissions()->detach();
            $user->delete();

            return redirect()->route('roles.index')
                ->with('success', 'تم حذف المستخدم بنجاح');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء حذف المستخدم: ' . $e->getMessage());
        }
    }
}
