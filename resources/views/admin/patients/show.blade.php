@extends('admin.master')

@section('title', 'Patient Slip')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0 rounded-lg mt-3">
                <div class="card-header bg-primary text-white d-flex justify-content-between">
                    <h3 class="text-center font-weight-light">Patient Slip</h3>
                    <button class="btn btn-light" onclick="window.print()">Print</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Patient ID:</strong> {{ $patient->id }}</p>
                            <p><strong>Slip Date:</strong> {{ $patient->admit_date }}</p>
                            <p><strong>Shift:</strong> {{ $patient->shift }}</p>
                            <p><strong>Time:</strong> {{ $patient->time }}</p>
                            <p><strong>Patient Name:</strong> {{ $patient->name }}</p>
                            <p><strong>Age:</strong> {{ $patient->age }}</p>
                            <p><strong>Gender:</strong> {{ $patient->gender }}</p>
                            <p><strong>CNIC:</strong> {{ $patient->cnic }}</p>
                            <p><strong>Contact:</strong> {{ $patient->contact }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>File No:</strong> {{ $patient->file_no }}</p>
                            <p><strong>Admission Type:</strong> {{ $patient->admission_type }}</p>
                            <p><strong>Room No:</strong> {{ $patient->room_no }}</p>
                            <p><strong>Attendant Name:</strong> {{ $patient->attendant_name }}</p>
                            <p><strong>Attendant Contact:</strong> {{ $patient->attendant_contact }}</p>
                            <p><strong>Relation with Patient:</strong> {{ $patient->relation_with_patient }}</p>
                            <p><strong>Advance Received:</strong> {{ $patient->advance_received }}</p>
                            <p><strong>Admission Number:</strong> {{ $patient->admission_number }}</p>
                            <p><strong>LMP Date:</strong> {{ $patient->lmp_date }}</p>
                            <p><strong>Expected Due Date:</strong> {{ $patient->expected_due_date }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('patients.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
