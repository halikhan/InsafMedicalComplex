@extends('admin.master')

@section('title', 'Patient Details')

@section('content')
<style>
    .patient-details {
        font-family: Arial, sans-serif;
        width: 100%;
        border: 2px solid #000;
        padding: 20px;
        margin: 0 auto;
        background: #fff;
    }
    .header {
        text-align: center;
        font-weight: bold;
        font-size: 18px;
        margin-bottom: 20px;
        text-transform: uppercase;
    }
    .section-title {
        font-weight: bold;
        background: #ddd;
        padding: 5px;
        margin-top: 10px;
    }
    .info-table {
        width: 100%;
        border-collapse: collapse;
    }
    .info-table td {
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }
    .info-table td:first-child {
        font-weight: bold;
    }
    .btn-print {
        margin-top: 20px;
        display: block;
        text-align: center;
    }
</style>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-lg mt-3">
<div class="patient-details">
    <div class="header">
        <div class="text-center">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('assets/img/logo-rem.png') }}" alt="Hospital Logo" style="width: 80px; height: 80px;">
            </div>
            <h2 class="mt-2"><b>INSAAF MEDICAL COMPLEX</b></h2>
            <p>LAB - X-RAYS - U/S - OPD - GYNAE - ER</p>
            <p>PHARMACY - ICU - NICU - PICU</p>
            <p><strong>HELPLINE:</strong> 0331-1100870</p>
            <h5 class="mt-2 bg-dark text-white p-2"><strong>PICU (Pediatric Intensive Care Unit) - Patient Registration</strong></h5>
        </div>
    </div>

    <table class="info-table">
        <tr>
            <td>ADMIT / MRN #:</td>
            <td>{{ $patient->id }}</td>
            <td>Admission Date:</td>
            <td>{{ $patient->admit_date }}</td>
        </tr>
        <tr>
            <td>Time:</td>
            <td>{{ \Carbon\Carbon::parse($patient->time)->format('h:i A')}}</td>
            <td>Shift:</td>
            <td>{{ $patient->shift }}</td>
        </tr>
    </table>

    <div class="section-title">Patient Information</div>
    <table class="info-table">
        <tr>
            <td>Patient Name:</td>
            <td>{{ $patient->name }}</td>
            <td>Age:</td>
            <td>{{ $patient->age }} {{ $patient->gender }}</td>
        </tr>
        <tr>
            <td>Contact:</td>
            <td>{{ $patient->contact }}</td>
            <td>File No:</td>
            <td>{{ $patient->file_no }}</td>
        </tr>
        <tr>
            <td>CNIC:</td>
            <td>{{ $patient->cnic }}</td>
            <td>Patient Status:</td>
            <td>{{ $patient->status ?? 'Admit'}}</td>
        </tr>
        <tr>
            <td>Ward / Bed:</td>
            <td>{{ $patient->room_no }}</td>
            <td>Panel Name:</td>
            <td>{{ $patient->panel_outside }}</td>
        </tr>
        <tr>
            <td>Location:</td>
            <td>{{ $patient->location ??''}}</td>
            <td>Address:</td>
            <td>{{ $patient->address }}</td>
        </tr>
    </table>

    <div class="section-title">Doctor Information</div>
    <table class="info-table">
        <tr>
            <td>Referred By:</td>
            <td>{{ $patient->referred_by }}</td>
            <td>Attended By:</td>
            <td>{{ $patient->attendant_name }}</td>
        </tr>
    </table>

    <div class="section-title">Doctor Notes</div>
    <p>{{ $patient->doctor_notes }}</p>

    <div class="section-title">Patient Attendant Information</div>
    <table class="info-table">
        <tr>
            <td>Attendant Name:</td>
            <td>{{ $patient->attendant_name }}</td>
            <td>Relation:</td>
            <td>{{ $patient->relation_with_patient }}</td>
        </tr>
        <tr>
            <td>Attendant Contact:</td>
            <td>{{ $patient->attendant_contact }}</td>
            <td>Advance From Patient:</td>
            <td>{{ $patient->advance_received }}</td>
        </tr>
    </table>

    <div class="btn-print">
        <button onclick="window.print()" class="btn btn-primary">Print</button>
        <a href="{{ route('patients.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
            </div></div></div>
@endsection
