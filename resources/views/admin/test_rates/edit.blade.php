@extends('admin.master')
@section('title')
    Edit Test Rate
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Edit Test Rate</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('test_rates.update', $testRate->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <!-- Service Name -->
             <!-- Service Name -->
             <div class="row mb-3">
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <select class="form-control" name="service_name">
                            @foreach ($services as $value)
                            {{-- <option value="{{$value->specialist_type}}" {{ old('specialist_type') == $value->specialist_type ? 'selected' : '' }}>{{$value->specialist_type}}</option> --}}
                            <option value="{{$value->specialist_type}}" {{ $testRate->service_name == $value->specialist_type ? 'selected' : '' }}>{{$value->specialist_type}}</option>

                            @endforeach
                            {{-- <option value="PRIVATE" {{ old('specialist_type') == 'PRIVATE' ? 'selected' : '' }}>PRIVATE</option> --}}
                            {{-- <option value="SPECIALIST" {{ old('specialist_type') == 'SPECIALIST' ? 'selected' : '' }}>SPECIALIST</option> --}}
                        </select>
                        <label for="specialist_type">Specialist Type</label>
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
                                <option value="" disabled>Select Department</option>
                                <option value="1st Morning Stool Sample" {{ $testRate->department_name == '1st Morning Stool Sample' ? 'selected' : '' }}>1st Morning Stool Sample</option>
                                <option value="Whole Blood in EDTA" {{ $testRate->department_name == 'Whole Blood in EDTA' ? 'selected' : '' }}>Whole Blood in EDTA</option>
                                <option value="Blood in Citrate Tube" {{ $testRate->department_name == 'Blood in Citrate Tube' ? 'selected' : '' }}>Blood in Citrate Tube</option>
                                <option value="CSF Fluid in Sterile Container" {{ $testRate->department_name == 'CSF Fluid in Sterile Container' ? 'selected' : '' }}>CSF Fluid in Sterile Container</option>
                                <option value="Whole Blood in Fluoride Tube" {{ $testRate->department_name == 'Whole Blood in Fluoride Tube' ? 'selected' : '' }}>Whole Blood in Fluoride Tube</option>
                                <option value="Haparinized Sample" {{ $testRate->department_name == 'Haparinized Sample' ? 'selected' : '' }}>Haparinized Sample</option>
                                <option value="Urine (24 hours)" {{ $testRate->department_name == 'Urine (24 hours)' ? 'selected' : '' }}>Urine (24 hours)</option>
                                <option value="Urine with Thymol Crystal Preservative" {{ $testRate->department_name == 'Urine with Thymol Crystal Preservative' ? 'selected' : '' }}>Urine with Thymol Crystal Preservative</option>
                                <option value="Stool Sample (Sterile)" {{ $testRate->department_name == 'Stool Sample (Sterile)' ? 'selected' : '' }}>Stool Sample (Sterile)</option>
                                <option value="Random Urine" {{ $testRate->department_name == 'Random Urine' ? 'selected' : '' }}>Random Urine</option>
                                <option value="Blood in Potassium EDTA" {{ $testRate->department_name == 'Blood in Potassium EDTA' ? 'selected' : '' }}>Blood in Potassium EDTA</option>
                                <option value="Body Fluid (CSF)" {{ $testRate->department_name == 'Body Fluid (CSF)' ? 'selected' : '' }}>Body Fluid (CSF)</option>
                                <option value="Serum or Clotted Blood" {{ $testRate->department_name == 'Serum or Clotted Blood' ? 'selected' : '' }}>Serum or Clotted Blood</option>
                                <option value="Blood in Lithium Heparin" {{ $testRate->department_name == 'Blood in Lithium Heparin' ? 'selected' : '' }}>Blood in Lithium Heparin</option>
                                <option value="Arterial Blood (Ice Transport)" {{ $testRate->department_name == 'Arterial Blood (Ice Transport)' ? 'selected' : '' }}>Arterial Blood (Ice Transport)</option>
                                <option value="Ascitic Fluid" {{ $testRate->department_name == 'Ascitic Fluid' ? 'selected' : '' }}>Ascitic Fluid</option>
                                <option value="Blood Bag" {{ $testRate->department_name == 'Blood Bag' ? 'selected' : '' }}>Blood Bag</option>
                                <option value="Bronchial Washing" {{ $testRate->department_name == 'Bronchial Washing' ? 'selected' : '' }}>Bronchial Washing</option>
                                <option value="Citrate Tube" {{ $testRate->department_name == 'Citrate Tube' ? 'selected' : '' }}>Citrate Tube</option>
                                <option value="Clotting Factors" {{ $testRate->department_name == 'Clotting Factors' ? 'selected' : '' }}>Clotting Factors</option>
                                <option value="Enzyme" {{ $testRate->department_name == 'Enzyme' ? 'selected' : '' }}>Enzyme</option>
                                <option value="Fats Globules (Stool)" {{ $testRate->department_name == 'Fats Globules (Stool)' ? 'selected' : '' }}>Fats Globules (Stool)</option>
                                <option value="Fertility Hormones" {{ $testRate->department_name == 'Fertility Hormones' ? 'selected' : '' }}>Fertility Hormones</option>
                                <option value="Fresh Sample in Sterile Container" {{ $testRate->department_name == 'Fresh Sample in Sterile Container' ? 'selected' : '' }}>Fresh Sample in Sterile Container</option>
                                <option value="Freshly Voided Urine (10-20 CC)" {{ $testRate->department_name == 'Freshly Voided Urine (10-20 CC)' ? 'selected' : '' }}>Freshly Voided Urine (10-20 CC)</option>
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
                                    <input type="text" name="panel_outside" 
                                           class="form-control @error('panel_outside') is-invalid @enderror"
                                           placeholder="Panel/Outside" value="{{ old('panel_outside', $testRate->panel_outside) }}">
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
                                           placeholder="Test Name" value="{{ old('test_name', $testRate->test_name) }}">
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
                                           placeholder="General Charges" value="{{ old('general_charges', $testRate->general_charges) }}">
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
                                           placeholder="S Private" value="{{ old('s_private', $testRate->s_private) }}">
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
                                           placeholder="Private" value="{{ old('private', $testRate->private) }}">
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
                                        <option value="Normal" {{ old('category', $testRate->category) == 'Normal' ? 'selected' : '' }}>Normal</option>
                                        <option value="Urgent" {{ old('category', $testRate->category) == 'Urgent' ? 'selected' : '' }}>Urgent</option>
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
                                           placeholder="Report Days" value="{{ old('report_days', $testRate->report_days) }}">
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
                                    <input type="checkbox" name="is_profile_test" class="form-check-input" id="is_profile_test" value="1" {{ old('is_profile_test', $testRate->is_profile_test) ? 'checked' : '' }}>
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
                                        <option value="ACTIVE" {{ old('status', $testRate->status) == 'ACTIVE' ? 'selected' : '' }}>Active</option>
                                        <option value="INACTIVE" {{ old('status', $testRate->status) == 'INACTIVE' ? 'selected' : '' }}>Inactive</option>
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
                            <input type="submit" class="btn btn-outline-success text-center" value="Update Test Rate">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
