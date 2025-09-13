<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImportantLink;

class ImportantLinkController extends Controller
{
    public function index()
    {
        $importantLinks = ImportantLink::latest()->get();
        return view('pages.important_link.index', compact('importantLinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.important_link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
        ]);

        ImportantLink::create($request->all());

        return redirect()->route('important_link.index')->with('success', 'Important Link created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $importantLink = ImportantLink::findOrFail($id);
        return view('pages.important_link.show', compact('importantLink'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $importantLink = ImportantLink::findOrFail($id);
        return view('pages.important_link.edit', compact('importantLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
        ]);

        $importantLink = ImportantLink::findOrFail($id);
        $importantLink->update($request->all());

        return redirect()->route('important_link.index')->with('success', 'Important Link updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        $importantLink = ImportantLink::findOrFail($id);
        $importantLink->delete();

        return redirect()->route('important_link.index')->with('success', 'Important Link deleted successfully');
    }
}
