<?php
namespace App\Http\Controllers;

use App\Models\CompanyRegistration;
use App\Models\Service;
use App\Models\TestRate;
use Illuminate\Http\Request;

class TestRateController extends Controller
{
    public function index()
    {
        $testRates = TestRate::all();
        return view('admin.test_rates.index', compact('testRates'));
    }

    public function create()
    {
        $services = Service::all(); 
        $companies = CompanyRegistration::all();

        return view('admin.test_rates.create',get_defined_vars());
    }

    public function store(Request $request)
    {
        // dd($request->all()); 
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'department_name' => 'required|string|max:255',
            'panel_outside' => 'required|string|max:255',
            'test_name' => 'required|string|max:255',
            'general_charges' => 'required|numeric',
            's_private' => 'numeric',
            'private' => 'numeric',
            'status' => 'required|string',
            'category' => 'required|string',
            'report_days' => 'numeric',
            'is_profile_test' => 'boolean',
        ]);

        TestRate::create($validated);

        return redirect()->route('test_rates.index')->with('success', 'Test Rate added successfully!');
    }
    public function show($id)
    {
        $testRate = TestRate::findOrFail($id); // Fetch the test rate by ID
        return view('admin.test_rates.show', compact('testRate')); // Render the show view
    }
    
    public function edit(TestRate $testRate)
    {
        $services = Service::all(); 
        $companies = CompanyRegistration::all();
        return view('admin.test_rates.edit',get_defined_vars());
    }

    public function update(Request $request, TestRate $testRate)
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'department_name' => 'required|string|max:255',
            'panel_outside' => 'required|string|max:255',
            'test_name' => 'required|string|max:255',
            'general_charges' => 'required|numeric',
            's_private' => 'numeric',
            'private' => 'numeric',
            'status' => 'required|string',
            'category' => 'required|string',
            'report_days' => 'numeric',
            'is_profile_test' => 'boolean',
        ]);

        $testRate->update($validated);

        return redirect()->route('test_rates.index')->with('success', 'Test Rate updated successfully!');
    }

    public function destroy($id)
    {
        // dd('hetete');
        // Find the test rate by ID and delete it
        $testRate = TestRate::findOrFail($id);
        $testRate->delete();
    
        // Redirect back to the index page with a success message
        return redirect()->route('test_rates.index')->with('success', 'Test rate deleted successfully.');
    }
    
}
