@extends('admin.master')

@section('title', 'Create Ward')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="text-center font-weight-light my-4">Create Ward</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('wards.store') }}" method="POST">
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
                            <label for="ward_name" class="form-label">Ward Name</label>
                            <select name="ward_name" id="ward_name" class="form-select" required>
                                <option value="" disabled selected>Select Ward Name</option>
                                @foreach ($wardNames as $wardName)
                                <option value="{{ $wardName }}">{{ $wardName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="bed_no" class="form-label">Bed No</label>
                            <input type="number" name="bed_no" id="bed_no" class="form-control" placeholder="Enter Bed Number">
                        </div>

                        <div class="mb-3">
                            <label for="charges" class="form-label">Charges</label>
                            <input type="number" name="charges" id="charges" class="form-control" placeholder="Enter Charges" step="0.01">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter a brief description"></textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-success text-center">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
