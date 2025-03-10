@extends('admin.master')

@section('title', 'Create Patient')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="text-center font-weight-light my-4">Create Patient</h3>
                </div>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <div class="card-body">
                    <form action="{{ route('patients.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Patient Name">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact</label>
                            <input type="text" name="contact" id="contact" class="form-control" placeholder="Enter Contact Number">
                        </div>
                        <div class="form-group">
                            <label for="cnic">CNIC</label>
                            <input type="text" name="cnic" id="cnic" class="form-control" placeholder="Enter CNIC">
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" name="age" id="age" class="form-control" placeholder="Enter Age">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="admit_date">Admit Date</label>
                            <input type="date" name="admit_date" id="admit_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="shift">Shift</label>
                            <input type="text" name="shift" id="shift" class="form-control" placeholder="Enter Shift">
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" name="time" id="time" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="file_no">File No</label>
                            <input type="text" name="file_no" id="file_no" class="form-control" placeholder="Enter File No">
                        </div>
                        <div class="form-group">
                            <label for="room_no">Room No</label>
                            <input type="text" name="room_no" id="room_no" class="form-control" placeholder="Enter Room No">
                        </div>
                        <div class="form-group">
                            <label for="attendant_name">Attendant Name</label>
                            <input type="text" name="attendant_name" id="attendant_name" class="form-control" placeholder="Enter Attendant Name">
                        </div>
                        <div class="form-group">
                            <label for="attendant_contact">Attendant Contact</label>
                            <input type="text" name="attendant_contact" id="attendant_contact" class="form-control" placeholder="Enter Attendant Contact">
                        </div>
                        <div class="form-group">
                            <label for="relation_with_patient">Relation with Patient</label>
                            <input type="text" name="relation_with_patient" id="relation_with_patient" class="form-control" placeholder="Enter Relation">
                        </div>
                        <div class="form-group">
                            <label for="advance_received">Advance Received</label>
                            <input type="number" name="advance_received" id="advance_received" class="form-control" placeholder="Enter Advance Received Amount">
                        </div>
                            
                        <div class="form-group">
                            <label for="admission_number">Admission Number</label>
                            <input type="text" name="admission_number" id="admission_number" class="form-control" placeholder="Enter Admission Number">
                        </div>
                        <div class="form-group">
                            <label for="admission_type">Admission Type</label>
                            <input type="text" name="admission_type" id="admission_type" class="form-control" placeholder="Enter Admission Type">
                        </div>
                        <div class="form-group">
                            <label for="lmp_date">LMP Date</label>
                            <input type="date" name="lmp_date" id="lmp_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="expected_due_date">Expected Due Date</label>
                            <input type="date" name="expected_due_date" id="expected_due_date" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Create</button>
                            <a href="{{ route('patients.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
