@extends('admin.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4" style="font-size: 35px; font-weight: 600;">
            Welcome to <span style="color: #009cd9">Insaaf</span> <span style="color: red">Medical Complex</span> Dashboard
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <div class="row">
            <!-- Doctors Chart -->
            <div class="col-xl-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-user-md me-1"></i>
                        Doctors Overview
                    </div>
                    <div class="card-body"><canvas id="doctorsChart" width="100%" height="40"></canvas></div>
                </div>
            </div>

            <!-- Pharmacy Chart -->
            <div class="col-xl-8">
                <div class="card mb-8">
                    <div class="card-header">
                        <i class="fas fa-pills me-1"></i>
                        Pharmacy Sales
                    </div>
                    <div class="card-body"><canvas id="pharmacyChart" width="100%" height="40"></canvas></div>
                </div>
            </div>

            <!-- Laboratory Tests Chart -->
            {{-- <div class="col-xl-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-vial me-1"></i>
                        Laboratory Tests
                    </div>
                    <div class="card-body"><canvas id="labTestsChart" width="100%" height="40"></canvas></div>
                </div>
            </div> --}}
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Top Doctors
                {{-- <div class="d-flex justify-content-end" style="margin-top: -20px;">
                    <a href="{{ route('doctor.index') }}" class="btn btn-primary">Manage Doctor</a>
                </div> --}}
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Doctor Name</th>
                            <th>Phone</th>
                            <th>Speciality</th>
                            <th>Degrees</th>
                            <th>Service Charges</th>
                            <th>Routine (%)</th>
                            <th>Special (%)</th>
                            <th>X-Ray (%)</th>
                            <th>Ultrasound (%)</th>
                            <th>Image</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($doctors as $key=> $doctor)
                            <tr>
                                <td>{{$key +1 }}</td>
                                <td>{{$doctor->name}}</td>
                                <td>{{$doctor->contact}}</td>
                                <td>{{$doctor->specialist_type}}</td>
                                <td>{{$doctor->degrees}}</td>
                                <td>{{$doctor->services_chr}}/=</td>
                                <td>{{$doctor->routine_percentage ?? 0}}%</td>
                                <td>{{$doctor->special_percentage ?? 0}}%</td>
                                <td>{{$doctor->xray_percentage ?? 0}}%</td>
                                <td>{{$doctor->ultrasound_percentage ?? 0}}%</td>
                                <td>
                                    {{-- @dd($doctor->image) --}}
                                    <img src="{{asset($doctor->image ?? 'admin-assets/assets/img/noimage.png')}}" alt="" class="img-fluid" width="50px" height="50px">
                                </td>
                                {{-- <td class="d-flex">
                                    <div class="btn-group">
                                        <a href="{{ route('doctor.edit', $doctor->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('doctor.destroy', $doctor->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn" value="Delete" style="background-color: deeppink;color: white;margin-left: 5px;">
                                        </form>
                                    </div>
                                </td> --}}
    
                            </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Doctors Chart
        const doctorsChartCtx = document.getElementById('doctorsChart').getContext('2d');
        new Chart(doctorsChartCtx, {
            type: 'pie',
            data: {
                labels: ['Cardiologists', 'Neurologists', 'Dermatologists'],
                datasets: [{
                    label: 'Doctors',
                    data: [12, 8, 15],
                    backgroundColor: ['#007bff', '#ffc107', '#28a745']
                }]
            }
        });

        // Pharmacy Chart
        const pharmacyChartCtx = document.getElementById('pharmacyChart').getContext('2d');
        new Chart(pharmacyChartCtx, {
            type: 'bar',
            data: {
                labels: ['Painkillers', 'Antibiotics', 'Vitamins'],
                datasets: [{
                    label: 'Sales in $',
                    data: [2000, 3500, 1500],
                    backgroundColor: ['#007bff', '#ffc107', '#28a745']
                }]
            }
        });

        // Laboratory Tests Chart
        const labTestsChartCtx = document.getElementById('labTestsChart').getContext('2d');
        new Chart(labTestsChartCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [{
                    label: 'Tests Performed',
                    data: [150, 200, 250, 300, 400],
                    borderColor: '#007bff',
                    fill: false
                }]
            }
        });
    </script>
@endsection
