<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\VideosDepartmentResource;
use App\Http\Resources\VideosDepartmentCollection;
use App\Models\VideosDepartment;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\ApiResponse;

class VideosDepartmentController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $query = VideosDepartment::with('department:id,name');

            // Filter by department if provided
            if ($request->has('department_id')) {
                $query->where('department_id', $request->department_id);
            }

            // Search by department name
            if ($request->has('search')) {
                $search = $request->search;
                $query->whereHas('department', function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            }

            $videosDepartments = $query->orderBy('created_at', 'desc')->paginate(10);

            $data = new VideosDepartmentCollection($videosDepartments);

            return $this->successResponse($data, 'Videos departments fetched successfully', 200);

        } catch (\Exception $e) {
            return $this->errorResponse('Failed to fetch videos departments: ' . $e->getMessage(), 500);
        }
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
            'department_id.required' => 'Department ID is required',
            'department_id.exists' => 'Selected department does not exist',
            'video.required' => 'Video file is required',
            'video.file' => 'The uploaded file must be a valid file',
            'video.mimes' => 'Video must be one of: mp4, avi, mov, wmv, flv, webm',
            'video.max' => 'Video file size must not exceed 119.63MB',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 422);
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

            $videosDepartment = VideosDepartment::create([
                'department_id' => $request->department_id,
                'video' => $videoPath ?? null,
            ]);

            $videosDepartment->load('department:id,name');
            $data = new VideosDepartmentResource($videosDepartment);

            return $this->successResponse($data, 'Video department created successfully', 201);

        } catch (\Exception $e) {
            return $this->errorResponse('Failed to create video department: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(VideosDepartment $videosDepartment)
    {
        try {
            $videosDepartment->load('department:id,name');
            $data = new VideosDepartmentResource($videosDepartment);

            return $this->successResponse($data, 'Video department fetched successfully', 200);

        } catch (\Exception $e) {
            return $this->errorResponse('Failed to fetch video department: ' . $e->getMessage(), 500);
        }
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
            'department_id.required' => 'Department ID is required',
            'department_id.exists' => 'Selected department does not exist',
            'video.file' => 'The uploaded file must be a valid file',
            'video.mimes' => 'Video must be one of: mp4, avi, mov, wmv, flv, webm',
            'video.max' => 'Video file size must not exceed 119.63MB',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 422);
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
            $videosDepartment->load('department:id,name');
            $data = new VideosDepartmentResource($videosDepartment);

            return $this->successResponse($data, 'Video department updated successfully', 200);

        } catch (\Exception $e) {
            return $this->errorResponse('Failed to update video department: ' . $e->getMessage(), 500);
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

            return $this->successResponse(null, 'Video department deleted successfully', 200);

        } catch (\Exception $e) {
            return $this->errorResponse('Failed to delete video department: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Get videos by department
     */
    public function getByDepartment(Department $department)
    {
        try {
            $videosDepartments = VideosDepartment::where('department_id', $department->id)
                ->with('department:id,name')
                ->orderBy('created_at', 'desc')
                ->get();

            $data = VideosDepartmentResource::collection($videosDepartments);

            return $this->successResponse($data, 'Department videos fetched successfully', 200);

        } catch (\Exception $e) {
            return $this->errorResponse('Failed to fetch department videos: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Display the video file
     */
    public function showVideo(VideosDepartment $videosDepartment)
    {
        if (!$videosDepartment->video || !Storage::exists('public/' . $videosDepartment->video)) {
            return $this->errorResponse('Video file not found', 404);
        }

        $videoUrl = Storage::url($videosDepartment->video);
        
        return $this->successResponse([
            'video_url' => $videoUrl,
            'department_name' => $videosDepartment->department->name ?? 'Unknown Department'
        ], 'Video URL generated successfully', 200);
    }
}
