@extends('admin.master')

@section('title', 'Create Report')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="text-center font-weight-light my-4">Create Report</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('reports.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="department" class="form-label">Department</label>
                            <select name="department" id="department" class="form-select" required>
                                <option value="" disabled selected>Select Department</option>
                                @foreach ($departments as $department)
                                <option value="{{ $department }}">{{ $department }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="format_name" class="form-label">Format Name</label>
                            <input type="text" name="format_name" id="format_name" class="form-control" placeholder="Enter Format Name" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter Description"></textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-primary text-center">Create Report</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
