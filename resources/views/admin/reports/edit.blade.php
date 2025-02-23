@extends('admin.master')

@section('title', 'Edit Report')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header bg-warning text-white">
                    <h3 class="text-center font-weight-light my-4">Edit Report</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('reports.update', $report->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="department" class="form-label">Department</label>
                            <select name="department" id="department" class="form-select" required>
                                @foreach ($departments as $department)
                                <option value="{{ $department }}" {{ $report->department == $department ? 'selected' : '' }}>
                                    {{ $department }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="format_name" class="form-label">Format Name</label>
                            <input type="text" name="format_name" id="format_name" class="form-control" value="{{ $report->format_name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4">{{ $report->description }}</textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-warning">Update Report</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
