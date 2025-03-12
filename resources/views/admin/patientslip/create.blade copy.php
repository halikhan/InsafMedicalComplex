@extends('admin.master')

@section('title', 'Create Patient Slip')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="text-center font-weight-light my-4">Create Patient Slip</h3>
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
                    <form action="{{ route('patientslips.store') }}" method="POST">
                        @csrf
                        <!-- Patient Selection -->
                        <div class="form-group">
                        <label for="patient_id">Select Patient</label>
                        <select name="patient_id" id="patient_id" class="form-control select2" required>
                            <option value="">Search Patient by ID, CNIC, or Name</option>
                            @foreach($getAllPatients as $patient)
                                <option value="{{ $patient->id }}" data-cnic="{{ $patient->cnic }}" data-name="{{ $patient->name }}">
                                    {{ $patient->id }} - {{ $patient->name }} ({{ $patient->cnic }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Patient Name (Auto-filled) -->
                    <div class="form-group">
                        <label for="patient_name">Patient Name</label>
                        <input type="text" name="patient_name" id="patient_name" class="form-control" value="" readonly>
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

                        <!-- Test Name -->
                        <div class="form-group">
                            <label for="test_name">Test Name</label>
                            <select name="test_name[]" id="test_name" class="form-control select2" multiple>
                                @foreach($getAllTestRate as $value)
                                    <option value="{{ $value->test_name ?? '' }}" data-charges="{{ $value->general_charges ?? '' }}">
                                        {{ $value->test_name ?? '' }} - {{ $value->general_charges ?? '' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Selected Test Charges (Auto-filled) -->
                        <div class="form-group">
                            <label for="total_charges">Total Charges</label>
                            <input type="text" name="total_charges" id="total_charges" class="form-control" value="" readonly>
                        </div>
                            <!-- Doctor Name -->
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
                            <label for="service_name">Service Name</label>
                            <input type="text" name="service_name" id="service_name" class="form-control" value="" readonly>
                        </div>


                        {{-- <div class="form-group">
                            <label for="service_name">Service Name</label>
                            <select name="service_name" id="service_name" class="form-control select2">
                                <option value="">Select Service Name</option>
                                @foreach($getService as $value)
                                    <option value="{{ $value->specialist_type }}">{{ $value->specialist_type }}</option>
                                @endforeach
                            </select>
                        </div> --}}

             
            
                        
                        <div class="form-group">
                            <label for="slip_date">Slip Date</label>
                            <input type="date" name="slip_date" id="slip_date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="shift">Shift</label>
                            <select name="shift" id="shift" class="form-control" required>
                                <option value="Morning">Morning</option>
                                <option value="Evening">Evening</option>
                                <option value="Night">Night</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" name="time" id="time" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="other_reference_no">Other Reference No</label>
                            <input type="text" name="other_reference_no" id="other_reference_no" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" name="age" id="age" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="contact_no">Contact No</label>
                            <input type="text" name="contact_no" id="contact_no" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="ref_phy">Referring Physician</label>
                            <input type="text" name="ref_phy" id="ref_phy" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="pressdown_location">Pressdown Location</label>
                            <input type="text" name="pressdown_location" id="pressdown_location" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="patient_history">Patient History</label>
                            <textarea name="patient_history" id="patient_history" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="procedure_name">Procedure Name</label>
                            <input type="text" name="procedure_name" id="procedure_name" class="form-control">
                        </div>

                     

                        <div class="form-group">
                            <label for="total_amount">Total Amount</label>
                            <input type="number" step="0.01" name="total_amount" id="total_amount" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="charges">Charges </label>
                            <input type="number" step="0.01" name="charges" id="charges" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="number" step="0.01" name="discount" id="discount" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="cash_received">Cash Received</label>
                            <input type="number" step="0.01" name="cash_received" id="cash_received" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="dues">Dues</label>
                            <input type="number" step="0.01" name="dues" id="dues" class="form-control" required>
                        </div>

                        <br>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-info">Create Slip</button>
                            <a href="{{ route('patientslips.index') }}" class="btn btn-secondary">Cancel</a>
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

        // Update patient name on selection change
        $('#patient_id').change(function() {
            var selectedPatientName = $(this).find(':selected').data('name') || "";
            $('#patient_name').val(selectedPatientName);
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