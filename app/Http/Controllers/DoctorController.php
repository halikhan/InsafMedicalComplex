<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.doctor.manage-doctor',[
            'doctors'=>Doctor::orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.doctor.add-doctor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request according to the updated schema
        $request->validate([
            'name' => 'required|string|max:255',
            'visit_days' => 'required|string',
            'degrees' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'specialist_type' => 'required|in:PRIVATE,SPECIALIST',
            'psp' => 'nullable|numeric|min:0',
            'services_chr' => 'nullable|numeric|min:0',
    
            // Charge Percentages
            'routine_percentage' => 'nullable|numeric|min:0|max:100',
            'special_percentage' => 'nullable|numeric|min:0|max:100',
            'xray_percentage' => 'nullable|numeric|min:0|max:100',
            'ultrasound_percentage' => 'nullable|numeric|min:0|max:100',
            'ecg_percentage' => 'nullable|numeric|min:0|max:100',
            'endoscopy_percentage' => 'nullable|numeric|min:0|max:100',
            'mri_percentage' => 'nullable|numeric|min:0|max:100',
            'dental_percentage' => 'nullable|numeric|min:0|max:100',
            'opd_percentage' => 'nullable|numeric|min:0|max:100',
            'ipd_percentage' => 'nullable|numeric|min:0|max:100',
            'ct_scan_percentage' => 'nullable|numeric|min:0|max:100',
            'color_doppler_percentage' => 'nullable|numeric|min:0|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
    
        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $this->saveImage($request);
        }
    
        // Create the doctor record
        Doctor::create([
            'name' => $request->input('name'),
            'visit_days' => $request->input('visit_days'),
            'degrees' => $request->input('degrees'),
            'contact' => $request->input('contact'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'specialist_type' => $request->input('specialist_type'),
            'psp' => $request->input('psp', 0),
            'services_chr' => $request->input('services_chr', 0),
    
            // Charge Percentages
            'routine_percentage' => $request->input('routine_percentage', 0),
            'special_percentage' => $request->input('special_percentage', 0),
            'xray_percentage' => $request->input('xray_percentage', 0),
            'ultrasound_percentage' => $request->input('ultrasound_percentage', 0),
            'ecg_percentage' => $request->input('ecg_percentage', 0),
            'endoscopy_percentage' => $request->input('endoscopy_percentage', 0),
            'mri_percentage' => $request->input('mri_percentage', 0),
            'dental_percentage' => $request->input('dental_percentage', 0),
            'opd_percentage' => $request->input('opd_percentage', 0),
            'ipd_percentage' => $request->input('ipd_percentage', 0),
            'ct_scan_percentage' => $request->input('ct_scan_percentage', 0),
            'color_doppler_percentage' => $request->input('color_doppler_percentage', 0),
            'image' => $imagePath, // Save image path
        ]);
    
        return back()->with('message', 'Doctor added successfully!');
    }
    
    // Helper method for saving the image
    private function saveImage($request)
    {
        $image = $request->file('image');
        $imageNewName = rand() . '.' . $image->getClientOriginalExtension();
        $directory = 'admin-assets/assets/doctor-image/';
        $imgUrl = $directory . $imageNewName;
        $image->move($directory, $imageNewName);
        return $imgUrl;
    }
    

    // public function store(Request $request)
    // {
    //     $request->validate(
    //         [
    //             'name'=>'required',
    //             'phone'=> 'required',
    //             'speciality'=> 'required',
    //             'time'=> 'required',
    //             'day'=>'required',
    //             'image'=>'required',
    //             'fee'=>'required|numeric',
    //         ]
    //     );
    //     Doctor::saveDoctor($request);
    //     return back()->with('message','Doctor Added Successfully');
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.doctor.edit-doctor',[
            'doctor'=>Doctor::find($id),
            'doctors'=>Doctor::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Doctor::updateDoctor($request,$id);

        return redirect('doctor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctors = Doctor::find($id);
        if($doctors->image){
            if(file_exists($doctors->image)){
                unlink($doctors->image);
            }
        }
        $doctors->delete();
        return back();
    }
}