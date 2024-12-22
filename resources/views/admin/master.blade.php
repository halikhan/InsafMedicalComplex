<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
<<<<<<< HEAD
    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Custom CSS -->
    <link href="{{ asset('admin-assets/css/styles.css') }}" rel="stylesheet" />

    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">

<!-- Navbar -->
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    @include('admin.include.header')
</nav>

<div id="layoutSidenav">
    <!-- Sidebar -->
    @include('admin.include.left-sidebar')

=======
    <title>@yield('title')</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    
    <link href="{{asset('admin-assets')}}/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    @include('admin.include.header')
    <!-- Navbar-->
</nav>
<div id="layoutSidenav">
    @include('admin.include.left-sidebar')
>>>>>>> 4d0cdcbbad56ca35cf2064831b8fbef357107b1f
    <div id="layoutSidenav_content">
        <main>
            @yield('content')
        </main>
<<<<<<< HEAD

        <!-- Footer -->
        <footer class="py-4 bg-light mt-auto">
            @include('admin.include.footer')
=======
        <footer class="py-4 bg-light mt-auto">
           @include('admin.include.footer')
>>>>>>> 4d0cdcbbad56ca35cf2064831b8fbef357107b1f
        </footer>
    </div>
</div>

<<<<<<< HEAD
<!-- Scripts -->

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Custom Scripts -->
<script src="{{ asset('admin-assets/js/scripts.js') }}"></script>

<!-- DataTables -->
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('admin-assets/js/datatables-simple-demo.js') }}"></script>

<!-- Toastr Notifications -->
<script>
    // Initialize Toastr options
    if (typeof toastr !== "undefined") {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    }

    // Show success or error Toastr notifications
    @if(session('success'))
        toastr.success('{{ session('success') }}');
    @endif

    @if(session('error'))
        toastr.error('{{ session('error') }}');
    @endif
</script>

</body>
</html>
=======
<script src="{{asset('admin-assets')}}/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{asset('admin-assets')}}/assets/demo/chart-area-demo.js"></script>
<script src="{{asset('admin-assets')}}/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="{{asset('admin-assets')}}/js/datatables-simple-demo.js"></script>

</body>
</html>
>>>>>>> 4d0cdcbbad56ca35cf2064831b8fbef357107b1f
