<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Scholarships;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScholarshipsController extends Controller
{
    public function index()
    {
        $scholarships = Scholarships::latest()->get();
        return view('pages.scholarships.index', compact('scholarships'));
    }

    public function create()
    {
        return view('pages.scholarships.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => ['required', 'string'],
            'image_path' => ['required','max:2048'],
            'details'    => ['required', 'string'],
        ]);

        $data = $request->except(['image_path', '_token']);

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $this->storeFile($request, 'image_path', '', 'scholarships');
        }

        Scholarships::create($data);

        return redirect()->route('scholarships.index')
            ->with('success', 'تم إضافة المنحة بنجاح ✅');
    }

    public function edit(Scholarships $scholarship)
    {
        return view('pages.scholarships.edit', compact('scholarship'));
    }

    public function update(Request $request, Scholarships $scholarship)
    {
        $request->validate([
            'name'       => 'required|string',
            'image_path' => 'nullable|max:2048',
            'details'    => 'required|string',  
        ]);

        $data = $request->except(['image_path', '_token']);

        if ($request->hasFile('image_path')) {
             $this->deleteImageDisk($scholarship->image_path);
            $data['image_path'] = $this->storeFile($request, 'image_path', '', 'scholarships');
        }

        $scholarship->update($data);

        return redirect()->route('scholarships.index')
            ->with('success', 'تم تحديث المنحة بنجاح ✅');
    }

    public function destroy(Scholarships $scholarship)
    {
        try {
            $this->deleteImageDisk($scholarship->image_path);
            $scholarship->delete();

            return redirect()->route('scholarships.index')
                ->with('success', 'تم حذف المنحة بنجاح ✅');
        } catch (\Exception $e) {
            return redirect()->route('scholarships.index')
                ->with('error', 'حدث خطأ أثناء الحذف ❌');
        }
    }

    private function deleteImageDisk($imagePath)
    {
        if ($imagePath && Storage::disk('scholarships')->exists($imagePath)) {
            Storage::disk('scholarships')->delete($imagePath);
        }
    }

    private function storeFile(Request $request, string $file, string $folder, string $disk): ?string
    {
        if ($request->hasFile($file)) {
            
            return $request->file($file)->store($folder, $disk);
        }
        return null;
    }
}
