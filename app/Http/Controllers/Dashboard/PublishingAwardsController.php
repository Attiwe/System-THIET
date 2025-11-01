<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\PublishingAwardsRequest;
use App\Models\PublishingAwards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PublishingAwardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishingAwards = PublishingAwards::orderBy('created_at', 'desc')->get();
        return view('pages.publishing_awards.index', compact('publishingAwards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.publishing_awards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublishingAwardsRequest $request)
    {
        $data = $request->validated();
        
        // Handle file upload
        if ($request->hasFile('project_file')) {
            $file = $request->file('project_file');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('publishing_awards', $fileName, 'public');
            $data['project_file'] = $fileName;
        }
        
        PublishingAwards::create($data);
        
        return redirect()->route('publishing_awards.index')
            ->with('success', 'تم إضافة جائزة النشر بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $publishingAward = PublishingAwards::findOrFail($id);
        return view('pages.publishing_awards.show', compact('publishingAward'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $publishingAward = PublishingAwards::findOrFail($id);
        return view('pages.publishing_awards.edit', compact('publishingAward'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublishingAwardsRequest $request, string $id)
    {
        $publishingAward = PublishingAwards::findOrFail($id);
        $data = $request->validated();
        
        // Handle file upload
        if ($request->hasFile('project_file')) {
            // Delete old file if exists
            if ($publishingAward->project_file && Storage::disk('public')->exists('publishing_awards/' . $publishingAward->project_file)) {
                Storage::disk('public')->delete('publishing_awards/' . $publishingAward->project_file);
            }
            
            $file = $request->file('project_file');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('publishing_awards', $fileName, 'public');
            $data['project_file'] = $fileName;
        }
        
        $publishingAward->update($data);
        
        return redirect()->route('publishing_awards.index')
            ->with('success', 'تم تحديث جائزة النشر بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $publishingAward = PublishingAwards::findOrFail($id);
        
        // Delete file if exists
        if ($publishingAward->project_file && Storage::disk('public')->exists('publishing_awards/' . $publishingAward->project_file)) {
            Storage::disk('public')->delete('publishing_awards/' . $publishingAward->project_file);
        }
        
        $publishingAward->delete();
        
        return redirect()->route('publishing_awards.index')
            ->with('success', 'تم حذف جائزة النشر بنجاح');
    }
}

