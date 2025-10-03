<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\TrainingCourseRequest;
use App\Models\TrainingCourse;
use App\Models\Unit;
use Illuminate\Support\Facades\Storage;

class TrainingCourseController extends Controller
{
    public function index()
    {
        $items = TrainingCourse::with(['unit:id,name'])->latest()->get();
        $units = cache()->remember('units.id_name', 300, function () {
            return Unit::select('id', 'name')->get();
        });
        return view('pages.training_courses.index', compact('items', 'units'));
    }

    public function store(TrainingCourseRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            // Store on the 'public' disk → storage/app/public/training-courses
            $data['image'] = $request->file('image')->store('training-courses', 'public');
        }
        TrainingCourse::create($data);
        return redirect()->route('training-courses.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function update(TrainingCourseRequest $request, string $id)
    {
        $row = TrainingCourse::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('image')) {
            if ($row->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($row->image)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($row->image);
            }
            $data['image'] = $request->file('image')->store('training-courses', 'public');
        }
        $row->update($data);
        return redirect()->route('training-courses.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(string $id)
    {
        $row = TrainingCourse::findOrFail($id);
        if ($row->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($row->image)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($row->image);
        }
        $row->delete();
        return redirect()->route('training-courses.index')->with('success', 'تم الحذف بنجاح');
    }
}


