<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\InternalPermanencyRequest;
use App\Models\InternalPermanency;
use App\Models\Unit;
use Illuminate\Support\Facades\Storage;

class InternalPermanencyController extends Controller
{
    public function index()
    {
        $items = InternalPermanency::with('unit')->latest()->get();
        $units = Unit::select('id', 'name')->get();
        return view('pages.internal_permanencies.index', compact('items', 'units'));
    }

    public function store(InternalPermanencyRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('file_path')) {
            $data['file_path'] = $request->file('file_path')->store('public/internal-permanencies');
        }
        InternalPermanency::create($data);
        return redirect()->route('internal-permanencies.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function update(InternalPermanencyRequest $request, string $id)
    {
        $row = InternalPermanency::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('file_path')) {
            if ($row->file_path && Storage::exists($row->file_path)) {
                Storage::delete($row->file_path);
            }
            $data['file_path'] = $request->file('file_path')->store('public/internal-permanencies');
        }
        $row->update($data);
        return redirect()->route('internal-permanencies.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(string $id)
    {
        $row = InternalPermanency::findOrFail($id);
        if ($row->file_path && Storage::exists($row->file_path)) {
            Storage::delete($row->file_path);
        }
        $row->delete();
        return redirect()->route('internal-permanencies.index')->with('success', 'تم الحذف بنجاح');
    }
}


