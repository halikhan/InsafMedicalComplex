<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportRegistration;

class ReportController extends Controller
{
    public function index()
    {
        $reports = ReportRegistration::all();
        return view('admin.reports.index', compact('reports'));
    }

    public function create()
    {
        $departments = $this->getDepartments();
        return view('admin.reports.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'department' => 'required',
            'format_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        ReportRegistration::create($request->all());

        return redirect()->route('reports.index')->with('success', 'Report created successfully.');
    }

    public function edit($id)
    {
        $report = ReportRegistration::findOrFail($id);
        $departments = $this->getDepartments();
        return view('admin.reports.edit', compact('report', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'department' => 'required',
            'format_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $report = ReportRegistration::findOrFail($id);
        $report->update($request->all());

        return redirect()->route('reports.index')->with('success', 'Report updated successfully.');
    }

    public function destroy($id)
    {
        ReportRegistration::findOrFail($id)->delete();
        return redirect()->route('reports.index')->with('success', 'Report deleted successfully.');
    }

    private function getDepartments()
    {
        return [
            'LABORATORY', 'X-RAYS', 'OPG', 'OPD', 'MRI', 'ULTRASOUND', 'ECG',
            'C.T SCAN', 'COLOR DOPPLER', 'DENTAL SERVICES', 'OPERATION THEATER (OT)',
            'NICU (NEONATAL INTENSIVE CARE UNIT)', 'ICU (INTENSIVE CARE UNIT)',
            'PICU (PEDIATRIC INTENSIVE CARE UNIT)', 'GYNAECOLOGY SERVICES',
            'E.N.T (EAR, NOSE, THROAT)', 'DAY CARE - WARD SERVICES',
            'PHYSIOTHERAPY-SERVICES', 'ENDOSCOPY-SERVICES', 'BLOOD BANK',
            'DENTAL', 'AESTHETIC AND COSMETOLOGY', 'OPERATION ORTHO'
        ];
    }
}
