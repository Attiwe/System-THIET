<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Institute;
use App\Models\Setting;
use App\Models\Unit;
use App\Services\InstituteService;
use App\Services\InstituteServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InstituteController extends Controller
{
    protected $institute;

    public function __construct(InstituteServices $institute)
    {
        $this->institute = $institute;
    }

    public function index()
    {
        $institutes = $this->institute->getAll();
        return view('pages.institutes.index', compact('institutes'));
    }

    public function create()
    {
        $units = Unit::all();
        return view('pages.institutes.create', compact('units'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'unit_id' => 'nullable|exists:units,id',
            'vidio' => 'nullable|string|max:255',
            'word' => 'nullable|string|max:255',
            'muhadara' => 'nullable|string|max:255',
            'values' => 'nullable|string|max:255',
            'plan' => 'nullable|string|max:255',
            'goals' => 'nullable|string|max:255',
            'number' => 'nullable|integer',
            'employees' => 'nullable|integer',
            'classrooms' => 'nullable|integer',
            'graduates' => 'nullable|integer',
            'academic_council' => 'nullable|file',
            'structure' => 'nullable|file',
            'strategy' => 'nullable|file',
        ]);

        $validated['setting_id'] = optional(Setting::first())->id ?? 1;
        if (empty($validated['unit_id'])) {
            $validated['unit_id'] = optional(Unit::first())->id;
        }

        foreach (['academic_council', 'structure', 'strategy'] as $fileField) {
            if ($request->hasFile($fileField)) {
                $validated[$fileField] = $this->storeFile($request, $fileField, 'institutes', 'public');
            }
        }

        $this->institute->store($validated);
        return redirect()->route('institutes.index')->with('success', 'تم اضافة بيانات المعهد بنجاح');
    }

    public function edit(string $id)
    {
        $institute = $this->institute->checkId($id);
        $units = Unit::all();
        return view('pages.institutes.edit', compact('institute', 'units'));
    }

    public function update(Request $request, string $id)
    {
        $institute = $this->institute->checkId($id);

        $validated = $request->validate([
            'unit_id' => 'nullable|exists:units,id',
            'vidio' => 'nullable|string|max:255',
            'word' => 'nullable|string|max:255',
            'muhadara' => 'nullable|string|max:255',
            'values' => 'nullable|string|max:255',
            'plan' => 'nullable|string|max:255',
            'goals' => 'nullable|string|max:255',
            'number' => 'nullable|integer',
            'employees' => 'nullable|integer',
            'classrooms' => 'nullable|integer',
            'graduates' => 'nullable|integer',
            'academic_council' => 'nullable|file',
            'structure' => 'nullable|file',
            'strategy' => 'nullable|file',
        ]);

        $validated['setting_id'] = $institute->setting_id ?: optional(Setting::first())->id;
        if (empty($validated['unit_id'])) {
            $validated['unit_id'] = $institute->unit_id ?: optional(Unit::first())->id;
        }

        foreach (['academic_council', 'structure', 'strategy'] as $fileField) {
            if ($request->hasFile($fileField)) {
                if (!empty($institute->$fileField)) {
                    $this->deleteFile($institute->$fileField, 'public');
                }
                $validated[$fileField] = $this->storeFile($request, $fileField, 'institutes', 'public');
            } else {
                $validated[$fileField] = $institute->$fileField; // keep old file path
            }
        }

        $this->institute->update($id, $validated);
        return redirect()->route('institutes.index')->with('success', 'تم تحديث بيانات المعهد بنجاح');
    }

    public function destroy(string $id)
    {
        $institute = $this->institute->checkId($id);
        foreach (['academic_council', 'structure', 'strategy'] as $fileField) {
            if (!empty($institute->$fileField)) {
                $this->deleteFile($institute->$fileField, 'public');
            }
        }
        $institute->delete();
        return redirect()->route('institutes.index')->with('success', 'تم حذف بيانات المعهد بنجاح');
    }

    private function storeFile($request, $file, $folder, $disk)
    {
        if ($request->hasFile($file)) {
            $filename = Str::uuid() . '.' . $request->file($file)->getClientOriginalExtension();
            $path = $request->file($file)->storeAs($folder, $filename, $disk);
            return $path;
        }
        return null;
    }

    private function deleteFile($path, $disk)
    {
        if ($path && Storage::disk($disk)->exists($path)) {
            Storage::disk($disk)->delete($path);
        }
    }
}
