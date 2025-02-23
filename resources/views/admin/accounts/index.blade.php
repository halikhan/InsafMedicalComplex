@extends('admin.master')

@section('title', 'Account List')

@section('content')
<div class="container">
    <div class="row justify-content-end mb-3">
        <div class="col-md-2 text-end">
            <a href="{{ route('accounts.create') }}" class="btn btn-success">Add Account</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white">
                    <h3 class="text-center font-weight-light my-4">Account List</h3>
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
                            @forelse($accounts as $account)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $account->account_number }}</td>
                                <td>{{ $account->account_type }}</td>
                                <td>{{ $account->account_name }}</td>
                                <td>{{ $account->opening_date }}</td>
                                <td>
                                    <a href="{{ route('accounts.edit', $account->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('accounts.destroy', $account->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this account?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No accounts found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script>
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
</script>
@endsection

@section('styles')
<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
