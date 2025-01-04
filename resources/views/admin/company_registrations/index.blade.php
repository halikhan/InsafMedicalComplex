@extends('admin.master')

@section('title', 'Manage Company Registrations')

@section('content')
<div class="container-fluid px-4">
    <br>
    <br>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            <h3 class="text-center">Panel/ Outside / Company Registrations</h3>
            <div class="d-flex justify-content-end">
                <a href="{{ route('company_registrations.create') }}" class="btn btn-primary">Add</a>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Panel Name</th>
                        <th>Contact No</th>
                        <th>Rate List Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $company->panel_name }}</td>
                        <td>{{ $company->contact_no }}</td>
                        <td>{{ $company->rate_list_status }}</td>
                        <td>
                            <a href="{{ route('company_registrations.edit', $company->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('company_registrations.destroy', $company->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" style="background-color: rgb(249, 2, 2);color: white;margin-left: 5px;">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
