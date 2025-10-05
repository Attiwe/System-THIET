<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\LecturesDecisionsRequest;
use App\Models\LecturesDecisions;
use App\Models\Unit;
use Illuminate\Support\Facades\Storage;

class LecturesDecisionsController extends Controller
{
    public function index()
    {
        $items = LecturesDecisions::with(['unit:id,name'])->latest()->paginate(10);
        $units = cache()->remember('units.id_name', 300, function () {
            return Unit::select('id', 'name')->get();
        });
        return view('pages.lectures_decisions.index', compact('items', 'units'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function store(LecturesDecisionsRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('file_path')) {
            $data['file_path'] = $request->file('file_path')->store('public/lectures-decisions');
        }
        LecturesDecisions::create($data);
        return redirect()->route('lectures-decisions.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function update(LecturesDecisionsRequest $request, string $id)
    {
        $row = LecturesDecisions::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('file_path')) {
            if ($row->file_path && Storage::exists($row->file_path)) {
                Storage::delete($row->file_path);
            }
            $data['file_path'] = $request->file('file_path')->store('public/lectures-decisions');
        }
        $row->update($data);
        return redirect()->route('lectures-decisions.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(string $id)
    {
        $row = LecturesDecisions::findOrFail($id);
        if ($row->file_path && Storage::exists($row->file_path)) {
            Storage::delete($row->file_path);
        }
        $row->delete();
        return redirect()->route('lectures-decisions.index')->with('success', 'تم الحذف بنجاح');
    }
}


