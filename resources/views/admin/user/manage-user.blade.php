@extends('admin.master')
@section('title')
User's Management
@endsection

@section('content')
    <div class="container-fluid px-4">
        <br>
        <br>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Manage User

                <div class="d-flex justify-content-end" style="margin-top: -25px;"><a href="{{route('users.create')}}" class="btn btn-primary">Add User</a></div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Email </th>
                        <th>Phone</th>
                        <th>Start Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>
                                @if($user->usertype == 0)
                                Regular User
                                    @elseif($user->usertype == 1)
                                    Super Admin
                                @elseif($user->usertype == 2)
                                Doctor
                                    {{-- @elseif($user->usertype == 2)
                                    Food --}}
                                    @elseif($user->usertype == 4)
                                    Receptionist
                                @elseif($user->usertype == 5)
                                    Lab and Medicines
                                @else
                                    None
                                @endif
                            </td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->created_at}}</td>
                            <td class="d-flex">
                                <div class="btn-group">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn" value="Delete" style="background-color: deeppink;color: white;margin-left: 5px;">
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
