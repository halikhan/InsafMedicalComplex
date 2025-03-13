@extends('admin.master')

@section('title', 'Edit Patient')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="text-center font-weight-light my-4">Edit Patient</h3>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $patient->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{ $patient->address }}">
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact</label>
                            <input type="number" name="contact" id="contact" class="form-control" value="{{ $patient->contact }}">
                        </div>
                        <div class="form-group">
                            <label for="cnic">CNIC</label>
                            <input type="number" name="cnic" id="cnic" class="form-control" value="{{ $patient->cnic }}">
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" name="age" id="age" class="form-control" value="{{ $patient->age }}">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="Male" {{ $patient->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $patient->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ $patient->gender == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="admit_date">Admit Date</label>
                            <input type="date" name="admit_date" id="admit_date" class="form-control" value="{{ $patient->admit_date }}">
                        </div>
                        <div class="form-group">
                            <label for="shift">Shift</label>
                            <select name="shift" id="shift" class="form-control">
                                <option value="Morning" {{ $patient->shift == 'Morning' ? 'selected' : '' }}>Morning</option>
                                <option value="Evening" {{ $patient->shift == 'Evening' ? 'selected' : '' }}>Evening</option>
                                <option value="Night" {{ $patient->shift == 'Night' ? 'selected' : '' }}>Night</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" name="time" id="time" class="form-control" value="{{ $patient->time }}" required>
                        </div>

                        <div class="form-group">
                            <label for="file_no">File No</label>
                            <input type="number" name="file_no" id="file_no" class="form-control" value="{{ $patient->file_no }}" required>
                        </div>
                        <div class="form-group">
                            <label for="panel_outside">Panel Outside</label>
                            <select name="panel_outside" id="panel_outside" class="form-control select2" required>
                                <option value="">Select Panel Outside</option>
                                @foreach($getCompanyRegistration as $value)
                                    <option value="{{ $value->panel_name }}" {{ $patient->panel_outside == $value->panel_name ? 'selected' : '' }}>
                                        {{ $value->panel_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="doctor_name">Doctor Name</label>
                            <select name="doctor_name" id="doctor_name" class="form-control select2">
                                <option value="">Select Doctor</option>
                                @foreach($getAllDoctor as $doctor)
                                    <option value="{{ $doctor->name }}" data-specialist_type="{{ $doctor->specialist_type }}" {{ $patient->doctor_name == $doctor->name ? 'selected' : '' }}>
                                        {{ $doctor->name }} - {{ $doctor->specialist_type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="service_name">Consultant</label>
                            <input type="text" name="service_name" id="service_name" class="form-control" value="{{ $patient->service_name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="room_no">Room No</label>
                            <select name="room_no" id="room_no" class="form-control select2">
                                <option value="">Select Room</option>
                                @foreach($getWard as $ward)
                                    <option value="{{ $ward->ward_name }}" {{ $patient->room_no == $ward->ward_name ? 'selected' : '' }}>
                                        {{ $ward->ward_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="admission_type">Admission Type</label>
                            <input type="text" name="admission_type" id="admission_type" class="form-control" value="{{ old('admission_type', $patient->admission_type) }}" placeholder="Enter Admission Type" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="attendant_name">Attendant Name</label>
                            <input type="text" name="attendant_name" id="attendant_name" class="form-control" value="{{ $patient->attendant_name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="attendant_contact">Attendant Contact</label>
                            <input type="text" name="attendant_contact" id="attendant_contact" class="form-control" value="{{ $patient->attendant_contact }}" required>
                        </div>

                        <div class="form-group">
                            <label for="relation_with_patient">Relation with Patient</label>
                            <input type="text" name="relation_with_patient" id="relation_with_patient" class="form-control" value="{{ $patient->relation_with_patient }}" required>
                        </div>

                        <div class="form-group">
                            <label for="admission_number">Admission Number</label>
                            <input type="text" name="admission_number" id="admission_number" class="form-control" value="{{ $patient->admission_number }}" required>
                        </div>

                        <div class="form-group">
                            <label for="advance_received">Advance Received</label>
                            <input type="number" name="advance_received" id="advance_received" class="form-control" value="{{ $patient->advance_received }}" required>
                        </div>
                        <br>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-info">Update</button>
                            <a href="{{ route('patients.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select an option",
                allowClear: true
            });
            $('#doctor_name').change(function() {
                var specialistType = $(this).find(':selected').data('specialist_type') || "";
                $('#service_name').val(specialistType);
            });
        });
    </script>
@endpush
