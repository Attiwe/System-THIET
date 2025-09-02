<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QualityItem;
use App\Http\Requests\dashboard\QualityItemRequest;
use App\Models\QualityForm;

class QualityItemController extends Controller
{

    public function index()
    {
        $qualityItems = QualityItem::with('qualityForm')->latest()->get();
        $qualityForms = QualityForm::select('id','name')->active()->get();
        return view('pages.qualityItem.index', compact('qualityItems','qualityForms'));
    }


    public function create()
    {
          return view('pages.qualityItem.create' );
    }


    public function store(QualityItemRequest $request)
    {
        QualityItem::create($request->all());
        return redirect()->route('quality_item.index')->with('success', 'تم إضافة الجدول بنجاح');
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $qualityItem = QualityItem::findOrFail($id);
        $qualityForms = QualityForm::select('id','name')->active()->get();
        return view('pages.qualityItem.edit', compact('qualityItem','qualityForms'));
    }


    public function update(QualityItemRequest $request, string $id)
    {
        $qualityItem = QualityItem::findOrFail($id);
        $qualityItem->update($request->all());
        return redirect()->route('quality_item.index')->with('success', 'تم تعديل الجدول بنجاح');
    }

    public function destroy(string $id)
    {
        $qualityItem = QualityItem::findOrFail($id);
        $qualityItem->delete();
        return redirect()->route('quality_item.index')->with('success', 'تم حذف الجدول بنجاح');
    }

    public function trashed()
    {
        $qualityItems = QualityItem::onlyTrashed()->get();
        return view('pages.qualityItem.trashed', compact('qualityItems'));
    }

    public function restore(string $id)
    {
        $qualityItem = QualityItem::withTrashed()->findOrFail($id);
        $qualityItem->restore();
        return redirect()->route('quality_item.index')->with('success', 'تم استعادة الجدول بنجاح');
    }

    public function forceDelete(string $id)
    {
        $qualityItem = QualityItem::withTrashed()->findOrFail($id);
        $qualityItem->forceDelete();
        return redirect()->route('quality_item.index')->with('success', 'تم حذف الجدول بنجاح');
    }
}

