<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Management;
use Illuminate\Http\Request;
use App\Http\Requests\dashboard\DeanSpeechRequest;
use App\Models\DeanSpeech;
use Illuminate\Support\Str;
use App\Utils\ImageMangment;


class DeanSpeechController extends Controller
{
    /**4
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = DeanSpeech::with('management')->latest()->get();
        return view('pages.deanSpeech.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mangment = Management::select('id', 'name', 'position')->get();
        return view('pages.deanSpeech.create', compact('mangment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeanSpeechRequest $request)
    {
        $data = $request->except('_token');
        DeanSpeech::create($data);
        return redirect()->route('dean_speech.index')->with('success', 'تم إنشاء الخبر بنجاح');
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
        $news = DeanSpeech::findOrFail($id);
        $mangment = Management::select('id', 'name', 'position')->get();
        return view('pages.deanSpeech.update', compact('news', 'mangment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeanSpeechRequest $request)
    {
        try {
            $id = $request->input('id');
            $news = DeanSpeech::findOrFail($id);
            $data = $request->except('_token');
            $news->update($data);
            return redirect()
                ->route('dean_speech.index')
                ->with('success', 'تم تحديث الخبر بنجاح ✅');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء تحديث الخبر: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
