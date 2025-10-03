<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\ImportantFilesRequest;
use App\Models\ImportantFiles;
use App\Models\Unit;
use Illuminate\Support\Facades\Storage;

class ImportantFilesController extends Controller
{
    public function index()
    {
        $items = ImportantFiles::with(['unit:id,name'])->latest()->get();
        $units = cache()->remember('units.id_name', 300, function () {
            return Unit::select('id', 'name')->get();
        });
        return view('pages.important_files.index', compact('items', 'units'));
    }

    public function store(ImportantFilesRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('file_path')) {
            $data['file_path'] = $request->file('file_path')->store('public/important-files');
        }
        ImportantFiles::create($data);
        return redirect()->route('important-files.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function update(ImportantFilesRequest $request, string $id)
    {
        $row = ImportantFiles::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('file_path')) {
            if ($row->file_path && Storage::exists($row->file_path)) {
                Storage::delete($row->file_path);
            }
            $data['file_path'] = $request->file('file_path')->store('public/important-files');
        }
        $row->update($data);
        return redirect()->route('important-files.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(string $id)
    {
        $row = ImportantFiles::findOrFail($id);
        if ($row->file_path && Storage::exists($row->file_path)) {
            Storage::delete($row->file_path);
        }
        $row->delete();
        return redirect()->route('important-files.index')->with('success', 'تم الحذف بنجاح');
    }
}


