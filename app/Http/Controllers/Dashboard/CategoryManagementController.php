<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\dashboard\CategoryManagementRequest;
use App\Models\CategoryManagements;

class CategoryManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryManagements = CategoryManagements::get();
        return view('pages.category_management.index',compact('categoryManagements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.category_management.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryManagementRequest $request)
    {
        $data = $request->except('_token');
        CategoryManagements::create($data);
        return redirect()->route('category_management.index')->with('success','تم اضافة التصنيف بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoryManagement = CategoryManagements::findOrFail($id);
        return view('pages.category_management.edit',compact('categoryManagement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryManagementRequest $request, string $id)
    {
        $data = $request->except('_token');
        CategoryManagements::findOrFail($id)->update($data);
        return redirect()->route('category_management.index')->with('success','تم تحديث التصنيف بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CategoryManagements::findOrFail($id)->delete();
        return redirect()->route('category_management.index')->with('success','تم حذف التصنيف بنجاح');
    }
}
