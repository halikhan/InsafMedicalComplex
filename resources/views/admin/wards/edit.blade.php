@extends('admin.master')

@section('title', 'Edit Ward')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header bg-warning text-white">
                    <h3 class="text-center font-weight-light my-4">Edit Ward</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('wards.update', $ward->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="department" class="form-label">Department</label>
                            <select name="department" id="department" class="form-select" required>
                                <option value="" disabled>Select Department</option>
                                @foreach ($departments as $department)
                                <option value="{{ $department }}" {{ $ward->department == $department ? 'selected' : '' }}>
                                    {{ $department }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="ward_name" class="form-label">Ward Name</label>
                            <select name="ward_name" id="ward_name" class="form-select" required>
                                <option value="" disabled>Select Ward Name</option>
                                @foreach ($wardNames as $wardName)
                                <option value="{{ $wardName }}" {{ $ward->ward_name == $wardName ? 'selected' : '' }}>
                                    {{ $wardName }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="bed_no" class="form-label">Bed No</label>
                            <input type="number" name="bed_no" id="bed_no" class="form-control" 
                                placeholder="Enter Bed Number" value="{{ $ward->bed_no }}">
                        </div>

                        <div class="mb-3">
                            <label for="charges" class="form-label">Charges</label>
                            <input type="number" name="charges" id="charges" class="form-control" 
                                placeholder="Enter Charges" step="0.01" value="{{ $ward->charges }}">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4"
                                placeholder="Enter a brief description">{{ $ward->description }}</textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-warning">Update Ward</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
