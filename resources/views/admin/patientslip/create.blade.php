@extends('admin.master')

@section('title', 'Create Patient Slip')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow border-0 rounded-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Create Patient Slip</h3>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('patientslips.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <!-- Panel Outside -->
               <div class="col-md-4">
               <div class="form-group">
                   <label for="panel_outside">Panel Outside</label>
                   <select name="panel_outside" id="panel_outside" class="form-control select2">
                       <option value="">Select Panel Outside</option>
                       @foreach($getCompanyRegistration as $value)
                           <option value="{{ $value->panel_name }}">{{ $value->panel_name }}</option>
                       @endforeach
                   </select>
               </div>
               </div>
               <!-- Age -->
                   <div class="col-md-2">
                   <div class="form-group">
                       <label for="age">Age</label>
                       <input type="number" name="age" id="age" class="form-control">
                   </div>
               </div>
               <!-- Gender -->
                   <div class="col-md-2">
                   <div class="form-group">
                       <label for="gender">Gender</label>
                       <select name="gender" id="gender" class="form-control">
                           <option value="Male">Male</option>
                           <option value="Female">Female</option>
                           <option value="Other">Other</option>
                       </select>
                   </div>
               </div>
               <!-- Contact No -->
               <div class="col-md-4">
                   <div class="form-group">
                       <label for="contact_no">Contact No</label>
                       <input type="text" name="contact_no" id="contact_no" class="form-control">
                   </div>
               </div>
           </div>
                        <!-- Patient Information -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="patient_id">Select Patient</label>
                                    <select name="patient_id" id="patient_id" class="form-control select2" required>
                                        <option value="">Search by ID, CNIC, or Name</option>
                                        @foreach($getAllPatients as $patient)
                                            <option value="{{ $patient->id }}" data-name="{{ $patient->name }}">
                                                {{ $patient->id }} - {{ $patient->name }} ({{ $patient->cnic }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="patient_name">Patient Name</label>
                                    <input type="text" name="patient_name" id="patient_name" class="form-control" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Test Details -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="test_name">Test Name</label>
                                    <select name="test_name[]" id="test_name" class="form-control select2" required multiple>
                                        @foreach($getAllTestRate as $test)
                                            <option value="{{ $test->id }}" data-charges="{{ $test->general_charges }}">
                                                {{ $test->test_name }} - {{ $test->general_charges }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Doctor and Service Details -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="doctor_name">Doctor Name</label>
                                    <select name="doctor_name" id="doctor_name" class="form-control select2" required>
                                        <option value="">Select Doctor</option>
                                        @foreach($getAllDoctor as $doctor)
                                            <option value="{{ $doctor->name }}" data-specialist_type="{{ $doctor->specialist_type }}">
                                                {{ $doctor->name }} - {{ $doctor->specialist_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="service_name">Service Name</label>
                                    <input type="text" name="service_name" id="service_name" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                   
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="slip_date">Slip Date</label>
                                    <input type="date" name="slip_date" id="slip_date" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="shift">Shift</label>
                                    <select name="shift" id="shift" class="form-control" required>
                                        <option value="Morning">Morning</option>
                                        <option value="Evening">Evening</option>
                                        <option value="Night">Night</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="time">Time</label>
                                    <input type="time" name="time" id="time" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="other_reference_no">Other Reference No</label>
                                    <input type="text" name="other_reference_no" id="other_reference_no" class="form-control">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ref_phy">Referring Physician</label>
                                    <input type="text" name="ref_phy" id="ref_phy" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pressdown_location">Pressdown Location</label>
                                    <input type="text" name="pressdown_location" id="pressdown_location" class="form-control">
                                </div>
                            </div>
                  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="procedure_name">Procedure Name</label>
                                    <input type="text" name="procedure_name" id="procedure_name" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="patient_history">Patient History</label>
                                <textarea name="patient_history" id="patient_history" class="form-control"></textarea>
                            </div>
                        </div>
                        </div>
                        <!-- Payment Information -->
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="discount">Discount</label>
                                    <input type="number" step="0.01" name="discount" id="discount" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="total_amount">Total Amount</label>
                                    <input type="number" name="total_amount" id="total_amount" class="form-control" required>
                                </div>
                            </div>
                      
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cash_received">Cash Received</label>
                                    <input type="number" name="cash_received" id="cash_received" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="dues">Dues</label>
                                    <input type="number" name="dues" id="dues" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center mt-3">
                            <button type="submit" class="btn btn-success">Create Slip</button>
                            <a href="{{ route('patientslips.index') }}" class="btn btn-secondary">Cancel</a>
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
        $('.select2').select2({ placeholder: "Select an option", allowClear: true });

        // Auto-fill patient name
        $('#patient_id').change(function() {
            let selectedName = $(this).find(':selected').data('name') || "";
            $('#patient_name').val(selectedName);
        });

        // Auto-fill doctor specialist type
        $('#doctor_name').change(function() {
            let specialist = $(this).find(':selected').data('specialist_type') || "";
            $('#service_name').val(specialist);
        });

        // Calculate total test charges
        $('#test_name').change(function() {
            let totalCharges = 0;
            $('#test_name option:selected').each(function() {
                totalCharges += parseFloat($(this).data('charges')) || 0;
            });
            $('#total_amount').val(totalCharges);
            calculateDueAmount();
        });

        // Calculate due amount when discount or cash received changes
        $('#discount, #cash_received').on('input', function() {
            calculateDueAmount();
        });

        function calculateDueAmount() {
            let totalAmount = parseFloat($('#total_amount').val()) || 0;
            let discount = parseFloat($('#discount').val()) || 0;
            let cashReceived = parseFloat($('#cash_received').val()) || 0;

            // Apply discount
            let discountedAmount = totalAmount - discount;
            discountedAmount = discountedAmount < 0 ? 0 : discountedAmount;

            // Prevent cash received from exceeding total amount
            if (cashReceived > discountedAmount) {
                $('#cash_received').val(discountedAmount);
                cashReceived = discountedAmount;
            }

            // Calculate dues
            let dues = discountedAmount - cashReceived;
            $('#dues').val(dues < 0 ? 0 : dues);
        }
    });
    </script>
@endpush
