<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\dashboard\DetailNewsRequest;
use App\Models\DetailsNews;
use App\Models\NewElements;
use App\Utils\ImageMangment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Services\DetailsNewsServices;

class DetailNewsController extends Controller
{

    protected $detailsNews;

    public function __construct(DetailsNewsServices $detailsNews)
    {
        $this->detailsNews = $detailsNews;
    }

    public function index()
    {
        $newElements = $this->detailsNews->getNewElements();
        $detailsNews = $this->detailsNews->getAll();
        return view('pages.detailsNews.index', compact('detailsNews', 'newElements'));
    }


    public function create()
    {
        return view('pages.detailsNews.create');
    }

    public function store(DetailNewsRequest $request)
    {
        // return $request->all();
        $data = $request->except(['image', '_token'])   ;
        if ($request->hasFile('image')) {
            $data['image'] = $this->storeFile($request, 'image','image', 'details_news');
        }
        $this->detailsNews->store($data);
        return redirect()->route('detailsNews.index')->with('success', 'تم إنشاء الخبر بنجاح');
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $detailsNews = $this->detailsNews->checkId($id);
        $newElements = $this->detailsNews->getNewElements();
        return view('pages.detailsNews.edit', compact('detailsNews', 'newElements'));
    }


    public function update(DetailNewsRequest $request, string $id)
    {
        $detailsNews = $this->detailsNews->checkId($id);
        $data = $request->except(['image', '_token']);
        if ($request->hasFile('image')) {
            $this->deleteImageDisk($detailsNews->image);
            $data = array_merge($data, $this->storeImage($request));
        }
        $this->detailsNews->update($id, $data);
        return redirect()->route('detailsNews.index')->with('success', 'تم تحديث الخبر بنجاح');
    }



    public function destroy(string $id)
    {
        try {
            $detailsNews = $this->detailsNews->checkId($id);

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

    private function storeFile($request, $file, $folder, $disk  )
    {
        if ($request->hasFile($file)) {
            $filename = Str::uuid() . '.' . $request->file($file)->getClientOriginalExtension();
            $path = $request->file($file)->storeAs($folder, $filename, $disk);
            return $path;
        }
    }

}
