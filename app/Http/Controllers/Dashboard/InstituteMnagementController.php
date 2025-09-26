<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\InstituteMnagement;
use Illuminate\Http\Request;

class InstituteMnagementController extends Controller
{
    public function index()
    {
        $instituteMnagements = InstituteMnagement::latest()->get();
        return view('pages.institute_mnagements.index', compact('instituteMnagements'));
    }
    public function create()
    {
        return view('pages.institute_mnagements.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'description' => 'required',
        ]);
        InstituteMnagement::create($request->all());
        return redirect()->route('institute_mnagements.index')->with('success', 'تم اضافة المديرية بنجاح');
    }
    public function edit($id)
    {
        $instituteMnagement = InstituteMnagement::findOrFail($id);
        return view('pages.institute_mnagements.edit', compact('instituteMnagement'));
    }
    public function update(Request $request, $id)
    {
        $instituteMnagement = InstituteMnagement::findOrFail($id);
        $instituteMnagement->update($request->all());
        return redirect()->route('institute_mnagements.index')->with('success', 'تم تحديث المديرية بنجاح');
    }
    public function destroy($id)
    {
        $instituteMnagement = InstituteMnagement::findOrFail($id);
        $instituteMnagement->delete();
        return redirect()->route('institute_mnagements.index')->with('success', 'تم حذف المديرية بنجاح');
    }
}
