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
                                    <select class="form-control" name="service_name">
                                        @foreach ($services as $value)
                                        <option value="{{$value->specialist_type}}" {{ old('service_name') == $value->specialist_type ? 'selected' : '' }}>{{$value->specialist_type}}</option>

                                        @endforeach
                                        {{-- <option value="PRIVATE" {{ old('specialist_type') == 'PRIVATE' ? 'selected' : '' }}>PRIVATE</option> --}}
                                        {{-- <option value="SPECIALIST" {{ old('specialist_type') == 'SPECIALIST' ? 'selected' : '' }}>SPECIALIST</option> --}}
                                    </select>
                                    <label for="service_name">Specialist Type</label>
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
                                        <select name="department_name" 
                                                class="form-select @error('department_name') is-invalid @enderror">
                                            {{-- <option value="" readonly>Select Department</option> --}}
                                            <option value="1st Morning Stool Sample">1st Morning Stool Sample</option>
                                            <option value="Whole Blood in EDTA">Whole Blood in EDTA</option>
                                            <option value="Blood in Citrate Tube">Blood in Citrate Tube</option>
                                            <option value="CSF Fluid in Sterile Container">CSF Fluid in Sterile Container</option>
                                            <option value="Whole Blood in Fluoride Tube">Whole Blood in Fluoride Tube</option>
                                            <option value="Haparinized Sample">Haparinized Sample</option>
                                            <option value="Urine (24 hours)">Urine (24 hours)</option>
                                            <option value="Urine with Thymol Crystal Preservative">Urine with Thymol Crystal Preservative</option>
                                            <option value="Stool Sample (Sterile)">Stool Sample (Sterile)</option>
                                            <option value="Random Urine">Random Urine</option>
                                            <option value="Blood in Potassium EDTA">Blood in Potassium EDTA</option>
                                            <option value="Body Fluid (CSF)">Body Fluid (CSF)</option>
                                            <option value="Serum or Clotted Blood">Serum or Clotted Blood</option>
                                            <option value="Blood in Lithium Heparin">Blood in Lithium Heparin</option>
                                            <option value="Arterial Blood (Ice Transport)">Arterial Blood (Ice Transport)</option>
                                            <option value="Ascitic Fluid">Ascitic Fluid</option>
                                            <option value="Blood Bag">Blood Bag</option>
                                            <option value="Bronchial Washing">Bronchial Washing</option>
                                            <option value="Citrate Tube">Citrate Tube</option>
                                            <option value="Clotting Factors">Clotting Factors</option>
                                            <option value="Enzyme">Enzyme</option>
                                            <option value="Fats Globules (Stool)">Fats Globules (Stool)</option>
                                            <option value="Fertility Hormones">Fertility Hormones</option>
                                            <option value="Fresh Sample in Sterile Container">Fresh Sample in Sterile Container</option>
                                            <option value="Freshly Voided Urine (10-20 CC)">Freshly Voided Urine (10-20 CC)</option>
                                        </select>
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
                                    <select class="form-control" name="panel_outside">
                                        @foreach ($companies as $value)
                                        <option value="{{$value->panel_name}}" {{ old('panel_outside') == $value->panel_name ? 'selected' : '' }}>{{$value->panel_name}}</option>
                                        @endforeach
                                   </select>
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
                                    <select name="category" class="form-select @error('category') is-invalid @enderror">
                                        {{-- <option value="">Select category</option> --}}
                                        <option value="Normal" {{ old('category') == 'Normal' ? 'selected' : '' }}>Normal</option>
                                        <option value="Urgent" {{ old('category') == 'Urgent' ? 'selected' : '' }}>Urgent</option>
                                    </select>
                                    <label for="category">category</label>
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
                                        {{-- <option value="">Select Status</option> --}}
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
