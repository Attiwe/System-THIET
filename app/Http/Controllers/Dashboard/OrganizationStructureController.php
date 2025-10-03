<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\OrganizationStructureRequest;
use App\Models\OrganizationStructure;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizationStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizationStructures = OrganizationStructure::with('unit')->latest()->get();
        $units = Unit::orderBy('name')->get();
        
        return view('pages.organization-structure.index', compact('organizationStructures', 'units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = Unit::orderBy('name')->get();
        return view('pages.organization-structure.create', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrganizationStructureRequest $request)
    {
        try {
            $data = $request->validated();
            
            if ($request->hasFile('file_path')) {
                $file = $request->file('file_path');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/organization-structures', $fileName);
                $data['file_path'] = $fileName;
            }
            
            OrganizationStructure::create($data);
            
            return redirect()->route('organization-structure.index')
                ->with('success', 'تم إضافة الهيكل التنظيمي بنجاح');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء إضافة الهيكل التنظيمي: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(OrganizationStructure $organizationStructure)
    {
        $organizationStructure->load('unit');
        return view('pages.organization-structure.show', compact('organizationStructure'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrganizationStructure $organizationStructure)
    {
        $units = Unit::orderBy('name')->get();
        return view('pages.organization-structure.edit', compact('organizationStructure', 'units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrganizationStructureRequest $request, OrganizationStructure $organizationStructure)
    {
        try {
            $data = $request->validated();
            
            if ($request->hasFile('file_path')) {
                // Delete old file
                if ($organizationStructure->file_path) {
                    $oldFilePath = 'public/organization-structures/' . $organizationStructure->file_path;
                    if (Storage::exists($oldFilePath)) {
                        Storage::delete($oldFilePath);
                    }
                }
                
                // Store new file
                $file = $request->file('file_path');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/organization-structures', $fileName);
                $data['file_path'] = $fileName;
            }
            
            $organizationStructure->update($data);
            
            return redirect()->route('organization-structure.index')
                ->with('success', 'تم تحديث الهيكل التنظيمي بنجاح');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء تحديث الهيكل التنظيمي: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrganizationStructure $organizationStructure)
    {
        try {
            // The file will be deleted automatically by the model's boot method
            $organizationStructure->delete();
            
            return redirect()->route('organization-structure.index')
                ->with('success', 'تم حذف الهيكل التنظيمي بنجاح');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء حذف الهيكل التنظيمي: ' . $e->getMessage());
        }
    }

    /**
     * Download the organization structure file
     */
    public function download($filename)
    {
        $path = storage_path('app/public/organization-structures/' . $filename);
        
        if (!file_exists($path)) {
            abort(404);
        }
        
        return response()->file($path);
    }
}
