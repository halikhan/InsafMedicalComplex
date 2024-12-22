@extends('admin.master')
@section('title')
    Edit Doctor
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
<<<<<<< HEAD
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Edit Doctor</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('doctor.update', $doctor->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Doctor Name -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="name" type="text" placeholder="Enter Doctor Name" value="{{ $doctor->name }}" />
=======
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Doctor</h3></div>
                    <div class="card-body">
                        <form action="{{route('doctor.update',$doctor->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="name" type="text" placeholder="Enter Doctor Name" value="{{$doctor->name}}"/>
>>>>>>> 4d0cdcbbad56ca35cf2064831b8fbef357107b1f
                                        <label for="name">Doctor Name</label>
                                    </div>
                                </div>
                            </div>
<<<<<<< HEAD

                            <!-- Visit Days -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="visit_days" type="text" placeholder="Enter Visit Days" value="{{ $doctor->visit_days }}" />
                                        <label for="visit_days">Visit Days</label>
=======
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" value="{{$doctor->phone}}" id="inputPassword" name="phone" type="text" placeholder="Phone No" />
                                        <label for="phone">Pnone No</label>
>>>>>>> 4d0cdcbbad56ca35cf2064831b8fbef357107b1f
                                    </div>
                                </div>
                            </div>

<<<<<<< HEAD
                            <!-- Degrees -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="degrees" type="text" placeholder="Enter Degrees" value="{{ $doctor->degrees }}" />
                                        <label for="degrees">Degrees</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="contact" type="text" placeholder="Enter Contact Number" value="{{ $doctor->contact }}" />
                                        <label for="contact">Contact</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="address" type="text" placeholder="Enter Address" value="{{ $doctor->address }}" />
                                        <label for="address">Address</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Specialist Type -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <select name="specialist_type" class="form-select" style="width: 100%;">
                                            <option value="PRIVATE" {{ $doctor->specialist_type == 'PRIVATE' ? 'selected' : '' }}>Private</option>
                                            <option value="SPECIALIST" {{ $doctor->specialist_type == 'SPECIALIST' ? 'selected' : '' }}>Specialist</option>
                                        </select>
                                        <label for="specialist_type">Specialist Type</label>
=======
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <select name="speciality" id="inputSpeciality" class="form-select" style="width: 100%;">
                                            <option value="">Select Specialization</option>
                                            @foreach($doctors as $doctor)
                                                <option value="{{ $doctor->speciality }}">{{ $doctor->speciality }}</option>
                                            @endforeach
                                        </select>
                                        <label for="inputSpeciality">Specialization</label>
>>>>>>> 4d0cdcbbad56ca35cf2064831b8fbef357107b1f
                                    </div>
                                </div>
                            </div>

<<<<<<< HEAD
                            <!-- Other Fields -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="psp" type="number" placeholder="PSP" value="{{ $doctor->psp }}" />
                                        <label for="psp">PSP</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="services_chr" type="number" placeholder="Service Charge" value="{{ $doctor->services_chr }}" />
                                        <label for="services_chr">Service Charge</label>
=======

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control"value="{{$doctor->room}}" id="inputPassword" name="room" type="text" placeholder="Room No" />
                                        <label for="room">Room No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control"value="{{$doctor->time}}" id="inputPassword" name="time" type="text" placeholder="Schedule Time" />
                                        <label for="time">Schedule Time</label>
>>>>>>> 4d0cdcbbad56ca35cf2064831b8fbef357107b1f
                                    </div>
                                </div>
                            </div>

<<<<<<< HEAD
                            <!-- Percentages -->
                            <div class="row mb-3">
                                @php
                                    $percentages = [
                                        'routine_percentage' => 'Routine',
                                        'special_percentage' => 'Special',
                                        'xray_percentage' => 'X-Ray',
                                        'ultrasound_percentage' => 'Ultrasound',
                                        'ecg_percentage' => 'ECG',
                                        'endoscopy_percentage' => 'Endoscopy',
                                        'mri_percentage' => 'MRI',
                                        'dental_percentage' => 'Dental',
                                        'opd_percentage' => 'OPD',
                                        'ipd_percentage' => 'IPD',
                                        'ct_scan_percentage' => 'CT Scan',
                                        'color_doppler_percentage' => 'Color Doppler'
                                    ];
                                @endphp
                                @foreach($percentages as $field => $label)
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" name="{{ $field }}" type="number" step="0.01" max="100" placeholder="{{ $label }} Percentage" value="{{ $doctor->$field }}" />
                                            <label for="{{ $field }}">{{ $label }} Percentage</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Image -->
                            <div class="row mb-3">
                                <div class="col-md-12 text-center">
                                    <img src="{{ asset($doctor->image) }}" alt="Doctor Image" height="150px" width="150px">
                                </div>
                                <div class="col-md-12">
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>

                            <!-- Submit Button -->
=======
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control"value="{{$doctor->day}}" id="inputPassword" name="day" type="text" placeholder="Schedule Day" />
                                        <label for="day">Schedule Day</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <!-- Use the 'description' value from the $doctor model -->
                                        <textarea class="form-control" id="inputDescription" name="description" placeholder="Description">{{ $doctor->description }}</textarea>
                                        <label for="inputDescription">Description</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control"value="{{$doctor->fee}}" id="inputPassword" name="fee" type="number" placeholder="Fee" />
                                        <label for="fee">Consultant Fee</label>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 text-center">
                                <img src="{{asset($doctor->image)}}" alt=""height="150px" width="150px">
                            </div>

                            <div class="col-md-12">
                                <input type="file" class="form-control" name="image">
                            </div>

>>>>>>> 4d0cdcbbad56ca35cf2064831b8fbef357107b1f
                            <div class="mt-4 mb-0">
                                <input type="submit" class="btn btn-outline-success text-center" value="Update Info">
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
