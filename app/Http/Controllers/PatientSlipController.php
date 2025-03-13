<?php
namespace App\Http\Controllers;

use App\Models\CompanyRegistration;
use App\Models\Doctor;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\PatientSlip;
use App\Models\Service;
use App\Models\TestRate;
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
        $getAllPatients = Patient::latest()->get(); 
        $getAllTestRate = TestRate::latest()->get(); 
        $getAllDoctor = Doctor::latest()->get(); 
        $getService = Service::latest()->get(); 
        $getCompanyRegistration = CompanyRegistration::latest()->get(); 
        return view('admin.patientslip.create', get_defined_vars());
    }
    

    public function store(Request $request)
    {
        // Validate input fields
        $rules = [
            'patient_id' => 'required|integer',
            'slip_date' => 'required|date',
            'shift' => 'required|string',
            'time' => 'required',
            'patient_name' => 'required|string',
            'test_name' => 'required|array', // Ensure it's an array
            'test_name.*' => 'integer', // Each test ID should be an integer
            'procedure_name' => 'required|string',
            'service_name' => 'required|string',
            'doctor_name' => 'required|string',
            'panel_outside' => 'required|string',
            'age' => 'nullable|integer',
            'gender' => 'required|string',
            'contact_no' => 'nullable|string',
            'ref_phy' => 'nullable|string',
            'pressdown_location' => 'nullable|string',
            'patient_history' => 'nullable|string',
            'other_reference_no' => 'nullable|string',
            'total_amount' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'cash_received' => 'required|numeric|min:0',
            'charges' => 'nullable|numeric|min:0', // 🔥 Ensure charges is included
        ];
    
        $validatedData = $request->validate($rules);
    
        // Calculate the final payable amount after discount
        $totalAmount = $validatedData['total_amount'];
        $discount = $validatedData['discount'] ?? 0;
        $cashReceived = $validatedData['cash_received'];
    
        // Ensure discount does not exceed total amount
        $payableAmount = max($totalAmount - $discount, 0);
    
        // Ensure cash received does not exceed payable amount
        if ($cashReceived > $payableAmount) {
            return redirect()->back()->withErrors(['cash_received' => 'Cash received cannot be greater than the payable amount.']);
        }
    
        // Calculate dues (remaining amount)
        $dues = max($payableAmount - $cashReceived, 0);
    
        // Insert data into the database
        PatientSlip::create([
            'patient_id' => $validatedData['patient_id'],
            'slip_date' => $validatedData['slip_date'],
            'shift' => $validatedData['shift'],
            'time' => $validatedData['time'],
            'patient_name' => $validatedData['patient_name'],
            'test_name' => json_encode($validatedData['test_name']), // Convert array to JSON
            'procedure_name' => $validatedData['procedure_name'],
            'service_name' => $validatedData['service_name'],
            'doctor_name' => $validatedData['doctor_name'],
            'panel_outside' => $validatedData['panel_outside'], // Newly added field
            'age' => $validatedData['age'],
            'gender' => $validatedData['gender'],
            'contact_no' => $validatedData['contact_no'],
            'ref_phy' => $validatedData['ref_phy'],
            'pressdown_location' => $validatedData['pressdown_location'],
            'patient_history' => $validatedData['patient_history'],
            'other_reference_no' => $validatedData['other_reference_no'],
            'total_amount' => $totalAmount,
            'discount' => $discount,
            'cash_received' => $cashReceived,
            'dues' => $dues,
            'charges' => $validatedData['charges'] ?? 0, // 🔥 Ensure charges is inserted
        ]);
    
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
    
        // Decode test IDs from JSON
        $testIds = json_decode($patientSlip->test_name, true);
    
        // Fetch test details from TestRate table
        $tests = TestRate::whereIn('id', $testIds)->get();
        // dd($tests);
        return view('admin.patientslip.print', get_defined_vars());
    }
    

    public function downloadPDF($id)
    {
        $patientSlip = PatientSlip::findOrFail($id);
            // Decode test IDs from JSON
        $testIds = json_decode($patientSlip->test_name, true);
        // Fetch test details from TestRate tabl
        $tests = TestRate::whereIn('id', $testIds)->get();
        $pdf = Pdf::loadView('admin.patientslip.print', get_defined_vars());
    
        return $pdf->download('PatientSlip_' . $patientSlip->id . '.pdf');
    }
}
