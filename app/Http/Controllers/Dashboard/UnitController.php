<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\UnitServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\dashboard\UnitRequest;


class UnitController extends Controller
{

    protected $unit;

    public function __construct(UnitServices $unit)
    {
        $this->unit = $unit;
    }

    public function index()
    {
        $units = $this->unit->getAll();
        return view('pages.unit.index', compact('units'));
    }

    public function create()
    {
        return view('pages.unit.create');
    }

    public function store(UnitRequest $request)
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $data['image'] = $this->storeFile($request, 'image', '', 'unit');
        }
        $this->unit->store($data);
        return redirect()->route('unit.index')->with('success', 'تم اضافة الوحده بنجاح');
    }

    public function show(string $id)
    {
        $unit = $this->unit->checkId($id);
        return view('pages.unit.show', compact('unit'));
    }
    public function edit(string $id)
    {
        $unit = $this->unit->checkId($id);
        return view('pages.unit.edit', compact('unit'));
    }

    public function update(UnitRequest $request, string $id)
    {
        $unit = $this->unit->checkId($id);
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $this->deleteImageDisk($unit->image);
            $data['image'] = $this->storeFile($request, 'image', '', 'unit');
        } else {
            $data['image'] = $unit->image;
        }

         $this->unit->update($id, $data);

        return redirect()->route('unit.index')->with('success', 'تم تحديث الوحده بنجاح');
    }


    public function destroy(string $id)
    {
        $unit = $this->unit->checkId($id);
        $this->deleteImageDisk($unit->image);
        $unit->delete();
        return redirect()->route('unit.index')->with('success', 'تم حذف الوحده بنجاح');
    }

    private function deleteImageDisk($imagePath)
    {
        if (!$imagePath)
            return;

        if (Storage::disk('unit')->exists($imagePath)) {
            Storage::disk('unit')->delete($imagePath);
        }
    }

    private function storeFile($request, $file, $folder, $disk)
    {
        if ($request->hasFile($file)) {
            $filename = Str::uuid() . '.' . $request->file($file)->getClientOriginalExtension();
            $path = $request->file($file)->storeAs($folder, $filename, $disk);
            return $path;
        }
    }
}
