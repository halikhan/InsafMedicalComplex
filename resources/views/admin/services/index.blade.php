@extends('admin.master')

@section('title', 'Manage Accounts')

@section('content')

<div class="container-fluid px-4">
    <br><br>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            <h3 class="text-center">Account List</h3>
            <div class="d-flex justify-content-end" style="margin-top: -20px;">
                <a href="{{ route('accounts.create') }}" class="btn btn-primary mb-3">Add Account</a>
            </div>
        </div>
        <div class="card-body">
            <table id="accountsTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Account Number</th>
                        <th>Account Type</th>
                        <th>Account Name</th>
                        <th>Opening Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($accounts as $account)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $account->account_number }}</td>
                        <td>{{ $account->account_type }}</td>
                        <td>{{ $account->account_name }}</td>
                        <td>{{ $account->opening_date }}</td>
                        <td class="d-flex">
                            <div class="btn-group">
                                <a href="{{ route('accounts.edit', $account->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <button class="btn btn-danger btn-sm" id="delete_button" data-id="{{ $account->id }}">Delete</button>
                            </div>
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
                    // Confirm delete
                    document.getElementById('confirmDelete').addEventListener('click', function () {
                        callback(true);
                        toastr.clear(toast);
                    });

                    // Cancel delete
                    document.getElementById('cancelDelete').addEventListener('click', function () {
                        callback(false);
                        toastr.clear(toast);
                    });
                },
            }
        );
    }

    // Attach delete event handler to delete buttons
    document.querySelectorAll('#delete_button').forEach(button => {
        button.addEventListener('click', function () {
            const accountId = this.dataset.id;

            // Show confirmation toast
            showDeleteConfirmation(function (isConfirmed) {
                if (isConfirmed) {
                    // Redirect to delete route if confirmed
                    window.location.href = `{{ route('accounts.destroy', '') }}/${accountId}`;
                }
            });
        });
    });
</script>
@endsection

@section('styles')
<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection

@endsection
