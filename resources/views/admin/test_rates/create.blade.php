@extends('admin.master')
@section('title')
    Add New Test Rate
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Add New Test Rate</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('test_rates.store') }}" method="post">
                        @csrf

                        <!-- Service Name -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="text" name="service_name" 
                                           class="form-control @error('service_name') is-invalid @enderror"
                                           placeholder="Service Name" value="{{ old('service_name') }}">
                                    <label for="service_name">Service Name</label>
                                    @error('service_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Department Name -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="text" name="department_name" 
                                           class="form-control @error('department_name') is-invalid @enderror"
                                           placeholder="Department Name" value="{{ old('department_name') }}">
                                    <label for="department_name">Department Name</label>
                                    @error('department_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Panel/Outside -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="text" name="panel_outside" 
                                           class="form-control @error('panel_outside') is-invalid @enderror"
                                           placeholder="Panel/Outside" value="{{ old('panel_outside') }}">
                                    <label for="panel_outside">Panel/Outside</label>
                                    @error('panel_outside')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Test Name -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="text" name="test_name" 
                                           class="form-control @error('test_name') is-invalid @enderror"
                                           placeholder="Test Name" value="{{ old('test_name') }}">
                                    <label for="test_name">Test Name</label>
                                    @error('test_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- General Charges -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="number" step="0.01" name="general_charges" 
                                           class="form-control @error('general_charges') is-invalid @enderror"
                                           placeholder="General Charges" value="{{ old('general_charges') }}">
                                    <label for="general_charges">General Charges</label>
                                    @error('general_charges')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- S Private -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="number" step="0.01" name="s_private" 
                                           class="form-control @error('s_private') is-invalid @enderror"
                                           placeholder="S Private" value="{{ old('s_private') }}">
                                    <label for="s_private">S Private</label>
                                    @error('s_private')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Private -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="number" step="0.01" name="private" 
                                           class="form-control @error('private') is-invalid @enderror"
                                           placeholder="Private" value="{{ old('private') }}">
                                    <label for="private">Private</label>
                                    @error('private')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Category -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="text" name="category" 
                                           class="form-control @error('category') is-invalid @enderror"
                                           placeholder="Category" value="{{ old('category') }}">
                                    <label for="category">Category</label>
                                    @error('category')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Report Days -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="number" name="report_days" 
                                           class="form-control @error('report_days') is-invalid @enderror"
                                           placeholder="Report Days" value="{{ old('report_days') }}">
                                    <label for="report_days">Report Days</label>
                                    @error('report_days')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Is Profile Test -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input type="checkbox" name="is_profile_test" class="form-check-input" id="is_profile_test" value="1" {{ old('is_profile_test') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_profile_test">Is Profile Test</label>
                                </div>
                                @error('is_profile_test')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
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
                            <input type="submit" class="btn btn-outline-success text-center" value="Add Test Rate">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
