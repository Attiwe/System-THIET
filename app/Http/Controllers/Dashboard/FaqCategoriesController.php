<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaqCategories;

class FaqCategoriesController extends Controller
{

    public function index()
    {
        $faqCategories = FaqCategories::latest()->get();
        return view('pages.faqCategories.index', compact('faqCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.faqCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        FaqCategories::create($request->all());
        return redirect()->route('faqCategories.index')->with('success', 'Faq Category created successfully');
    }

    public function show(string $id)
    {

    }

    
    public function edit(string $id)
    {
        $faqCategory = FaqCategories::findOrFail($id);
        return view('pages.faqCategories.edit', compact('faqCategory'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $faqCategory = FaqCategories::findOrFail($id);
        $faqCategory->update($request->all());
        return redirect()->route('faqCategories.index')->with('success', 'Faq Category updated successfully');
    }

    
    public function destroy(string $id)
    {
        $faqCategory = FaqCategories::findOrFail($id);
        $faqCategory->delete();
        return redirect()->route('faqCategories.index')->with('success', 'Faq Category deleted successfully');
    }
}
