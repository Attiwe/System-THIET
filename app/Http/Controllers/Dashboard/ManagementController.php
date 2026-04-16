<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\ManagementRequest;
use App\Models\Management;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;




class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $management = Management::latest()->get();
        return view('pages.mangment.index', compact('management'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.mangment.create');
    }


    public function store(ManagementRequest $request)
    {
        $data = $request->except(['image', 'resume', '_token']);

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeUploadedFile($request->file('image'), '/details/news', 'detail_news');
        }

        if ($request->hasFile('resume')) {
            $data['resume'] = $this->storeUploadedFile($request->file('resume'), '/resume', 'cv');
        }

        try {
            Management::create($data);
            return redirect()->route('management.index')->with('success', 'تم إنشاء مدير بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ: ' . $e->getMessage());
        }
    }


    public function showResume(string $id)
    {
        $manager = Management::findOrFail($id);

        $filePath = $manager->resume;

        if (!$filePath || !Storage::disk('cv')->exists($filePath)) {
            abort(404, 'Resume not found');
        }

        $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        $fullPath = Storage::disk('cv')->path($filePath);

        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'pdf'])) {
            return response()->file($fullPath);
        }
    }

    
    public function edit(string $id)
    {
        $management = Management::findOrFail($id);
        return view('pages.mangment.edit', compact('management'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ManagementRequest $request, string $id)
    {
        $management = Management::findOrFail($id);
        $data = $request->except(['image', 'resume', '_token', '_method']);

        if ($request->hasFile('image')) {
            if ($management->image && Storage::disk('detail_news')->exists($management->image)) {
                Storage::disk('detail_news')->delete($management->image);
            }
            $data['image'] = $this->storeUploadedFile($request->file('image'), '/details/news', 'detail_news');
        }

        if ($request->hasFile('resume')) {
            if ($management->resume && Storage::disk('cv')->exists($management->resume)) {
                Storage::disk('cv')->delete($management->resume);
            }
            $data['resume'] = $this->storeUploadedFile($request->file('resume'), '/resume', 'cv');
        }

        try {
            $management->update($data);
            return redirect()->route('management.index')->with('success', 'تم التعديل بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $management = Management::findOrFail($id);
        try {
            if ($management->image && Storage::disk('detail_news')->exists($management->image)) {
                Storage::disk('detail_news')->delete($management->image);
            }
            if ($management->resume && Storage::disk('cv')->exists($management->resume)) {
                Storage::disk('cv')->delete($management->resume);
            }
            $management->delete();
            return redirect()->route('management.index')->with('success', 'تم الحذف بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ: ' . $e->getMessage());
        }
    }

    private function storeUploadedFile($file, $folder, $disk)
    {
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs($folder, $filename, ['disk' => $disk]);
        return $path;
    }


}
