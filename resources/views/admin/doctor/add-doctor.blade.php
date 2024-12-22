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
<<<<<<< HEAD
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
=======
                            {{session()->get('message')}}
                        </div>
                     @endif
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Doctor</h3></div>
                    <div class="card-body">
                        <form action="{{route('doctor.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="name" type="text" placeholder="Enter Doctor Name" value="{{old('name')}}" />
                                        <label for="doctorname">Doctor Name</label>
                                        <span class="text-danger">
                                         @error('name')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" name="phone" type="text" placeholder="Phone No"value="{{old('phone')}}" />
                                        <label for="phone">Phone No. </label>
                                        <span class="text-danger">
                                         @error('phone')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0" style="width: 300px;">
{{--                                        <input class="form-control" id="inputPassword" name="speciality" type="text" placeholder="Speciality" />--}}
{{--                                        <label for="speciality">Speciality</label>--}}
                                        <select name="speciality" id="" style="width: 183%;">
                                            <option value="">--Speciality--</option>
                                            <option value="Skin">Skin</option>
                                            <option value="Heart">Heart</option>
                                            <option value="Eye">Eye</option>
                                            <option value="Nose">Nose</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" name="room" type="number" placeholder="Room No" value="{{old('room')}}" />
                                        <label for="room">Room No. </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" name="time" type="text" placeholder="Time" value="{{old('time')}}" />
                                        <label for="time">Schedule Time</label>
                                        <span class="text-danger">
                                         @error('time')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" name="day" type="text" placeholder="Days" value="{{old('day')}}" />
                                        <label for="scheduledays">Schedule Days</label>
                                        <span class="text-danger">
                                         @error('day')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <!-- Use the 'description' value from the old input if validation fails -->
                                        <textarea class="form-control" id="inputDescription" name="description" placeholder="Doctor Description" style="height: 200px;">{{ old('description') }}</textarea>
                                        <label for="inputDescription">Doctor's Description</label>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" value="{{old('fee')}}" name="fee" type="number" placeholder="Doctor Fee" />
                                        <label for="fee">Consultant Fee</label>
                                        <span class="text-danger">
                                         @error('fee')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>

>>>>>>> 4d0cdcbbad56ca35cf2064831b8fbef357107b1f
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
<<<<<<< HEAD
=======

>>>>>>> 4d0cdcbbad56ca35cf2064831b8fbef357107b1f
@endsection
