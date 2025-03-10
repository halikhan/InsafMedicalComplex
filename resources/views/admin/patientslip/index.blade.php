@extends('admin.master')

@section('title', 'Manage Patient Slips')

@section('content')
<div class="container-fluid px-4">
    <br><br>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="text-center m-0">Patient Slips List</h3>
            <a href="{{ route('patientslips.create') }}" class="btn btn-primary">Add Slip</a>
        </div>
        <div class="card-body">
            <table id="patientsTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Patient ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        {{-- <th>Contact No</th>
                        <th>Procedure</th>
                        <th>Total Amount</th> 
                        <th>Discount</th> --}}
                        <th>Cash Received</th>
                        {{-- <th>Dues</th> --}}
                        <th>Actions</th>
                        <th>PDF</th>
                    </tr>
                </thead>
                 
                <tbody>
                    @foreach($patientSlips as $patient)
                    <tr>
                        <td>{{ $patient->patient_id }}</td>
                        <td>{{ $patient->patient_name }}</td>
                        <td>{{ $patient->age }}</td>
                        <td>{{ $patient->gender }}</td>
                        {{-- <td>{{ $patient->contact_no }}</td> --}}
                        {{-- <td>{{ $patient->procedure_name }}</td> --}}
                        {{-- <td>{{ number_format($patient->total_amount, 2) }}</td> --}}
                        {{-- <td>{{ number_format($patient->discount, 2) }}</td> --}}
                        <td>{{ number_format($patient->cash_received, 2) }}</td>
                        {{-- <td>{{ number_format($patient->dues, 2) }}</td> --}}
                        <td class="text-center">
                            <a href="{{ route('patientslips.edit', $patient->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{ route('patientslips.print', $patient->id) }}" class="btn btn-sm btn-info" target="_blank">Print</a>
                            <form action="{{ route('patientslips.destroy', $patient->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form> 
                        </td>
                        <td>
                        <a href="{{ route('patientslips.pdf', $patient->id) }}" class="btn btn-sm btn-success">Download PDF</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('#patientsTable').DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
@endsection
@endsection
