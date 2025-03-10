@extends('admin.master')

@section('title', 'Print Patient Slip')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="text-center font-weight-light my-4">Patient Slip</h3>
                </div>

                <div class="card-body">
                    <h5>Patient Details</h5>
                    <p><strong>Patient Name:</strong> {{ $patientSlip->patientSlip_name }}</p>
                    <p><strong>Age:</strong> {{ $patientSlip->age }}</p>
                    <p><strong>Gender:</strong> {{ $patientSlip->gender }}</p>
                    <p><strong>Shift:</strong> {{ $patientSlip->shift }}</p>
                    <p><strong>Time:</strong> {{ $patientSlip->time }}</p>
                    <p><strong>Procedure Name:</strong> {{ $patientSlip->procedure_name }}</p>
                    <p><strong>Test Name:</strong> {{ $patientSlip->test_name }}</p>
                    <p><strong>Service Name:</strong> {{ $patientSlip->service_name }}</p>
                    <p><strong>Total Amount:</strong> {{ $patientSlip->total_amount }}</p>
                    <p><strong>Discount:</strong> {{ $patientSlip->discount }}</p>
                    <p><strong>Cash Received:</strong> {{ $patientSlip->cash_received }}</p>
                    <p><strong>Dues:</strong> {{ $patientSlip->dues }}</p>

                    <hr>
                    <div class="text-center">
                        <button class="btn btn-primary" onclick="window.print()">Print</button>
                        <a href="{{ route('patientslips.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
