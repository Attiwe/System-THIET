<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LibraryOpinion;
use App\Http\Requests\dashboard\LibraryOpinionRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
    

class LibraryOpinionController extends Controller
{
    public function index()
    {
        $libraryOpinions = LibraryOpinion::all();
        return view('pages.libraryOpinion.index', compact('libraryOpinions'));
    }

    public function store(LibraryOpinionRequest $request)
    {
        $data = $request->except('image_student', 'image_library');

        if ($request->hasFile('image_student')) {
            $data['image_student'] = $this->storeFile($request, 'libraryOpinions', 'image_student', 'libraryOpinions');
        }

        if ($request->hasFile('image_library')) {
            $data['image_library'] = $this->storeFile($request, 'libraryOpinions', 'image_library', 'libraryOpinions');
        }

        LibraryOpinion::create($data);
        return redirect()->route('libraryOpinions.index')->with('success', 'تم اضافة اراء الطلاب بنجاح');
    }

    public function edit($libraryOpinion)
    {
        $libraryOpinion = LibraryOpinion::findOrFail($libraryOpinion);
        return view('pages.libraryOpinion.edit', compact('libraryOpinion'));
    }

    public function update(LibraryOpinionRequest $request)
    {
        $libraryOpinion = LibraryOpinion::findOrFail($request->id);

        $data = $request->except(['image_student', 'image_library']);

        if ($request->hasFile('image_student')) {
            if ($libraryOpinion->image_student) {
                $this->deleteFile($libraryOpinion->image_student, 'libraryOpinions');
            }
            $data['image_student'] = $this->storeFile($request, 'libraryOpinions', 'image_student', 'libraryOpinions');
        }

        if ($request->hasFile('image_library')) {
            if ($libraryOpinion->image_library) {
                $this->deleteFile($libraryOpinion->image_library, 'libraryOpinions');
            }
            $data['image_library'] = $this->storeFile($request, 'libraryOpinions', 'image_library', 'libraryOpinions');
        }

        $libraryOpinion->update($data);

        return redirect()->route('libraryOpinions.index')
            ->with('success', 'تم تحديث آراء الطلاب بنجاح ✅');
    }


    public function destroy($id)
    {
        $libraryOpinion = LibraryOpinion::findOrFail($id);
        $this->deleteFile($libraryOpinion->image_student, 'libraryOpinions');
        $libraryOpinion->delete();
        return redirect()->route('libraryOpinions.index')->with('success', 'تم حذف اراء الطلاب بنجاح');
    }
    private function deleteFile($path, $disk)
    {
        if (!$path)
            return;

        if (Storage::disk($disk)->exists($path)) {
            Storage::disk($disk)->delete($path);
        }
    }

    private function storeFile($request, $folder, $file, $disk)
    {
        if ($request->hasFile($file)) {
            $filename = Str::uuid() . '.' . $request->file($file)->getClientOriginalExtension();
            $path = $request->file($file)->storeAs($folder, $filename, $disk);
            return $path;
        }
    }


 

}
