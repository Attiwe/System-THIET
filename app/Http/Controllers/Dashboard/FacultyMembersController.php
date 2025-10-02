<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\FacultyMembersRequest;
use App\Models\Department;
use App\Models\FacultyMembers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class FacultyMembersController extends Controller
{
    public function index()
    {
        $facultyMembers = FacultyMembers::latest()->get();
        $departments = Department::select('id', 'name')->get();
        $facultyCode = $this->generateFacultyCode();
        return view('pages.facultyMembe.index', compact('facultyMembers', 'departments', 'facultyCode'));
    }
    private function generateFacultyCode()
    {
        $lastFacultyCode = FacultyMembers::max('faculty_code') ?? 0;
        $newFacultyCode = $lastFacultyCode + 1;
        return $newFacultyCode;
    }
    public function create()
    {
        // $departments = Department::select('id', 'name')->get();
        // $facultyCode = $this->generateFacultyCode();
        // return view('pages.facultyMembe.create', compact('departments', 'facultyCode'));
    }

    /**
     * Show the form for creating a new resource in a separate page.
     */
    public function createPage()
    {
        $departments = Department::select('id', 'name')->get();
        $facultyCode = $this->generateFacultyCode();
        return view('pages.facultyMembe.create_page', compact('departments', 'facultyCode'));
    }

    public function store(FacultyMembersRequest $request)
    {
        $data = $request->all();
        $data['resume'] = $this->storeFile($request, 'resume', '', 'cv');
        $data['personal_image'] = $this->storeFile($request, 'personal_image', '', 'personal_image');
        $data['researches'] = $this->storeFile($request, 'researches', '', 'researches');
        //    dd($data);
        try {
            FacultyMembers::create($data);
            return redirect()->route('facultyMembers.index')->with('success', 'تم إنشاء عضو هيئة تدريس بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FacultyMembers $facultyMember)
    {
        $facultyMember->load('department');
        return view('pages.facultyMembe.show', compact('facultyMember'));
    }

    private function storeFile($request, $file, $folder, $disk = 'local')
    {
        if ($request->hasFile($file)) {
            $filename = Str::uuid() . '.' . $request->file($file)->getClientOriginalExtension();
            $path = $request->file($file)->storeAs($folder, $filename, $disk);
            return $path;
        }
    }

    public function edit($id)
    {
        $facultyMember = FacultyMembers::findOrFail($id);
        $departments = Department::select('id', 'name')->get();
        return view('pages.facultyMembe.edit', compact('facultyMember', 'departments'));
    }

    public function update(FacultyMembersRequest $request, $id)
    {
        $facultyMember = FacultyMembers::findOrFail($id);

        $data = $request->except(['personal_image', 'resume', 'researches', '_token', '_method']);

         if ($request->hasFile('resume')) {
            $this->deleteImageDisk($facultyMember->resume, 'cv');   
            $data['resume'] = $this->storeFile($request, 'resume', 'cv', 'cv');
        } else {
            $data['resume'] = $facultyMember->resume; 
        }

        if ($request->hasFile('personal_image')) {
            $this->deleteImageDisk($facultyMember->personal_image, 'personal_image');
            $data['personal_image'] = $this->storeFile($request, 'personal_image', 'personal_image', 'personal_image');
        } else {
            $data['personal_image'] = $facultyMember->personal_image;
        }

        if ($request->hasFile('researches')) {
            $this->deleteImageDisk($facultyMember->researches, 'researches');
            $data['researches'] = $this->storeFile($request, 'researches', 'researches', 'researches');
        } else {
            $data['researches'] = $facultyMember->researches;
        }

        try {
            $facultyMember->update($data);
            return redirect()->route('facultyMembers.index')->with('success', 'تم تعديل عضو هيئة تدريس بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $facultyMember = FacultyMembers::findOrFail($id);
        try {
            if ($facultyMember->resume) {
                $this->deleteImageDisk($facultyMember->resume, 'cv');
            }
            if ($facultyMember->personal_image) {
                $this->deleteImageDisk($facultyMember->personal_image, 'personal_image');
            }
            if ($facultyMember->researches) {
                $this->deleteImageDisk($facultyMember->researches, 'researches');
            }
            $facultyMember->delete();
            return redirect()->route('facultyMembers.index')->with('success', 'تم حذف عضو هيئة تدريس بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ: ' . $e->getMessage());
        }
    }

    private function deleteImageDisk($imagePath, $disk)
    {
        if (!$imagePath)
            return;

        if (Storage::disk($disk)->exists($imagePath)) {
            Storage::disk($disk)->delete($imagePath);
        }
    }

    public function showResume(string $id)
    {
        $feculty = FacultyMembers::findOrFail($id);

        $filePath = $feculty->resume;

        if (!$filePath || !Storage::disk('cv')->exists($filePath)) {
            abort(404, 'Resume not found');
        }

        $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        $fullPath = public_path('image/resume/' . $filePath);

        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
            return response()->file($fullPath);
        } elseif ($extension === 'pdf') {
            return response()->file($fullPath);
        }
    }
    public function showResearches(string $id)
    {
        $feculty = FacultyMembers::findOrFail($id);

        $filePath = $feculty->researches;

        if (!$filePath || !Storage::disk('researches')->exists($filePath)) {
            abort(404, 'Researches not found');
        }

        $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        $fullPath = public_path('image/researches/' . $filePath);

        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
            return response()->file($fullPath);
        } elseif ($extension === 'pdf') {
            return response()->file($fullPath);
        }
    }

}
