@extends('admin.master')

@section('title', 'Print Patient Slip')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg p-3">
                <div class="text-center">
                    <h4><strong>INSAAF MEDICAL COMPLEX</strong></h4>
                    <p>LAB - X-RAYS - U/S - OPD - GYNAE - ER</p>
                    <p>PHARMACY - ICU - NICU - PICU</p>
                    <p>HELPLINE: 0331-1100870</p>
                    <h5 class="mt-2 bg-dark text-white p-2">LABORATORY RECEIPT</h5>
                </div>
                
                <p><strong>SLIP NO#:</strong> {{ $patientSlip->id }}</p>
                <p><strong>Patient's Name:</strong> {{ $patientSlip->patient_name }}</p>
                <p><strong>Consultant Physician / Referred by:</strong> {{ $patientSlip->ref_phy }}</p>
                <p><strong>Panel/Zakat/Welfare:</strong> {{ $patientSlip->panel_outside }}</p>
                <p><strong>Age/Gender:</strong> {{ $patientSlip->age }} / {{ $patientSlip->gender }}</p>
                <p><strong>Contact:</strong> {{ $patientSlip->contact_no }}</p>
                <p><strong>Date/Time:</strong> {{ $patientSlip->slip_date }} {{ $patientSlip->time }}</p>
                <p><strong>Shift:</strong> {{ $patientSlip->shift }}</p>
                
                <h5 class="bg-dark text-white p-2">SERVICES DETAILS</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Service Name</th>
                            <th>Charges (Rs.)</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($patientSlip->tests as $index => $test)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $test->name }}</td>
                            <td>{{ $test->charges }}</td>
                        </tr>
                        @endforeach --}}
                        <tr>
                            <td>1</td>
                            <td>test</td>
                            <td>1000</td>
                        </tr>
                    </tbody>
                </table>
                
                <p><strong>Total Amount:</strong> Rs. {{ $patientSlip->total_amount }}</p>
                <p><strong>Discount:</strong> Rs. {{ $patientSlip->discount }}</p>
                <p><strong>Net Amount:</strong> Rs. {{ $patientSlip->total_amount - $patientSlip->discount }}</p>
                <p><strong>Cash Received:</strong> Rs. {{ $patientSlip->cash_received }}</p>
                
                <div class="text-center mt-3">
                    <button class="btn btn-primary" onclick="window.print()">Print</button>
                    <a href="{{ route('patientslips.index') }}" class="btn btn-secondary">Back</a>
                </div>
                
                <p class="text-center mt-3">Printed By: Admin | Printed On: {{ now() }}</p>
            </div>
        </div>
    </div>
</div>
@endsection