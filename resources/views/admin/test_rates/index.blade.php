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
            <h3 class="text-center">Test Rate List</h3>
            <div class="d-flex justify-content-end" style="margin-top: -20px;">
                <a href="{{ route('test_rates.create') }}" class="btn btn-primary mb-3">Add New Test Rate</a>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Service Name</th>
                        <th>Department</th>
                        <th>Test Name</th>
                        <th>General Charges</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testRates as $testRate)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $testRate->service_name }}</td>
                        <td>{{ $testRate->department_name }}</td>
                        <td>{{ $testRate->test_name }}</td>
                        <td>{{ $testRate->general_charges }}</td>
                        <td>{{ $testRate->status }}</td>
                        <td class="d-flex">
                            <div class="btn-group">
                                <a href="{{ route('test_rates.edit', $testRate->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('test_rates.destroy', $testRate->id) }}" method="POST" class="d-inline delete-form" data-id="{{ $testRate->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button  class="btn btn-danger btn-sm delete-button" data-id="{{ $testRate->id }}">Delete</button>
                                </form>
                            </div>
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
