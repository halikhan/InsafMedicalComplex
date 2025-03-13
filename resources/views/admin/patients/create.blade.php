@extends('admin.master')

@section('title', 'Create Patient')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="text-center font-weight-light my-4">Create Patient</h3>
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
                    <form action="{{ route('patients.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Patient Name">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact <small style="color: red">Only Numbers</small></label>
                            <input type="number" name="contact" id="contact" class="form-control" placeholder="Enter Contact Number">
                        </div>
                        <div class="form-group">
                            <label for="cnic">CNIC <small style="color: red">Only Numbers</small></label>
                            <input type="number" name="cnic" id="cnic" class="form-control" placeholder="Enter CNIC">
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" name="age" id="age" class="form-control" placeholder="Enter Age">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="admit_date">Admit Date</label>
                            <input type="date" name="admit_date" id="admit_date" class="form-control">
                        </div>
        
                        <div class="form-group">
                            <label for="shift">shift</label>
                            <select name="shift" id="shift" class="form-control">
                                <option value="Morning">Morning</option>
                                <option value="Evening">Evening</option>
                                <option value="Night">Night</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" name="time" id="time" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="file_no">File No</label>
                            <input type="number" name="file_no" id="file_no" class="form-control" placeholder="Enter File No">
                        </div>
                        <!-- Panel Outside -->
                        <div class="form-group">
                            <label for="panel_outside">Panel Outside</label>
                            <select name="panel_outside" id="panel_outside" class="form-control select2">
                                <option value="">Select Panel Outside</option>
                                @foreach($getCompanyRegistration as $value)
                                    <option value="{{ $value->panel_name }}">{{ $value->panel_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="doctor_name">Doctor Name</label>
                            <select name="doctor_name" id="doctor_name" class="form-control select2">
                                <option value="">Select Doctor Name</option>
                                @foreach($getAllDoctor as $value)
                                    <option value="{{ $value->name }}" data-specialist_type="{{ $value->specialist_type }}">
                                        {{ $value->name }} - {{ $value->specialist_type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Service Name (Auto-filled) -->
                        <div class="form-group">
                            <label for="service_name">Consultant</label>
                            <input type="text" name="service_name" id="service_name" class="form-control" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="admission_type">Admission Type</label>
                            <input type="text" name="admission_type" id="admission_type" class="form-control" placeholder="Enter Admission Type">
                        </div>
        
                        <div class="form-group">
                            <label for="room_no">Room No</label>
                            <select name="room_no" id="room_no" class="form-control select2">
                                <option value="">Select Panel Outside</option>
                                @foreach($getWard as $value)
                                    <option value="{{ $value->ward_name }}">{{ $value->ward_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="attendant_name">Attendant Name</label>
                            <input type="text" name="attendant_name" id="attendant_name" class="form-control" placeholder="Enter Attendant Name">
                        </div>
                        <div class="form-group">
                            <label for="attendant_contact">Attendant Contact</label>
                            <input type="text" name="attendant_contact" id="attendant_contact" class="form-control" placeholder="Enter Attendant Contact">
                        </div>
                        <div class="form-group">
                            <label for="relation_with_patient">Relation with Patient</label>
                            <input type="text" name="relation_with_patient" id="relation_with_patient" class="form-control" placeholder="Enter Relation">
                        </div>
                        <div class="form-group">
                            <label for="admission_number">Admission Number</label>
                            <input type="text" name="admission_number" id="admission_number" class="form-control" placeholder="Enter Admission Number">
                        </div>
          
                        <div class="form-group">
                            <label for="lmp_date">LMP Date</label>
                            <input type="date" name="lmp_date" id="lmp_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="expected_due_date">Expected Due Date</label>
                            <input type="date" name="expected_due_date" id="expected_due_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="advance_received">Advance Received</label>
                            <input type="number" name="advance_received" id="advance_received" class="form-control" placeholder="Enter Advance Received Amount">
                        </div>
                        <br>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-info">Create</button>
                            <a href="{{ route('patients.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Include Select2 JS and jQuery -->
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

    $(document).ready(function() {
        $('#test_name').select2({
            placeholder: "Select Test(s)",
            allowClear: true
        });

        // Calculate and update total charges when test selections change
        $('#test_name').change(function() {
            var totalCharges = 0;
            $('#test_name option:selected').each(function() {
                var charge = parseFloat($(this).data('charges')) || 0;
                totalCharges += charge;
            });
            $('#total_charges').val(totalCharges);
        });
    });
    </script>
    
@endpush