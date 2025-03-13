<?php

namespace App\Http\Controllers;

use App\Models\CompanyRegistration;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\PatientSlip;
use App\Models\Service;
use App\Models\TestRate;
use App\Models\Ward;
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
        $getAllTestRate = TestRate::latest()->get(); 
        $getAllDoctor = Doctor::latest()->get(); 
        $getService = Service::latest()->get(); 
        $getWard= Ward::latest()->get(); 
        $getCompanyRegistration = CompanyRegistration::latest()->get(); 
        return view('admin.patients.create', get_defined_vars());
    }

    public function store(Request $request)
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
            'service_name' => 'required|string',
            'doctor_name' => 'required|string',
            'panel_outside' => 'required|string',
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
    
        // Store data in the database
        Patient::create($validatedData);
    
        return redirect()->route('patients.index')->with('message', 'Patient added successfully!');
    }
    
    public function edit(Patient $patient)
    {
        $getAllTestRate = TestRate::latest()->get(); 
        $getAllDoctor = Doctor::latest()->get(); 
        $getService = Service::latest()->get(); 
        $getWard= Ward::latest()->get(); 
        $getCompanyRegistration = CompanyRegistration::latest()->get(); 
        return view('admin.patients.edit', get_defined_vars());
    }

    public function show(Patient $patient)
    {
        // dd($patient);
        // $patientSlip = Patient::find($patient->id); // Ensure it's found
        return view('admin.patients.show', get_defined_vars());
    }
    public function patientslips(Patient $id)
    {
        // dd($id->id);
        // $patientSlip = Patient::find($patient->id); // Ensure it's found
        $patientSlips = PatientSlip::where('patient_id',$id->id)->latest()->paginate(10);

        return view('admin.patients.slipsList', get_defined_vars());
    }
    
    public function patientprintslip($id)
    {
        // dd($id);

        $patientSlip = PatientSlip::where('patient_id',$id)->first();
        // Decode test IDs from JSON
        $testIds = json_decode($patientSlip->test_name, true);
    
        // Fetch test details from TestRate table
        $tests = TestRate::whereIn('id', $testIds)->get();
        // dd($tests);
        return view('admin.patientslip.print', get_defined_vars());
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
            'service_name' => 'required|string',
            'doctor_name' => 'required|string',
            'panel_outside' => 'required|string',
            'file_no' => 'required|string',
            'room_no' => 'required|string',
            'attendant_name' => 'required|string',
            'attendant_contact' => 'required|string',
            'relation_with_patient' => 'required|string',
            'advance_received' => 'required|numeric',
            'admission_type' => 'required|string',
            'lmp_date' => 'nullable|date',
            'expected_due_date' => 'nullable|date',
            'admission_number' => 'required|unique:patients,admission_number,' . $id,
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