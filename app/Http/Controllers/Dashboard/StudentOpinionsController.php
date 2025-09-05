<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\StudentOpinionsServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\dashboard\StudentOpinionsRequest;
use App\Models\StudentOpinions;



class StudentOpinionsController extends Controller
{
    protected $studentOpinionsService;
    public function __construct(StudentOpinionsServices $studentOpinionsServices)
    {
        $this->studentOpinionsServices = $studentOpinionsServices;
    }

    public function index()
    {
        $studentOpinions = $this->studentOpinionsServices->getAll();
        return view('pages.studentOpinion.index', compact('studentOpinions'));
    }

    public function store(StudentOpinionsRequest $request)
    {
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeFile($request, 'studentOpinions', 'image', 'studentOpinions');
        }

        $this->studentOpinionsServices->store($data);

        return redirect()->route('studentOpinions.index')->with('success', 'تم اضافة اراء الطلاب بنجاح');
    }


    public function edit($studentOpinion)
    {
        $studentOpinions = $this->studentOpinionsServices->checkId($studentOpinion);
        return view('pages.studentOpinion.edit', compact('studentOpinions'));
    }

    public function update(StudentOpinionsRequest $request)
    {
        $studentOpinions = $this->studentOpinionsServices->checkId($request->id);
        $data = $request->except(['image']);

        if ($request->hasFile('image')) {
            $this->deleteFile($studentOpinions->image, 'studentOpinions');
            $data['image'] = $this->storeFile($request, 'studentOpinions', 'image', 'studentOpinions');
        }

        $this->studentOpinionsServices->update($studentOpinions->id, $data);
        return redirect()->route('studentOpinions.index')->with('success', 'تم تحديث اراء الطلاب بنجاح');
    }


    public function destroy($id)
    {
        $this->studentOpinionsServices->delete($id);
        return redirect()->route('studentOpinions.index')->with('success', 'تم حذف اراء الطلاب بنجاح');
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

    public function trashed()
    {
        $studentOpinions = StudentOpinions::onlyTrashed()->get();
        return view('pages.studentOpinion.trashed', compact('studentOpinions'));
    }

    public function restore(string $id)
    {
        $studentOpinion = StudentOpinions::withTrashed()->findOrFail($id);
        $studentOpinion->restore();
        return redirect()->route('studentOpinions.index')->with('success', 'تم استعادة اراء الطلاب بنجاح');
    }

    public function forceDelete(string $id)
    {
        $studentOpinion = StudentOpinions::withTrashed()->findOrFail($id);
        $studentOpinion->forceDelete();
        return redirect()->back()->with('success', 'تم حذف اراء الطلاب بنجاح');
    }

}
