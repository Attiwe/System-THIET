<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\VideosDepartment;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class VideosDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videosDepartments = VideosDepartment::with('department:id,name')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('pages.videos_departments.index', compact('videosDepartments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::where('is_active', 1)
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        return view('pages.videos_departments.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'department_id' => 'required|exists:departments,id',
            'video' => 'required|file|mimes:mp4,avi,mov,wmv,flv,webm|max:122501', // 119.63MB max
        ], [
            'department_id.required' => 'Please select a department',
            'department_id.exists' => 'Selected department does not exist',
            'video.required' => 'Please upload a video file',
            'video.file' => 'The uploaded file must be a valid file',
            'video.mimes' => 'Video must be one of: mp4, avi, mov, wmv, flv, webm',
            'video.max' => 'Video file size must not exceed 119.63MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Handle video file upload
            if ($request->hasFile('video')) {
                $videoFile = $request->file('video');
                $videoName = time() . '_' . $videoFile->getClientOriginalName();
                $videoPath = $videoFile->storeAs('public/videos_departments', $videoName);
                
                // Remove 'public/' from the path for database storage
                $videoPath = str_replace('public/', '', $videoPath);
            }

            VideosDepartment::create([
                'department_id' => $request->department_id,
                'video' => $videoPath ?? null,
            ]);

            return redirect()->route('videos_departments.index')
                ->with('success', 'Video department created successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while creating the video department: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(VideosDepartment $videosDepartment)
    {
        $videosDepartment->load('department:id,name');
        
        return view('pages.videos_departments.show', compact('videosDepartment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VideosDepartment $videosDepartment)
    {
        $departments = Department::where('is_active', 1)
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        return view('pages.videos_departments.edit', compact('videosDepartment', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VideosDepartment $videosDepartment)
    {
        $validator = Validator::make($request->all(), [
            'department_id' => 'required|exists:departments,id',
            'video' => 'nullable|file|mimes:mp4,avi,mov,wmv,flv,webm|max:122501', // 119.63MB max
        ], [
            'department_id.required' => 'Please select a department',
            'department_id.exists' => 'Selected department does not exist',
            'video.file' => 'The uploaded file must be a valid file',
            'video.mimes' => 'Video must be one of: mp4, avi, mov, wmv, flv, webm',
            'video.max' => 'Video file size must not exceed 119.63MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $updateData = [
                'department_id' => $request->department_id,
            ];

            // Handle video file upload if provided
            if ($request->hasFile('video')) {
                // Delete old video file if exists
                if ($videosDepartment->video && Storage::exists('public/' . $videosDepartment->video)) {
                    Storage::delete('public/' . $videosDepartment->video);
                }

                $videoFile = $request->file('video');
                $videoName = time() . '_' . $videoFile->getClientOriginalName();
                $videoPath = $videoFile->storeAs('public/videos_departments', $videoName);
                
                // Remove 'public/' from the path for database storage
                $updateData['video'] = str_replace('public/', '', $videoPath);
            }

            $videosDepartment->update($updateData);

            return redirect()->route('videos_departments.index')
                ->with('success', 'Video department updated successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while updating the video department: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VideosDepartment $videosDepartment)
    {
        try {
            // Delete video file if exists
            if ($videosDepartment->video && Storage::exists('public/' . $videosDepartment->video)) {
                Storage::delete('public/' . $videosDepartment->video);
            }

            $videosDepartment->delete();

            return redirect()->route('videos_departments.index')
                ->with('success', 'Video department deleted successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while deleting the video department: ' . $e->getMessage());
        }
    }

    /**
     * Display the video file
     */
    public function showVideo(VideosDepartment $videosDepartment)
    {
        if (!$videosDepartment->video || !Storage::exists('public/' . $videosDepartment->video)) {
            abort(404);
        }

        return Storage::response('public/' . $videosDepartment->video);
    }
}
