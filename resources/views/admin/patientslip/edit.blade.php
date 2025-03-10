@extends('admin.master')

@section('title', 'Edit Patient')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="text-center font-weight-light my-4">Edit Patient Slip</h3>
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
                    <form action="{{ route('patientslips.update', $patientslip->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="patient_id">Patient ID</label>
                            <input type="number" name="patient_id" id="patient_id" class="form-control" value="{{ $patientslip->patient_id }}" required>
                        </div>

                        <div class="form-group">
                            <label for="patient_name">Patient Name</label>
                            <input type="text" name="patient_name" id="patient_name" class="form-control" value="{{ $patientslip->patient_name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="slip_date">Slip Date</label>
                            <input type="date" name="slip_date" id="slip_date" class="form-control" value="{{ $patientslip->slip_date }}" required>
                        </div>

                        <div class="form-group">
                            <label for="shift">Shift</label>
                            <select name="shift" id="shift" class="form-control" required>
                                <option value="Morning" {{ $patientslip->shift == 'Morning' ? 'selected' : '' }}>Morning</option>
                                <option value="Evening" {{ $patientslip->shift == 'Evening' ? 'selected' : '' }}>Evening</option>
                                <option value="Night" {{ $patientslip->shift == 'Night' ? 'selected' : '' }}>Night</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" name="time" id="time" class="form-control" value="{{ $patientslip->time }}" required>
                        </div>

                        <div class="form-group">
                            <label for="other_reference_no">Other Reference No</label>
                            <input type="text" name="other_reference_no" id="other_reference_no" class="form-control" value="{{ $patientslip->other_reference_no }}">
                        </div>

                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" name="age" id="age" class="form-control" value="{{ $patientslip->age }}">
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control" required>
                                <option value="Male" {{ $patientslip->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $patientslip->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ $patientslip->gender == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="contact_no">Contact No</label>
                            <input type="text" name="contact_no" id="contact_no" class="form-control" value="{{ $patientslip->contact_no }}">
                        </div>

                        <div class="form-group">
                            <label for="ref_phy">Referring Physician</label>
                            <input type="text" name="ref_phy" id="ref_phy" class="form-control" value="{{ $patientslip->ref_phy }}">
                        </div>

                        <div class="form-group">
                            <label for="pressdown_location">Pressdown Location</label>
                            <input type="text" name="pressdown_location" id="pressdown_location" class="form-control" value="{{ $patientslip->pressdown_location }}">
                        </div>

                        <div class="form-group">
                            <label for="patient_history">Patient History</label>
                            <textarea name="patient_history" id="patient_history" class="form-control">{{ $patientslip->patient_history }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="procedure_name">Procedure Name</label>
                            <input type="text" name="procedure_name" id="procedure_name" class="form-control" value="{{ $patientslip->procedure_name }}">
                        </div>

                        <div class="form-group">
                            <label for="test_name">Test Name</label>
                            <input type="text" name="test_name" id="test_name" class="form-control" value="{{ $patientslip->test_name }}">
                        </div>

                        <div class="form-group">
                            <label for="service_name">Service Name</label>
                            <input type="text" name="service_name" id="service_name" class="form-control" value="{{ $patientslip->service_name }}">
                        </div>

                        <div class="form-group">
                            <label for="panel_outside">Panel Outside</label>
                            <input type="text" name="panel_outside" id="panel_outside" class="form-control" value="{{ $patientslip->panel_outside }}">
                        </div>

                        <div class="form-group">
                            <label for="total_amount">Total Amount</label>
                            <input type="number" step="0.01" name="total_amount" id="total_amount" class="form-control" value="{{ $patientslip->total_amount }}" required>
                        </div>

                        <div class="form-group">
                            <label for="charges">Charges</label>
                            <input type="number" step="0.01" name="charges" id="charges" class="form-control" value="{{ $patientslip->charges }}" required>
                        </div>

                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="number" step="0.01" name="discount" id="discount" class="form-control" value="{{ $patientslip->discount }}" required>
                        </div>

                        <div class="form-group">
                            <label for="cash_received">Cash Received</label>
                            <input type="number" step="0.01" name="cash_received" id="cash_received" class="form-control" value="{{ $patientslip->cash_received }}" required>
                        </div>

                        <div class="form-group">
                            <label for="dues">Dues</label>
                            <input type="number" step="0.01" name="dues" id="dues" class="form-control" value="{{ $patientslip->dues }}" required>
                        </div>

                        <br>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-info">Update Slip</button>
                            <a href="{{ route('patientslips.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
