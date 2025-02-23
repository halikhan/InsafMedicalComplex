<?php

namespace App\Http\Controllers;
use App\Models\Ward;
use Illuminate\Http\Request;

class WardController extends Controller
{
    public function index()
    {
        $wards = Ward::all();
        return view('admin.wards.index', compact('wards'));
    }

    public function create()
    {
        
        $departments = [
            'LABORATORY', 'X-RAYS', 'OPG', 'OPD', 'MRI', 'ULTRASOUND', 'ECG', 
            'C.T SCAN', 'COLOR DOPPLER', 'DENTAL SERVICES', 'OPERATION THEATER (OT)', 
            'NICU (NEONATAL INTENSIVE CARE UNIT)', 'ICU (INTENSIVE CARE UNIT)',
            'PICU (PEDIATRIC INTENSIVE CARE UNIT)', 'GYNAECOLOGY SERVICES', 
            'E.N.T (EAR, NOSE, THROAT)', 'DAY CARE - WARD SERVICES', 
            'PHYSIOTHERAPY-SERVICES', 'ENDOSCOPY-SERVICES', 'BLOOD BANK', 
            'DENTAL', 'AESTHETIC AND COSMETOLOGY', 'OPERATION ORTHO'
        ];

        $wardNames = [
            'CARD-REGISTRATION', 'EMERGENCY WARD', 'GENERAL WARD', 'GYNAE WARD',
            'ICU', 'ICU-2', 'NICU (INCUBATOR)', 'PICU', 'PRIVATE-ROOM', 
            'SEMI PRIVATE-ROOM'
        ];

        return view('admin.wards.create', compact('departments', 'wardNames'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'department' => 'required|string|max:255',
            'ward_name' => 'required|string|max:255',
            'bed_no' => 'nullable|integer',
            'charges' => 'nullable|numeric',
            'description' => 'nullable|string',
        ]);

        Ward::create($request->all());
        return redirect()->route('wards.index')->with('success', 'Ward created successfully.');
    }

    public function show(Ward $ward)
    {
        return view('admin.wards.show', compact('ward'));
    }

    public function edit(Ward $ward)
    {
        $departments = [
            'LABORATORY', 'X-RAYS', 'OPG', 'OPD', 'MRI', 'ULTRASOUND', 'ECG', 
            'C.T SCAN', 'COLOR DOPPLER', 'DENTAL SERVICES', 'OPERATION THEATER (OT)', 
            'NICU (NEONATAL INTENSIVE CARE UNIT)', 'ICU (INTENSIVE CARE UNIT)',
            'PICU (PEDIATRIC INTENSIVE CARE UNIT)', 'GYNAECOLOGY SERVICES', 
            'E.N.T (EAR, NOSE, THROAT)', 'DAY CARE - WARD SERVICES', 
            'PHYSIOTHERAPY-SERVICES', 'ENDOSCOPY-SERVICES', 'BLOOD BANK', 
            'DENTAL', 'AESTHETIC AND COSMETOLOGY', 'OPERATION ORTHO'
        ];

        $wardNames = [
            'CARD-REGISTRATION', 'EMERGENCY WARD', 'GENERAL WARD', 'GYNAE WARD',
            'ICU', 'ICU-2', 'NICU (INCUBATOR)', 'PICU', 'PRIVATE-ROOM', 
            'SEMI PRIVATE-ROOM'
        ];
        return view('admin.wards.edit', compact('ward', 'departments', 'wardNames'));
    }

    public function update(Request $request, Ward $ward)
    {
        $request->validate([]); // same as store method

        $ward->update($request->all());
        return redirect()->route('wards.index')->with('success', 'Ward updated successfully.');
    }

    public function destroy(Ward $ward)
    {
        $ward->delete();
        return redirect()->route('wards.index')->with('success', 'Ward deleted successfully.');
    }
}
