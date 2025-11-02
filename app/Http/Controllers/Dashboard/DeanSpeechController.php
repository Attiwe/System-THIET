<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Management;
use Illuminate\Http\Request;
use App\Http\Requests\dashboard\DeanSpeechRequest;
use App\Models\DeanSpeech;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DeanSpeechController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = DeanSpeech::latest()->get();
        return view('pages.deanSpeech.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.deanSpeech.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeanSpeechRequest $request)
    {
        try {
            $data = $request->except('_token', 'image', 'resume');

            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                
                // Create directory if it doesn't exist
                $imagePath = public_path('image/dean-speech');
                if (!File::exists($imagePath)) {
                    File::makeDirectory($imagePath, 0755, true);
                }
                
                $image->move($imagePath, $imageName);
                $data['image'] = $imageName;
            }

            // Handle resume file upload (if it's a file)
            if ($request->hasFile('resume')) {
                $resume = $request->file('resume');
                $resumeName = time() . '_' . Str::random(10) . '.' . $resume->getClientOriginalExtension();
                
                // Create directory if it doesn't exist
                $resumePath = public_path('image/dean-speech/resumes');
                if (!File::exists($resumePath)) {
                    File::makeDirectory($resumePath, 0755, true);
                }
                
                $resume->move($resumePath, $resumeName);
                $data['resume'] = $resumeName;
            } elseif ($request->filled('resume')) {
                // If resume is text (from textarea), keep it as is
                $data['resume'] = $request->input('resume');
            }

            DeanSpeech::create($data);
            return redirect()->route('dean_speech.index')->with('success', 'تم إضافة كلمة العميد بنجاح ✅');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء إضافة كلمة العميد: ' . $e->getMessage());
        }
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
        return view('pages.deanSpeech.update', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeanSpeechRequest $request, string $id)
    {
        try {
            $news = DeanSpeech::findOrFail($id);
            $data = $request->except('_token', 'id', 'image', 'resume');

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($news->image && File::exists(public_path('image/dean-speech/' . $news->image))) {
                    File::delete(public_path('image/dean-speech/' . $news->image));
                }

                $image = $request->file('image');
                $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                
                // Create directory if it doesn't exist
                $imagePath = public_path('image/dean-speech');
                if (!File::exists($imagePath)) {
                    File::makeDirectory($imagePath, 0755, true);
                }
                
                $image->move($imagePath, $imageName);
                $data['image'] = $imageName;
            }

            // Handle resume file upload (if it's a file)
            if ($request->hasFile('resume')) {
                // Delete old resume file if exists (if it was a file)
                if ($news->resume && File::exists(public_path('image/dean-speech/resumes/' . $news->resume))) {
                    File::delete(public_path('image/dean-speech/resumes/' . $news->resume));
                }

                $resume = $request->file('resume');
                $resumeName = time() . '_' . Str::random(10) . '.' . $resume->getClientOriginalExtension();
                
                // Create directory if it doesn't exist
                $resumePath = public_path('image/dean-speech/resumes');
                if (!File::exists($resumePath)) {
                    File::makeDirectory($resumePath, 0755, true);
                }
                
                $resume->move($resumePath, $resumeName);
                $data['resume'] = $resumeName;
            }
            // If no resume file is uploaded, keep the existing one (don't update $data['resume'])

            $news->update($data);
            return redirect()
                ->route('dean_speech.index')
                ->with('success', 'تم تحديث كلمة العميد بنجاح ✅');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء تحديث كلمة العميد: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $news = DeanSpeech::findOrFail($id);
            
            // Delete image if exists
            if ($news->image && File::exists(public_path('image/dean-speech/' . $news->image))) {
                File::delete(public_path('image/dean-speech/' . $news->image));
            }

            // Delete resume file if exists (if it was a file)
            if ($news->resume && File::exists(public_path('image/dean-speech/resumes/' . $news->resume))) {
                File::delete(public_path('image/dean-speech/resumes/' . $news->resume));
            }

            $news->delete();
            return redirect()->route('dean_speech.index')->with('success', 'تم حذف كلمة العميد بنجاح ✅');
        } catch (\Exception $e) {
            return redirect()->route('dean_speech.index')
                ->with('error', 'حدث خطأ أثناء حذف كلمة العميد: ' . $e->getMessage());
        }
    }
}
