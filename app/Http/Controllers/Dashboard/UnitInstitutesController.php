<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\UnitInstitutesRequest;
use App\Models\UnitInstitutes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UnitInstitutesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = UnitInstitutes::orderBy('created_at', 'desc');
        
        // Filter by status if provided
        if ($request->has('status')) {
            if ($request->status === 'active') {
                $query->where('status', true);
            } elseif ($request->status === 'inactive') {
                $query->where('status', false);
            }
        }
        
        $unitInstitutes = $query->get();
        return view('pages.unit_institutes.index', compact('unitInstitutes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.unit_institutes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UnitInstitutesRequest $request)
    {
        $data = $request->except('image');
        
        // Handle status checkbox - if not checked, set to false
        $data['status'] = $request->has('status') ? true : false;
        
        if ($request->hasFile('image')) {
            $data['image'] = $this->storeFile($request, 'unit_institutes', 'image');
        }
        
        UnitInstitutes::create($data);
        
        return redirect()->route('unit_institutes.index')
            ->with('success', 'تم إضافة وحدة المعهد بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $unitInstitute = UnitInstitutes::findOrFail($id);
        return view('pages.unit_institutes.show', compact('unitInstitute'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $unitInstitute = UnitInstitutes::findOrFail($id);
        return view('pages.unit_institutes.edit', compact('unitInstitute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UnitInstitutesRequest $request, string $id)
    {
        $unitInstitute = UnitInstitutes::findOrFail($id);
        $data = $request->except('image');
        
        // Handle status checkbox - if not checked, set to false
        $data['status'] = $request->has('status') ? true : false;
        
        if ($request->hasFile('image')) {
            $this->deleteFile($unitInstitute->image, 'unit_institutes');
            $data['image'] = $this->storeFile($request, 'unit_institutes', 'image');
        }
        
        $unitInstitute->update($data);
        
        return redirect()->route('unit_institutes.index')
            ->with('success', 'تم تحديث وحدة المعهد بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unitInstitute = UnitInstitutes::findOrFail($id);
        $this->deleteFile($unitInstitute->image, 'unit_institutes');
        $unitInstitute->delete();
        
        return redirect()->route('unit_institutes.index')
            ->with('success', 'تم حذف وحدة المعهد بنجاح');
    }

    /**
     * Store uploaded file
     */
    private function storeFile($request, $disk, $file)
    {
        if ($request->hasFile($file)) {
            $filename = Str::uuid() . '.' . $request->file($file)->getClientOriginalExtension();
            $path = $request->file($file)->storeAs('', $filename, $disk);
            return $path;
        }
        return null;
    }

    /**
     * Delete file from storage
     */
    private function deleteFile($path, $disk)
    {
        if ($path && Storage::disk($disk)->exists($path)) {
            Storage::disk($disk)->delete($path);
        }
    }
}
