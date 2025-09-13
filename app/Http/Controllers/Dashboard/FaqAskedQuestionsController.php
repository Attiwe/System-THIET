<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaqAskedQuestions;
use App\Models\FaqCategories;

class FaqAskedQuestionsController extends Controller
{

    public function index()
    {
        $faqAskedQuestions = FaqAskedQuestions::latest()->get();
        $faqCategories = FaqCategories::select('id', 'name')->get();
        return view('pages.faqAskedQuestions.index', compact('faqAskedQuestions', 'faqCategories'));
    }


    public function create()
    {
        // $faqCategories = FaqCategories::select('id', 'name')->get();
        // return view('pages.faqAskedQuestions.create', compact('faqCategories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'faq_category_id' => 'required',
            'question' => 'required',
            'answer' => 'required',
        ]);
        FaqAskedQuestions::create($request->all());
        return redirect()->route('faqAskedQuestions.index')->with('success', 'تم إضافة السؤال الشائع بنجاح');
    }


    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $faqAskedQuestion = FaqAskedQuestions::findOrFail($id);
        $faqCategories = FaqCategories::all();
        return view('pages.faqAskedQuestions.edit', compact('faqAskedQuestion', 'faqCategories'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'faq_category_id' => 'required',
            'question' => 'required',
            'answer' => 'required',
        ]);
        $faqAskedQuestion = FaqAskedQuestions::findOrFail($id);
        $faqAskedQuestion->update($request->all());
        return redirect()->route('faqAskedQuestions.index')->with('success', 'تم تحديث السؤال الشائع بنجاح');
    }

    public function destroy(string $id)
    {
        $faqAskedQuestion = FaqAskedQuestions::findOrFail($id);
        $faqAskedQuestion->delete();
        return redirect()->route('faqAskedQuestions.index')->with('success', 'تم حذف السؤال الشائع بنجاح');
    }
}
