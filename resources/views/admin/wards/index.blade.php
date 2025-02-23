@extends('admin.master')

@section('title', 'Test Rate List')

@section('content')
<div class="container-fluid px-4">
    <br><br>

    <div class="card mb-4">
        <div class="card-header">
            @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

            <i class="fas fa-table me-1"></i>
            <h1>Ward/Room/Bed Registrations</h1>
            <div class="d-flex justify-content-end" style="margin-top: -20px;">
            <a href="{{ route('wards.create') }}" class="btn btn-primary mb-3">Create New Ward</a>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Department</th>
                        <th>Ward Name</th>
                        <th>Bed No</th>
                        <th>Charges</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wards as $ward)
                    <tr>
                        <td>{{ $ward->id }}</td>
                        <td>{{ $ward->department }}</td>
                        <td>{{ $ward->ward_name }}</td>
                        <td>{{ $ward->bed_no }}</td>
                        <td>{{ $ward->charges }}</td>
                        <td>{{ $ward->description }}</td>
                        <td>
                            <a href="{{ route('wards.edit', $ward->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('wards.destroy', $ward->id) }}" method="POST" class="d-inline delete-form" data-id="{{ $ward->id }}">
                                @csrf
                                @method('DELETE')
                                <button  class="btn btn-danger btn-sm delete-button" data-id="{{ $ward->id }}">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>

document.querySelectorAll('.delete-button').forEach(button => {
    button.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent default behavior

        const button = this; // Reference to the clicked button
        const form = button.closest('.delete-form'); // Find the closest form element

        // Show confirmation toast
        showDeleteConfirmation(function (isConfirmed) {
            if (isConfirmed) {
                form.submit(); // Submit the form if confirmed
            }
        });
    });
});
function showDeleteConfirmation(callback) {
    toastr.warning(
        `
        <br>
        <button type="button" class="btn btn-danger btn-sm" id="confirmDelete">Yes, delete it!</button>
        <button type="button" class="btn btn-secondary btn-sm" id="cancelDelete">Cancel</button>
        `,
        "Are you sure?",
        {
            closeButton: true,
            allowHtml: true,
            timeOut: 0,
            extendedTimeOut: 0,
            tapToDismiss: false,
            onShown: function (toast) {
                // If confirmed, call the callback function
                document.getElementById('confirmDelete').addEventListener('click', function () {
                    callback(true); // Confirm delete
                    toastr.clear(toast); // Clear notification
                });

                // If cancelled, call the callback function
                document.getElementById('cancelDelete').addEventListener('click', function () {
                    callback(false); // Cancel delete
                    toastr.clear(toast); // Clear notification
                });
            },
        }
    );
}


</script>

@endsection
