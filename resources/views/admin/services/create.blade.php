@extends('admin.master')
@section('title')
    Add New Service
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Add New Service</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('services.store') }}" method="post">
                        @csrf

                        <!-- Specialist Type -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input type="text" name="specialist_type" 
                                           class="form-control @error('specialist_type') is-invalid @enderror"
                                           placeholder="Specialist Type" value="{{ old('specialist_type') }}">
                                    <label for="specialist_type">Specialist Type</label>
                                    @error('specialist_type')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                                        <option value="">Select Status</option>
                                        <option value="ACTIVE" {{ old('status') == 'ACTIVE' ? 'selected' : '' }}>Active</option>
                                        <option value="INACTIVE" {{ old('status') == 'INACTIVE' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    <label for="status">Status</label>
                                    @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-4 mb-0">
                            <input type="submit" class="btn btn-outline-success text-center" value="Add Service">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
