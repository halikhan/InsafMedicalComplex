@extends('admin.master')

@section('title', 'Add Company')

@section('content')
<div class="container-fluid px-4">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button data-dismiss="alert" type="button" class="close">&times;</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
        <div class="card-header">
            <h3 class="text-center">Add New Panel/ Outside / Company</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('company_registrations.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="panel_name" class="form-label">Panel Name</label>
                    <input type="text" name="panel_name" id="panel_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="panel_address" class="form-label">Panel Address</label>
                    <textarea name="panel_address" id="panel_address" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="contact_no" class="form-label">Contact No</label>
                    <input type="text" name="contact_no" id="contact_no" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="panel_code" class="form-label">Panel Code</label>
                    <input type="text" name="panel_code" id="panel_code" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="reg_date" class="form-label">Registration Date</label>
                    <input type="date" name="reg_date" id="reg_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="rate_list_status" class="form-label">Rate List Status</label>
                    <select name="rate_list_status" id="rate_list_status" class="form-control" required>
                        <option value="Same Rate">Same Rate</option>
                        <option value="Change Rate">Change Rate</option>
                        <option value="Outside RateList">Outside RateList</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-outline-success text-center">Save</button>
                <a href="{{ route('company_registrations.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
            </div>
        </div>
    </div>
</div>
@endsection
