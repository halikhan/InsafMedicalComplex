@extends('admin.master')

@section('title', 'Report Registrations')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                {{-- Toaster Notification --}}
                @if(session()->has('message'))
                <div class="toast show align-items-center text-bg-light border-0 mb-2" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ session()->get('message') }}
                        </div>
                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
                @endif

                {{-- Card Header --}}
                <div class="card-header bg-primary text-white">
                    <h3 class="text-center font-weight-light my-4">Report Registrations</h3>
                </div>
                
                {{-- Search Bar --}}
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <a href="{{ route('reports.create') }}" class="btn btn-primary">Add New Report</a>
                        <input type="text" id="searchInput" class="form-control w-50" placeholder="Search reports...">
                    </div>
                    
                    {{-- Table --}}
                    <table class="table table-bordered" id="reportTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Department</th>
                                <th>Format Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                            <tr>
                                <td>{{ $report->id }}</td>
                                <td>{{ $report->department }}</td>
                                <td>{{ $report->format_name }}</td>
                                <td>{{ $report->description }}</td>
                                <td>
                                    <a href="{{ route('reports.edit', $report->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('reports.destroy', $report->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript for Search Functionality --}}
<script>
    document.getElementById('searchInput').addEventListener('keyup', function () {
        const searchValue = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('#reportTable tbody tr');
        
        tableRows.forEach(row => {
            const rowText = row.textContent.toLowerCase();
            row.style.display = rowText.includes(searchValue) ? '' : 'none';
        });
    });
</script>
@endsection
