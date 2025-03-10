<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientSlip;
use Barryvdh\DomPDF\Facade\Pdf;

class PatientSlipController extends Controller
{
    public function index()
    {
        $patientSlips = PatientSlip::latest()->paginate(10);
        return view('admin.patientslip.index', compact('patientSlips'));
    }

    public function create()
    {
        return view('admin.patientslip.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'patient_id' => 'required|integer',
            'slip_date' => 'required|date',
            'shift' => 'required|string',
            'other_reference_no' => 'nullable|string',
            'time' => 'required',
            'patient_name' => 'required|string',
            'test_name' => 'required|string',
            'panel_outside' => 'required|string',
            'procedure_name' => 'required|string',
            'service_name' => 'required|string',
            'age' => 'nullable|integer',
            'gender' => 'required|string',
            'contact_no' => 'nullable|string',
            'ref_phy' => 'nullable|string',
            'pressdown_location' => 'nullable|string',
            'patient_history' => 'nullable|string',
            'total_amount' => 'required|numeric',
            'discount' => 'required|numeric',
            'cash_received' => 'required|numeric',
            'dues' => 'required|numeric',
            'charges' => 'required|numeric'
        ];

        $validatedData = $request->validate($rules);

        PatientSlip::create($validatedData);

        return redirect()->route('patientslips.index')->with('message', 'Patient slip added successfully!');
    }

    public function show(PatientSlip $patientSlip)
    {
        return view('admin.patientslip.show', compact('patientSlip'));
    }

    public function edit(PatientSlip $patientslip)
    {
        // dd($patientslip);
        return view('admin.patientslip.edit', compact('patientslip'));
    }

    public function updatew(Request $request, PatientSlip $patientSlip)
    {
        dd('$patientSlip',$patientSlip ,$request->all());
        $rules = [
            'patient_id' => 'required|integer',
            'slip_date' => 'required|date',
            'shift' => 'required|string',
            'other_reference_no' => 'nullable|string',
            'time' => 'required',
            'patient_name' => 'required|string',
            'test_name' => 'required|string',
            'panel_outside' => 'required|string',
            'procedure_name' => 'required|string',
            'service_name' => 'required|string',
            'age' => 'nullable|integer',
            'gender' => 'required|string',
            'contact_no' => 'nullable|string',
            'ref_phy' => 'nullable|string',
            'pressdown_location' => 'nullable|string',
            'patient_history' => 'nullable|string',
            'total_amount' => 'required|numeric',
            'discount' => 'required|numeric',
            'cash_received' => 'required|numeric',
            'dues' => 'required|numeric'
        ];

        $validatedData = $request->validate($rules);

        $patientSlip->update($validatedData);

        return redirect()->route('patientslips.index')->with('message', 'Patient slip updated successfully!');
    }
    public function update(Request $request, $id)
    {
        $patientSlip = PatientSlip::findOrFail($id); // Ensure the record is fetched from DB
        // dd( $patientSlip);
        $rules = [
            'patient_id' => 'required|integer',
            'slip_date' => 'required|date',
            'shift' => 'required|string',
            'other_reference_no' => 'nullable|string',
            'time' => 'required',
            'patient_name' => 'required|string',
            'test_name' => 'required|string',
            'panel_outside' => 'required|string',
            'procedure_name' => 'required|string',
            'service_name' => 'required|string',
            'age' => 'nullable|integer',
            'gender' => 'required|string',
            'contact_no' => 'nullable|string',
            'ref_phy' => 'nullable|string',
            'pressdown_location' => 'nullable|string',
            'patient_history' => 'nullable|string',
            'total_amount' => 'required|numeric',
            'discount' => 'required|numeric',
            'cash_received' => 'required|numeric',
            'dues' => 'required|numeric'
        ];
    
        $validatedData = $request->validate($rules);
        
        $patientSlip->update($validatedData); // Updating the fetched record
        
        return redirect()->route('patientslips.index')->with('message', 'Patient slip updated successfully!');
    }
    
    public function destroy($id)
    {
        $patientSlip = PatientSlip::findOrFail($id); // Ensure it's found
    
        $patientSlip->delete();
    
        return redirect()->route('patientslips.index')->with('message', 'Patient slip deleted successfully!');
    }
    
    public function print($id)
    {
        $patientSlip = PatientSlip::findOrFail($id);
        return view('admin.patientslip.print', compact('patientSlip'));
    }

    public function downloadPDF($id)
    {
        $patientSlip = PatientSlip::findOrFail($id);
    
        $pdf = Pdf::loadView('admin.patientslip.print', compact('patientSlip'));
    
        return $pdf->download('PatientSlip_' . $patientSlip->id . '.pdf');
    }
}
