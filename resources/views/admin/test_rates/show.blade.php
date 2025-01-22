@extends('admin.master')

@section('title', 'View Test Rate')

@section('content')
<div class="container">
    <h2 class="mt-4">Test Rate Details</h2>
    <div class="card">
        <div class="card-body">
            <h4>Service Name: {{ $testRate->service_name }}</h4>
            <p>Department: {{ $testRate->department_name }}</p>
            <p>Test Name: {{ $testRate->test_name }}</p>
            <p>General Charges: {{ $testRate->general_charges }}</p>
            <p>Status: {{ $testRate->status }}</p>
        </div>
    </div>
</div>
@endsection
