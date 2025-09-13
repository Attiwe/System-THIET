<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\InstituteBoardMemberRequest;
use Illuminate\Http\Request;
use App\Models\InstituteBoardMember;
use App\Models\FacultyMembers;

class InstituteBoardMemberController extends Controller
{

    public function index()
    {
        $instituteBoardMembers = InstituteBoardMember::with('facultyMember')->latest()->get();
        $facultyMembers = FacultyMembers::select('id', 'username')->get();
        return view('pages.institute_board_members.index', compact('instituteBoardMembers', 'facultyMembers'));
    }


    public function create()
    {
        // $facultyMembers = FacultyMembers::select('id', 'name')->get();
        // return view('pages.institute_board_members.create', compact('facultyMembers'));
    }


    public function store(InstituteBoardMemberRequest $request)
    {
        InstituteBoardMember::create($request->all());
        return redirect()->route('institute_board_members.index')->with('success', 'تم اضافة عضو مجلس اداره بنجاح');
    }

    public function edit(string $id)
    {
        $instituteBoardMember = InstituteBoardMember::findOrFail($id);
        $facultyMembers = FacultyMembers::select('id', 'username')->get();
        return view('pages.institute_board_members.edit', compact('instituteBoardMember', 'facultyMembers'));
    }

    public function update(InstituteBoardMemberRequest $request, string $id)
    {
        $instituteBoardMember = InstituteBoardMember::findOrFail($id);
        $instituteBoardMember->update($request->all());
        return redirect()->route('institute_board_members.index')->with('success', 'تم تحديث عضو مجلس اداره بنجاح');
    }

    public function destroy(string $id)
    {
        $instituteBoardMember = InstituteBoardMember::findOrFail($id);
        $instituteBoardMember->delete();
        return redirect()->route('institute_board_members.index')->with('success', 'تم حذف عضو مجلس اداره بنجاح');
    }
    public function trashed()
    {
        $instituteBoardMembers = InstituteBoardMember::onlyTrashed()->get();
        return view('pages.institute_board_members.trashed', compact('instituteBoardMembers'));
    }

    public function restore(string $id)
    {
        $instituteBoardMember = InstituteBoardMember::withTrashed()->findOrFail($id);
        $instituteBoardMember->restore();
        return redirect()->route('institute_board_members.index')->with('success', 'تم استعادة الجدول بنجاح');
    }

    public function forceDelete(string $id)
    {
        $instituteBoardMember = InstituteBoardMember::withTrashed()->findOrFail($id);
        $instituteBoardMember->forceDelete();
        return redirect()->route('institute_board_members.index')->with('success', 'تم حذف الجدول بنجاح');
    }
}
