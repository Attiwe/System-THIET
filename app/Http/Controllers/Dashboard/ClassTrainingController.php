<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\ClassTrainingRequest;
use App\Models\Department;
use App\Models\ClassTraining;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ClassTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classTrainings = ClassTraining::with(['department:id,name'])->latest()->get();
        $departments = Department::where('is_active', true)->select('id', 'name')->get();
        return view('pages.class_trainings.index', compact('classTrainings', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassTrainingRequest $request)
    {
        $data = $request->only(['department_id', 'class_name']);
        
        // Handle image upload
        if ($request->hasFile('class_image')) {
            $image = $request->file('class_image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('class_trainings/images', $imageName, 'public');
            $data['class_image'] = $imageName;
        }
        
        
        try {
            ClassTraining::create($data);
            return redirect()->route('classTrainings.index')->with('success', 'تم إضافة التدريب الصفي بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClassTrainingRequest $request, $id)
    {
        $classTraining = ClassTraining::findOrFail($id);
        $data = $request->only(['department_id', 'class_name']);
        
        // Handle image upload
        if ($request->hasFile('class_image')) {
            // Delete old image if exists
            if ($classTraining->class_image) {
                Storage::disk('public')->delete('class_trainings/images/' . $classTraining->class_image);
            }
            
            // Upload new image
            $image = $request->file('class_image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('class_trainings/images', $imageName, 'public');
            $data['class_image'] = $imageName;
        }
        
        
        try {
            $classTraining->update($data);
            return redirect()->route('classTrainings.index')->with('success', 'تم تحديث التدريب الصفي بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $classTraining = ClassTraining::findOrFail($id);
        
        try {
            // Delete associated files
            if ($classTraining->class_image) {
                Storage::disk('public')->delete('class_trainings/images/' . $classTraining->class_image);
            }
            
            $classTraining->delete();
            return redirect()->route('classTrainings.index')->with('success', 'تم حذف التدريب الصفي بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ: ' . $e->getMessage());
        }
    }

    /**
     * Show class image
     */
    public function showImage(string $id)
    {
        $classTraining = ClassTraining::findOrFail($id);
        $imagePath = $classTraining->class_image;

        if (!$imagePath || !Storage::disk('public')->exists('class_trainings/images/' . $imagePath)) {
            abort(404, 'Class image not found');
        }

        $fullPath = storage_path('app/public/class_trainings/images/' . $imagePath);
        return response()->file($fullPath);
    }

}
