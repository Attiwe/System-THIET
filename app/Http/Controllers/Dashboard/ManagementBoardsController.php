<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\ManagementBoardsRequest;
use App\Models\ManagementBoards;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManagementBoardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boards = ManagementBoards::with('unit')->latest()->get();
        $units = Unit::select('id', 'name')->get();
        return view('pages.management_boards.index', compact('boards', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ManagementBoardsRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('file_path')) {
            $data['file_path'] = $request->file('file_path')->store('public/management-boards');
        }

        ManagementBoards::create($data);
        return redirect()->route('management-boards.index')->with('success', 'تمت الإضافة بنجاح');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ManagementBoardsRequest $request, string $id)
    {
        $board = ManagementBoards::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('file_path')) {
            if ($board->file_path && Storage::exists($board->file_path)) {
                Storage::delete($board->file_path);
            }
            $data['file_path'] = $request->file('file_path')->store('public/management-boards');
        }

        $board->update($data);
        return redirect()->route('management-boards.index')->with('success', 'تم التحديث بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $board = ManagementBoards::findOrFail($id);
        if ($board->file_path && Storage::exists($board->file_path)) {
            Storage::delete($board->file_path);
        }
        $board->delete();
        return redirect()->route('management-boards.index')->with('success', 'تم الحذف بنجاح');
    }
}


