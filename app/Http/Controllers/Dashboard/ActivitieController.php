<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activities;

class ActivitieController extends Controller
{
    
    public function index()
    {
        $activities = Activities::latest()->get();
        return view('pages.activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.activities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Activities::create([
            'name' => $request->name,
        ]);

        return redirect()->route('activities.index')->with('success', 'تم اضافة النشطه بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $activity = Activities::findOrFail($id);
        return view('pages.activities.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $activity = Activities::findOrFail($id);
        $activity->update([
            'name' => $request->name,
        ]);

        return redirect()->route('activities.index')->with('success', 'تم تعديل النشطه بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $activity = Activities::findOrFail($id);
        $activity->delete();

        return redirect()->route('activities.index')->with('success', 'تم حذف النشطه بنجاح');
    }
}
