<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\ScientificTripRequest;
use App\Models\ScientificTrip;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ScientificTripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scientificTrips = ScientificTrip::with(['department:id,name'])->latest()->paginate(10);
        $departments = Department::where('is_active', true)->select('id', 'name')->get();
        return view('pages.scientific_trips.index', compact('scientificTrips', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ScientificTripRequest $request)
    {
        $data = $request->only(['department_id', 'doctor_name', 'trip_name', 'description']);
        
        // Handle image upload
        if ($request->hasFile('trip_image')) {
            $image = $request->file('trip_image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('scientific_trips/images', $imageName, 'public');
            $data['trip_image'] = $imageName;
        }
        
        ScientificTrip::create($data);
        return redirect()->route('scientific_trips.index')->with('success', 'تم إضافة الرحلة العلمية بنجاح');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ScientificTripRequest $request, string $id)
    {
        $scientificTrip = ScientificTrip::findOrFail($id);
        $data = $request->only(['department_id', 'doctor_name', 'trip_name', 'description']);
        
        // Handle image upload
        if ($request->hasFile('trip_image')) {
            // Delete old image if exists
            if ($scientificTrip->trip_image) {
                Storage::disk('public')->delete('scientific_trips/images/' . $scientificTrip->trip_image);
            }
            
            // Upload new image
            $image = $request->file('trip_image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('scientific_trips/images', $imageName, 'public');
            $data['trip_image'] = $imageName;
        }
        
        $scientificTrip->update($data);
        return redirect()->route('scientific_trips.index')->with('success', 'تم تحديث الرحلة العلمية بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $scientificTrip = ScientificTrip::findOrFail($id);
        
        // Delete associated image
        if ($scientificTrip->trip_image) {
            Storage::disk('public')->delete('scientific_trips/images/' . $scientificTrip->trip_image);
        }
        
        $scientificTrip->delete();
        return redirect()->route('scientific_trips.index')->with('success', 'تم حذف الرحلة العلمية بنجاح');
    }
}
