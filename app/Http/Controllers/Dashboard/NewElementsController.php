<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewElements;

class NewElementsController extends Controller
{
    
    public function index()
    {
        $newElements = NewElements::latest()->get();
        return view('pages.new_elements.index', compact('newElements'));
    }

    
    public function create()
    {
        return view('pages.new_elements.create');
    }

     
    public function store(Request $request)
    {
        $newElement = NewElements::create($request->all());
        return redirect()->route('new_elements.index');
    }

    
    public function show(string $id)
    {
         
    }

   
    public function edit(string $id)
    {
        $newElement = NewElements::findOrFail($id);
        return view('pages.new_elements.edit', compact('newElement'));
    }

    
    public function update(Request $request, string $id)
    {
        $newElement = NewElements::findOrFail($id);
        $newElement->update($request->all());
        return redirect()->route('new_elements.index');
    }

    
    public function destroy(string $id)
    {
        $newElement = NewElements::findOrFail($id);
        $newElement->delete();
        return redirect()->route('new_elements.index');
    }
}
