<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\ScheduleRequest;
use App\Models\Department;
use App\Models\LevelAccadmic;
use App\Models\Schedules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SchedulesController extends Controller
{
    public function index()
    {
        $schedules = Schedules::with(['department', 'levelAcademic'])->latest()->get();
        $departments = Department::select('id', 'name')->orderBy('name')->get();
        $levelAcademics = LevelAccadmic::select('id', 'level_name')->orderBy('level_name')->get();
        return view('pages.schedules.index', compact('schedules', 'departments', 'levelAcademics'));
    }

    // public function create()
    // {
    //     return view('pages.schedules.create');
    // }

    /**
     * Show the form for creating a new resource in a separate page.
     */
    public function createPage()
    {
        $departments = Department::select('id', 'name')->orderBy('name')->get();
        $levelAcademics = LevelAccadmic::select('id', 'level_name')->orderBy('level_name')->get();
        return view('pages.schedules.create_page', compact('departments', 'levelAcademics'));
    }

    public function store(ScheduleRequest $request)
    {
         $data = $request->except(['file_path', '_token']);

        if ($request->hasFile('file_path')) {
            $data['file_path'] = $this->storeFile($request, 'file_path', '', 'schedules');
        }

        Schedules::create($data);

        return redirect()->route('schedules.index')
            ->with('success', 'تم إضافة الجدول بنجاح ✅');
    }

    public function show(Schedules $schedule)
    {
        $schedule->load(['department', 'levelAcademic']);
        return view('pages.schedules.show', compact('schedule'));
    }

    public function edit(Schedules $schedule)
    {
        $schedule->load(['department', 'levelAcademic']);
        $departments = Department::select('id', 'name')->orderBy('name')->get();
        $levelAcademics = LevelAccadmic::select('id', 'level_name')->orderBy('level_name')->get();
        return view('pages.schedules.edit', compact('schedule', 'departments', 'levelAcademics'));
    }

    public function update(ScheduleRequest $request, Schedules $schedule)
    {
        

        $data = $request->except(['file_path', '_token']);

        if ($request->hasFile('file_path')) {
            $this->deleteImageDisk($schedule->file_path);
            $data['file_path'] = $this->storeFile($request, 'file_path', '', 'schedules');
        }

        $schedule->update($data);

        return redirect()->route('schedules.index')
            ->with('success', 'تم تحديث الجدول بنجاح ✅');
    }

    public function destroy(Schedules $schedule)
    {
        try {
            $this->deleteImageDisk($schedule->file_path);
            $schedule->delete();

            return redirect()->route('schedules.index')
                ->with('success', 'تم حذف الجدول بنجاح ✅');
        } catch (\Exception $e) {
            return redirect()->route('schedules.index')
                ->with('error', 'حدث خطأ أثناء الحذف ❌');
        }
    }

    private function deleteImageDisk($imagePath)
    {
        if ($imagePath && Storage::disk('schedules')->exists($imagePath)) {
            Storage::disk('schedules')->delete($imagePath);
        }
    }

    private function storeFile(Request $request, string $file, string $folder, string $disk): ?string
    {
        if ($request->hasFile($file)) {

            return $request->file($file)->store($folder, $disk);
        }
        return null;
    }
}
