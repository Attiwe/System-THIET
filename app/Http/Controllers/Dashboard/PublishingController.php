<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\PublishingRequest;
use App\Models\Publishing;
use Illuminate\Http\Request;

class PublishingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishings = Publishing::orderBy('created_at', 'desc')->get();
        return view('pages.publishings.index', compact('publishings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.publishings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublishingRequest $request)
    {
        $data = $request->validated();
        
        Publishing::create($data);
        
        return redirect()->route('publishings.index')
            ->with('success', 'تم إضافة دار النشر بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $publishing = Publishing::findOrFail($id);
        return view('pages.publishings.show', compact('publishing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $publishing = Publishing::findOrFail($id);
        return view('pages.publishings.edit', compact('publishing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublishingRequest $request, string $id)
    {
        $publishing = Publishing::findOrFail($id);
        $data = $request->validated();
        
        $publishing->update($data);
        
        return redirect()->route('publishings.index')
            ->with('success', 'تم تحديث دار النشر بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $publishing = Publishing::findOrFail($id);
        $publishing->delete();
        
        return redirect()->route('publishings.index')
            ->with('success', 'تم حذف دار النشر بنجاح');
    }
}
