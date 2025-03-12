<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
        <!-- DataTables CSS -->
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    
        <!-- Toastr CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
        <!-- Select2 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    
        <!-- Custom CSS -->
        <link href="{{ asset('admin-assets/css/styles.css') }}" rel="stylesheet" />
    
        <!-- FontAwesome -->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    
        <!-- jQuery (MUST be before Select2) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
        <!-- Select2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        @stack('styles')
    </head>
    
    
<body class="sb-nav-fixed">

<!-- Navbar -->
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    @include('admin.include.header')
</nav>

<div id="layoutSidenav">
    <!-- Sidebar -->
    @include('admin.include.left-sidebar')

    <div id="layoutSidenav_content">
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="py-4 bg-light mt-auto">
            @include('admin.include.footer')
        </footer>
    </div>
</div>
<!-- Scripts -->

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Custom Scripts -->
<script src="{{ asset('admin-assets/js/scripts.js') }}"></script>

<!-- DataTables -->
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('admin-assets/js/datatables-simple-demo.js') }}"></script>
@stack('scripts')

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