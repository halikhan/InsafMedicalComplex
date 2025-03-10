<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $patients = Patient::where('name', 'like', "%{$search}%")
            ->orWhere('contact', 'like', "%{$search}%")
            ->orWhere('cnic', 'like', "%{$search}%")
            ->paginate(10);

        return view('admin.patients.index', compact('patients', 'search'));
    }

    public function create()
    {
        return view('admin.patients.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'name' => 'required|string',
            'address' => 'nullable|string',
            'contact' => 'required|string',
            'cnic' => 'required|string',
            'age' => 'nullable|integer',
            'gender' => 'required|string',
            'admit_date' => 'required|date',
            'shift' => 'required|string',
            'time' => 'required',
            'file_no' => 'required|string',
            'room_no' => 'required|string',
            'attendant_name' => 'required|string',
            'attendant_contact' => 'required|string',
            'relation_with_patient' => 'required|string',
            'advance_received' => 'required|numeric',
            'admission_number' => 'required|unique:patients,admission_number',
            'admission_type' => 'required|string',
            'lmp_date' => 'nullable|date',
            'expected_due_date' => 'nullable|date',
        ];
    
        // Validate Request
        $validatedData = $request->validate($rules);
        // dd($validatedData);
        Patient::create($validatedData);
     
        return redirect()->route('patients.index')->with('message', 'Patient added successfully!');
    }

    public function edit(Patient $patient)
    {
        return view('admin.patients.edit', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string',
            'address' => 'nullable|string',
            'contact' => 'required|string',
            'cnic' => 'required|string',
            'age' => 'nullable|integer',
            'gender' => 'required|string',
            'admit_date' => 'required|date',
            'shift' => 'required|string',
            'time' => 'required',
            'file_no' => 'required|string',
            'room_no' => 'required|string',
            'attendant_name' => 'required|string',
            'attendant_contact' => 'required|string',
            'relation_with_patient' => 'required|string',
            'advance_received' => 'required|numeric',
            'admission_number' => 'required|unique:patients,admission_number,' . $id,
            'admission_type' => 'required|string',
            'lmp_date' => 'nullable|date',
            'expected_due_date' => 'nullable|date',
        ];
    
        // Validate Request
        $validatedData = $request->validate($rules);
    
        // Find the existing patient
        $patient = Patient::findOrFail($id);
    
        // Update patient record
        $patient->update($validatedData);
    
        return redirect()->route('patients.index')->with('message', 'Patient updated successfully!');
    }
    

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('message', 'Patient deleted successfully!');
    }
}