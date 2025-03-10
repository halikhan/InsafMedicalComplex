@extends('admin.master')

@section('title', 'Manage Accounts')

@section('content')

<div class="container-fluid px-4">
    <br><br>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            <h3 class="text-center">List of Services</h3>
            <div class="d-flex justify-content-end" style="margin-top: -20px;">
                <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Add Services</a>
            </div>
        </div>
        <div class="card-body">
            <table id="accountsTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Specialist Type</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $service->specialist_type }}</td>
                        <td>{{ $service->status }}</td>
                        <td>
                            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline delete-form" data-id="{{ $service->id }}">
                                @csrf
                                @method('DELETE')
                                <button  class="btn btn-danger btn-sm delete-button" data-id="{{ $service->id }}">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    // Initialize DataTable
    $(document).ready(function() {
        $('#accountsTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });

    // Show confirmation toast using toastr
</script>
@endsection

@section('styles')
<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection

@endsection
