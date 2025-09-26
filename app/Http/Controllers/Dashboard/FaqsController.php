<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Faqs;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function index()
    {
        $faqs = Faqs::select('id','question','answer','department_id')->get();
        $departments = Department::select('id','name')->get();
        return view('pages.faqs.index', compact('faqs','departments'));
    }

    public function create()
    {
         return view('pages.faqs.create', compact('departments'));
    }

    public function store(Request $request)
    {
        Faqs::create($request->all());
        return redirect()->route('faqs.index')->with('success', 'تم إضافة الأسئلة الشائعة بنجاح');
    }

    public function edit($id)
    {
        $faq = Faqs::findOrFail($id);
        $departments = Department::select('id','name')->get();
        return view('pages.faqs.edit', compact('faq','departments'))->with('success', 'تم تحديث الأسئلة الشائعة بنجاح');
    }

    public function update(Request $request, $id)
    {
        $faq = Faqs::findOrFail($id);
        $faq->update($request->all());
        return redirect()->route('faqs.index') ->with('success', 'تم تحديث الأسئلة الشائعة بنجاح');
    }

    public function destroy($id)
    {
        $faq = Faqs::findOrFail($id);
        $faq->delete();
        return redirect()->route('faqs.index')->with('success', 'تم حذف الأسئلة الشائعة بنجاح');
    }   

   
}
