@extends('admin.master')

@section('title', 'Edit Account')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="text-center font-weight-light my-4">Edit Account</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('accounts.update', $account->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="account_number">Account Number</label>
                            <input type="text" name="account_number" id="account_number" class="form-control" value="{{ $account->account_number }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="account_type">Account Type</label>
                            <select name="account_type" id="account_type" class="form-control">
                                <option value="ASSETS" {{ $account->account_type == 'ASSETS' ? 'selected' : '' }}>ASSETS</option>
                                <option value="LIABILITIES" {{ $account->account_type == 'LIABILITIES' ? 'selected' : '' }}>LIABILITIES</option>
                                <option value="EQUITY" {{ $account->account_type == 'EQUITY' ? 'selected' : '' }}>EQUITY</option>
                                <option value="INCOME" {{ $account->account_type == 'INCOME' ? 'selected' : '' }}>INCOME</option>
                                <option value="EXPENSES" {{ $account->account_type == 'EXPENSES' ? 'selected' : '' }}>EXPENSES</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="account_name">Account Name</label>
                            <input type="text" name="account_name" id="account_name" class="form-control" value="{{ $account->account_name }}">
                        </div>
                        <div class="form-group">
                            <label for="opening_date">Opening Date</label>
                            <input type="date" name="opening_date" id="opening_date" class="form-control" value="{{ $account->opening_date }}">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('accounts.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
