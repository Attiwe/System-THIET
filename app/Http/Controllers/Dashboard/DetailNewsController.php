<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\dashboard\DetailNewsRequest;
use App\Models\detailsNews;
use App\Utils\ImageMangment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DetailNewsController extends Controller
{

    public function index()
    {
        $detailsNews = detailsNews::latest()->get();
        return view('pages.detailsNews.index', compact('detailsNews'));
    }


    public function create()
    {
        return view('pages.detailsNews.create');
    }

    public function store(DetailNewsRequest $request)
    {
        $data = $request->except(['image', '_token']);
        if ($request->hasFile('image')) {
            $data = array_merge($data, $this->storeImage($request));
        }
        detailsNews::create($data);
        return redirect()->route('detailsNews.index')->with('success', 'تم إنشاء الخبر بنجاح');
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $detailsNews = detailsNews::findOrFail($id);
        return view('pages.detailsNews.edit', compact('detailsNews'));
    }


    public function update(DetailNewsRequest $request, string $id)
    {
        $detailsNews = detailsNews::findOrFail($id);
        $data = $request->except(['image', '_token']);
        if ($request->hasFile('image')) {
            $this->deleteImageDisk($detailsNews->image);
            $data = array_merge($data, $this->storeImage($request));
        }
        $detailsNews->update($data);
        return redirect()->route('detailsNews.index')->with('success', 'تم تحديث الخبر بنجاح');
    }



    public function destroy(string $id)
    {
        try {
            $detailsNews = DetailsNews::findOrFail($id);

            $this->deleteImageDisk($detailsNews->image);
            $detailsNews->delete();

            return redirect()->route('detailsNews.index')
                ->with('success', 'تم حذف الخبر بنجاح ✅');
        } catch (\Exception $e) {
            return redirect()->route('detailsNews.index')
                ->with('error', 'حدث خطأ أثناء حذف الخبر ❌');
        }
    }

    private function deleteImageDisk($imagePath)
    {
        if (!$imagePath)
            return;

        if (Storage::disk('detail_news')->exists($imagePath)) {
            Storage::disk('detail_news')->delete($imagePath);
        }
    }

    private function storeImage($request)
    {
        $file = $request->file('image');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('/details/news', $filename, ['disk' => 'detail_news']);
        return ['image' => $path];
    }

}
