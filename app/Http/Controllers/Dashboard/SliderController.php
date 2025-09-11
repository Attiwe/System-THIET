<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SlidersServices;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\dashboard\SilderRequest;

class SliderController extends Controller
{
    protected $sliders;

    public function __construct(SlidersServices $sliders)
    {
        $this->sliders = $sliders;
    }
    public function index()
    {
        $sliders = $this->sliders->getAll();
        return view('pages.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('pages.slider.create', compact('sliders'));
    }

    public function store(SilderRequest $request)
    {
         $data = $request->except(['image_slider']);
        if ($request->hasFile('image_slider')) {
            $data['image_slider'] = $this->storeFile($request , 'image_slider', 'image_slider', 'slider');
        }
        $this->sliders->store($data);
        return redirect()->route('slider.index')->with('success', 'تم اضافة الصورة بنجاح');
    }


    public function show(string $id)
    {

    }


    public function edit(string $slider)
    {
        $slider = $this->sliders->checkId($slider);
        return view('pages.slider.edit', compact('slider'));
    }
 

    public function update(SilderRequest $request, string $id)
    {
        $slider = $this->sliders->checkId($id);
        $data = $request->except(['image_slider']);

        if ($request->hasFile('image_slider')) {
            $this->deleteImageDisk($slider->image_slider);
            $data['image_slider'] = $this->storeFile($request, 'image_slider', 'image_slider', 'slider');
        }
        $this->sliders->update($id, $data);
        return redirect()->route('slider.index')->with('success', 'تم تحديث الصورة بنجاح');
    }

    public function destroy(string $id)
    {
        $data = $this->sliders->checkId($id);
        $this->deleteImageDisk($data->image_slider);
        $data->delete();
        return redirect()->route('slider.index')->with('success', 'تم حذف الصورة بنجاح');
    }

    private function deleteImageDisk($imagePath)
    {
        if (!$imagePath)
            return;

        if (Storage::disk('slider')->exists($imagePath)) {
            Storage::disk('slider')->delete($imagePath);
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
