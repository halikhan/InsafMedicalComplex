<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'specialist_type' => 'required|unique:services,specialist_type|max:255',
            'status' => 'required|in:ACTIVE,INACTIVE',
        ]);

        Service::create($request->all());

        return redirect()->route('services.index')->with('success', 'Service added successfully!');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'specialist_type' => 'required|unique:services,specialist_type,' . $service->id . '|max:255',
            'status' => 'required|in:ACTIVE,INACTIVE',
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')->with('success', 'Service added successfully!');

    }

    public function destroy(string $id)
    {
        $doctors = Service::find($id);
        if($doctors->image){
            if(file_exists($doctors->image)){
                unlink($doctors->image);
            }
        }
        $doctors->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted successfully!');
    }
}
