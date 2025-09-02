<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\QualityForm;
use App\Http\Requests\dashboard\QualityFormRequest;
use Illuminate\Http\Request;

class QualityFormController extends Controller
{

    public function index()
    {
        $qualityForms = QualityForm::latest()->get();
        return view('pages.qualityForm.index', compact('qualityForms'));
    }


    public function create()
    {
        return view('pages.qualityForm.create');
    }


    public function store(QualityFormRequest $request)
    {
        QualityForm::create($request->all());
        return redirect()->route('quality_form.index')->with('success', 'تم إضافة الجدول بنجاح');
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $qualityForm = QualityForm::findOrFail($id);
        return view('pages.qualityForm.edit', compact('qualityForm'));
    }


    public function update(QualityFormRequest $request, string $id)
    {
        $qualityForm = QualityForm::findOrFail($id);
        $qualityForm->update($request->all());
        return redirect()->route('quality_form.index')->with('success', 'تم تعديل الجدول بنجاح');
    }

    public function destroy(string $id)
    {
        $qualityForm = QualityForm::findOrFail($id);
        $qualityForm->delete();
        return redirect()->route('quality_form.index')->with('success', 'تم حذف الجدول بنجاح');
    }

    public function trashed()
    {
        $qualityForms = QualityForm::onlyTrashed()->get();
        return view('pages.qualityForm.trashed', compact('qualityForms'));
    }

    public function restore(string $id)
    {
        $qualityForm = QualityForm::withTrashed()->findOrFail($id);
        $qualityForm->restore();
        return redirect()->route('quality_form.index')->with('success', 'تم استعادة الجدول بنجاح');
    }

    public function forceDelete(string $id)
    {
        $qualityForm = QualityForm::withTrashed()->findOrFail($id);
        $qualityForm->forceDelete();
        return redirect()->route('quality_form.index')->with('success', 'تم حذف الجدول بنجاح');
    }
}
