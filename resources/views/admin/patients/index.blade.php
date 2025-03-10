@extends('admin.master')

@section('title', 'Manage Patients')

@section('content')
<div class="container-fluid px-4">
    <br><br>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="text-center m-0">Patient List</h3>
            <a href="{{ route('patients.create') }}" class="btn btn-primary">Add Patient</a>
        </div>
        <div class="card-body">
            <table id="patientsTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>MRN#</th>
                        <th>Name</th>
                        <th>Address</th>
                        {{-- <th>NIC</th> --}}
                        <th>Contact</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Admit Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patients as $key=> $patient)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->address }}</td>
                        {{-- <td>{{ $patient->cnic }}</td> --}}
                        <td>{{ $patient->contact }}</td>
                        <td>{{ $patient->age }}</td>
                        <td>{{ $patient->gender }}</td>
                        <td>{{ $patient->admit_date }}</td>
                        <td class="text-center">
                            <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger delete-button">Delete</button>
                            </form> </td>
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
