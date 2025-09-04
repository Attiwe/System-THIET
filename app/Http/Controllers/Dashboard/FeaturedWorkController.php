<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FeaturedWorServices;
use App\Http\Requests\dashboard\FeaturedWorkRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\FeaturedWork;



class FeaturedWorkController extends Controller
{
    protected $featuredWorkService;

    public function __construct(FeaturedWorServices $featuredWorkService)
    {
        $this->featuredWorkService = $featuredWorkService;
    }

    public function index()
    {
        $featuredWorks = $this->featuredWorkService->getAll();
        return view('pages.featuredWorks.index', compact('featuredWorks'));
    }

    public function create()
    {
        return view('pages.featuredWorks.create');
    }


    public function store(FeaturedWorkRequest $request)
    {
        $validated = $request->except('image');
        if ($request->hasFile('image')) {
            $validated['image'] = $this->storeFile($request, 'image', 'student-featured_work', 'student_featured_work');
        }
        $this->featuredWorkService->store($validated);
        return redirect()->route('featured_work.index')->with('success', 'تم اضافة النشطه الطلابية بنجاح');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $featuredWork = $this->featuredWorkService->checkId($id);
        return view('pages.featuredWorks.edit', compact('featuredWork'));
    }

    public function update(FeaturedWorkRequest $request, string $id)
    {
        $validated = $request->except('image');
        if ($request->hasFile('image')) {
            $this->deleteFile($validated['image'], 'student_featured_work');
            $validated['image'] = $this->storeFile($request, 'image', 'student-featured_work', 'student_featured_work');
        }
        $this->featuredWorkService->update($id, $validated);
        return redirect()->route('featured_work.index')->with('success', 'تم تحديث النشطه الطلابية بنجاح');
    }


    public function destroy(string $id)
    {
        $featuredWork = $this->featuredWorkService->checkId($id);
        $this->deleteFile($featuredWork->image, 'student_featured_work');
        $featuredWork->delete();
        return redirect()->route('featured_work.index')->with('success', 'تم حذف النشطه الطلابية بنجاح');
    }

    public function trashed()
    {
        $featuredWorks = FeaturedWork::onlyTrashed()->get();
        return view('pages.featuredWorks.trashed', compact('featuredWorks'));
    }

    public function restore(string $id)
    {
        $featuredWork = FeaturedWork::withTrashed()->findOrFail($id);
        $featuredWork->restore();
        return redirect()->route('featured_work.index')->with('success', 'تم استعادة النشطه الطلابية بنجاح');
    }

    public function forceDelete(string $id)
    {
        $featuredWork = FeaturedWork::withTrashed()->findOrFail($id);
        $featuredWork->forceDelete();
        return redirect()->route('featured_work.index')->with('success', 'تم حذف النشطه الطلابية بنجاح');
    }

    private function storeFile($request, $file, $folder, $disk)
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
