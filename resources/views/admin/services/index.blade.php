@extends('admin.master')

@section('title')
    Manage Services
@endsection

@section('content')

<div class="container-fluid px-4">
    <br><br>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            <h3 class="text-center">List of Services</h3>
            <div class="d-flex justify-content-end" style="margin-top: -20px;">
                <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Add Service</a>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
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
                        <td class="d-flex">
                            <div class="btn-group">
                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <button class="btn btn-danger btn-sm" id="delete_button" data-id="{{ $service->id }}">Delete</button>
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
    // Show confirmation toast using toastr
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
                    // If confirmed, call callback function
                    document.getElementById('confirmDelete').addEventListener('click', function () {
                        callback(true); // Confirm delete
                        toastr.clear(toast); // Clear notification
                    });

                    // If cancelled, call callback function
                    document.getElementById('cancelDelete').addEventListener('click', function () {
                        callback(false); // Cancel delete
                        toastr.clear(toast); // Clear notification
                    });
                },
            }
        );
    }

    // Attach delete event handler to all delete buttons
    document.querySelectorAll('#delete_button').forEach(button => {
        button.addEventListener('click', function () {
            const serviceId = this.dataset.id;

            // Show the confirmation toast
            showDeleteConfirmation(function (isConfirmed) {
                if (isConfirmed) {
                    // If confirmed, redirect to the destroy route
                    window.location.href = `{{ route('services.destroy', '') }}/${serviceId}`;
                }
            });
        });
    });
</script>

@endsection
