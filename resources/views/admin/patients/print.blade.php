@extends('admin.master')

@section('title', 'Print Patient Slip')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg p-3" style="font-size: 12px;">
                <div class="text-center">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('assets/img/logo-rem.png') }}" alt="Hospital Logo" style="width: 80px; height: 80px;">
                    </div>
                    <h2 class="mt-2"><b>INSAAF MEDICAL COMPLEX</b></h2>
                    <p>LAB - X-RAYS - U/S - OPD - GYNAE - ER</p>
                    <p>PHARMACY - ICU - NICU - PICU</p>
                    <p><strong>HELPLINE:</strong> 0331-1100870</p>
                    <h5 class="mt-2 bg-dark text-white p-2"><b>LABORATORY RECEIPT</b></h5>
                </div>
                
                <p><strong>SLIP NO#:</strong> {{ str_pad($patientSlip->id, 4, '0', STR_PAD_LEFT) }}</p>
                <p><strong>Patient's Name:</strong> {{ $patientSlip->patient_name }}</p>
                <p><strong>Consultant Physician / Referred by:</strong> {{ $patientSlip->ref_phy }}</p>
                <p><strong>Panel/Zakat/Welfare:</strong> {{ $patientSlip->panel_outside }}</p>
                <p><strong>Age/Gender:</strong> {{ $patientSlip->age }} / {{ $patientSlip->gender }}</p>
                <p><strong>Contact:</strong> {{ $patientSlip->contact_no }}</p>
                <p><strong>Date/Time:</strong> 
                    {{ \Carbon\Carbon::parse($patientSlip->slip_date)->format('d-m-Y') }} -
                    {{ \Carbon\Carbon::parse($patientSlip->time)->format('h:i A') }}
                </p>                
                <p><strong>Shift:</strong> {{ $patientSlip->shift }}</p>
                
                <h5 class="bg-dark text-white p-2"><b>SERVICES DETAILS</b></h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Service Name</th>
                            <th>Charges (Rs.)</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($tests as $index => $test)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $test->test_name ?? '' }}</td>
                            <td> {{ $test->general_charges ?? '0' }}</td>
                            {{-- <td> {{ \Carbon\Carbon::parse($patientSlip->slip_date)->format('d-m-Y') }} &nbsp;{{ $test->general_charges ?? '0' }}</td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                <p><strong>Total Amount:</strong> Rs. {{ $patientSlip->total_amount }}</p>
                <p><strong>Discount:</strong> Rs. {{ $patientSlip->discount }}</p>
                <p><strong>Net Amount:</strong> Rs. {{ $patientSlip->total_amount - $patientSlip->discount }}</p>
                <p><strong>Cash Received:</strong> Rs. {{ $patientSlip->cash_received }}</p>
                </div>
                <br>
                <hr>
                <!-- Hospital Address at the Bottom -->
                <div class="text-center mt-2" style="font-size: 10px;">
                    <strong>INSAAF MEDICAL COMPLEX- PB-26, Sector-3A, Quetta Town Highway, Karachi.
                        <br>
                        Contact# 0301-5088758</strong> 
                </div>
                <p class="text-center mt-3" style="font-size: 10px;">
                    <b>Printed By: Admin | Printed On: {{ now() }}</b>
                    <br>
                    <b>Design & Developed By: Hazrat Ali-0341-8538358</b>
                </p>
                <div class="text-center mt-3">
                    <button class="btn btn-primary btn-sm" onclick="window.print()">Print</button>
                    <a href="{{ route('patientslips.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
