<?php
namespace App\Http\Controllers;

use App\Models\CompanyRegistration;
use Illuminate\Http\Request;

class CompanyRegistrationController extends Controller
{
    public function index()
    {
        $companies = CompanyRegistration::all();
        return view('admin.company_registrations.index', compact('companies'));
    }

    public function create()
    {
        return view('admin.company_registrations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'panel_name' => 'required|max:255',
            'reg_date' => 'required|date',
            'rate_list_status' => 'required|in:Same Rate,Change Rate,Outside RateList',
        ]);

        CompanyRegistration::create($request->all());

        return redirect()->route('company_registrations.index')->with('success', 'Company registered successfully!');
    }

    public function edit(CompanyRegistration $companyRegistration)
    {
        return view('admin.company_registrations.edit', compact('companyRegistration'));
    }

    public function update(Request $request, CompanyRegistration $companyRegistration)
    {
        $request->validate([
            'panel_name' => 'required|max:255',
            'reg_date' => 'required|date',
            'rate_list_status' => 'required|in:Same Rate,Change Rate,Outside RateList',
        ]);

        $companyRegistration->update($request->all());

        return redirect()->route('company_registrations.index')->with('success', 'Company updated successfully!');
    }

    public function destroy(CompanyRegistration $companyRegistration)
    {
        $companyRegistration->delete();

        return redirect()->route('company_registrations.index')->with('success', 'Company deleted successfully!');
    }
}
