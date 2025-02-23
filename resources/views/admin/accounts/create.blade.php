@extends('admin.master')

@section('title', 'Create Account')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('accounts.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="account_number">Account Number</label>
                            <input type="text" name="account_number" id="account_number" class="form-control" placeholder="Enter Account Number">
                        </div>
                        <div class="form-group">
                            <label for="account_type">Account Type</label>
                            <select name="account_type" id="account_type" class="form-control">
                                <option value="ASSETS">ASSETS</option>
                                <option value="LIABILITIES">LIABILITIES</option>
                                <option value="EQUITY">EQUITY</option>
                                <option value="INCOME">INCOME</option>
                                <option value="EXPENSES">EXPENSES</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="account_name">Account Name</label>
                            <input type="text" name="account_name" id="account_name" class="form-control" placeholder="Enter Account Name">
                        </div>
                        <div class="form-group">
                            <label for="opening_date">Opening Date</label>
                            <input type="date" name="opening_date" id="opening_date" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Create</button>
                            <a href="{{ route('accounts.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
