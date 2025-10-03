<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\DeputyDirectorRequest;
use App\Models\DeputyDirector;
use App\Models\Unit;

class DeputyDirectorController extends Controller
{
    public function index()
    {
        $items = DeputyDirector::with('unit')->latest()->get();
        $units = Unit::select('id', 'name')->get();
        return view('pages.deputy_directors.index', compact('items', 'units'));
    }

    public function store(DeputyDirectorRequest $request)
    {
        DeputyDirector::create($request->validated());
        return redirect()->route('deputy-directors.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function update(DeputyDirectorRequest $request, string $id)
    {
        $row = DeputyDirector::findOrFail($id);
        $row->update($request->validated());
        return redirect()->route('deputy-directors.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(string $id)
    {
        $row = DeputyDirector::findOrFail($id);
        $row->delete();
        return redirect()->route('deputy-directors.index')->with('success', 'تم الحذف بنجاح');
    }
}


