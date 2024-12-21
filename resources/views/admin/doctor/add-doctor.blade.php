@extends('admin.master')
@section('title')
    Add Doctor
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button data-dismiss="alert" type="button" class="close">&times;</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Add Doctor</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('doctor.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="name" type="text" placeholder="Enter Doctor Name" value="{{ old('name') }}" />
                                        <label for="name">Doctor Name</label>
                                        <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Other fields -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="visit_days" type="text" placeholder="Visit Days" value="{{ old('visit_days') }}" />
                                        <label for="visit_days">Visit Days</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="degrees" type="text" placeholder="Degrees" value="{{ old('degrees') }}" />
                                        <label for="degrees">Degrees</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="contact" type="text" placeholder="Contact" value="{{ old('contact') }}" />
                                        <label for="contact">Contact</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="address" type="text" placeholder="Address" value="{{ old('address') }}" />
                                        <label for="address">Address</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="email" type="email" placeholder="Email" value="{{ old('email') }}" />
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-control" name="specialist_type">
                                            <option value="PRIVATE" {{ old('specialist_type') == 'PRIVATE' ? 'selected' : '' }}>PRIVATE</option>
                                            <option value="SPECIALIST" {{ old('specialist_type') == 'SPECIALIST' ? 'selected' : '' }}>SPECIALIST</option>
                                        </select>
                                        <label for="specialist_type">Specialist Type</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Percentage Fields -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="routine_percentage" type="number" step="0.01" placeholder="Routine Percentage" value="{{ old('routine_percentage', 0) }}" />
                                        <label for="routine_percentage">Routine Percentage</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="special_percentage" type="number" step="0.01" placeholder="Special Percentage" value="{{ old('special_percentage', 0) }}" />
                                        <label for="special_percentage">Special Percentage</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="xray_percentage" type="number" step="0.01" placeholder="X-Ray Percentage" value="{{ old('xray_percentage', 0) }}" />
                                        <label for="xray_percentage">X-Ray Percentage</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="ultrasound_percentage" type="number" step="0.01" placeholder="Ultrasound Percentage" value="{{ old('ultrasound_percentage', 0) }}" />
                                        <label for="ultrasound_percentage">Ultrasound Percentage</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="ecg_percentage" type="number" step="0.01" placeholder="ECG Percentage" value="{{ old('ecg_percentage', 0) }}" />
                                        <label for="ecg_percentage">ECG Percentage</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="endoscopy_percentage" type="number" step="0.01" placeholder="Endoscopy Percentage" value="{{ old('endoscopy_percentage', 0) }}" />
                                        <label for="endoscopy_percentage">Endoscopy Percentage</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="mri_percentage" type="number" step="0.01" placeholder="MRI Percentage" value="{{ old('mri_percentage', 0) }}" />
                                        <label for="mri_percentage">MRI Percentage</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="dental_percentage" type="number" step="0.01" placeholder="Dental Percentage" value="{{ old('dental_percentage', 0) }}" />
                                        <label for="dental_percentage">Dental Percentage</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="opd_percentage" type="number" step="0.01" placeholder="OPD Percentage" value="{{ old('opd_percentage', 0) }}" />
                                        <label for="opd_percentage">OPD Percentage</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="ipd_percentage" type="number" step="0.01" placeholder="IPD Percentage" value="{{ old('ipd_percentage', 0) }}" />
                                        <label for="ipd_percentage">IPD Percentage</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="ct_scan_percentage" type="number" step="0.01" placeholder="CT Scan Percentage" value="{{ old('ct_scan_percentage', 0) }}" />
                                        <label for="ct_scan_percentage">CT Scan Percentage</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="color_doppler_percentage" type="number" step="0.01" placeholder="Color Doppler Percentage" value="{{ old('color_doppler_percentage', 0) }}" />
                                        <label for="color_doppler_percentage">Color Doppler Percentage</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="file" value="{{old('image')}}" class="form-control" name="image">
                                <span class="text-danger">
                                         @error('image')
                                    {{$message}}
                                    @enderror
                                        </span>
                            </div>

                            <div class="mt-4 mb-0">
                                <input type="submit" class="btn btn-outline-success text-center" value="Add Doctor">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
