<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\dashboard\SettingRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::get();
        return view('pages.setting.index', compact('settings'));
    }
    public function create()
    {
        return view('pages.setting.create');
    }
    public function store(SettingRequest $request)
    {
        try {
            $data = $request->except('logo'); 
            if ($request->hasFile('logo')) {
                $data['logo'] = $this->storeFile($request, 'logo', 'logo', 'setting-logo');
            }
            Setting::create($data); 

        return redirect()->route('setting.index')->with('success', 'تم إضافة الإعدادات بنجاح');
        } catch (\Exception $e) {
            return redirect()->route('setting.index')->with('error', 'حدث خطأ أثناء إضافة الإعدادات');
        }
    }

    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('pages.setting.edit', compact('setting'));
    }

    public function update(SettingRequest $request, $id)
    {
        try {
            $setting = Setting::findOrFail($id);
            $data = $request->except('logo');
            if ($request->hasFile('logo')) {
                $this->deleteFile($setting->logo, 'setting-logo');
                $data['logo'] = $this->storeFile($request, 'logo', 'logo', 'setting-logo');
            }
        $setting->update($data);
        return redirect()->route('setting.index')->with('success', 'تم تحديث الإعدادات بنجاح');
        } catch (\Exception $e) {
            return redirect()->route('setting.index')->with('error', 'حدث خطأ أثناء تحديث الإعدادات');
        }
    }

    public function destroy($id)
    {
        try {
            $setting = Setting::findOrFail($id);
            $this->deleteFile($setting->logo, 'setting-logo');
        $setting->delete();
        return redirect()->route('setting.index')->with('success', 'تم حذف الإعدادات بنجاح');
        } catch (\Exception $e) {
            return redirect()->route('setting.index')->with('error', 'حدث خطأ أثناء حذف الإعدادات');
        }
    }

    private function storeFile($request, $file, $folder, $disk  )
    {
        if ($request->hasFile($file)) {
            $filename = Str::uuid() . '.' . $request->file($file)->getClientOriginalExtension();
            $path = $request->file($file)->storeAs($folder, $filename, $disk);
            return $path;
        }
    }

    private function deleteFile($path, $disk)
    {
        if (Storage::disk($disk)->exists($path)) {
            Storage::disk($disk)->delete($path);
        }
    }

}
