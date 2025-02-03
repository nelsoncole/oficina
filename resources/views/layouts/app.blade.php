<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AdminLTE com Laravel')</title>

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Navbar -->
    @include('layouts.partials.navbar')

    <!-- Sidebar -->
    <!-- @include('layouts.partials.sidebar') -->

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!--section class="content-header">
            <div class="container-fluid">
                <h1>@yield('header', 'Dashboard')</h1>
            </div>
        </section-->
        <section class="content">
            @yield('content')
        </section>
    </div>

    <!-- Footer -->
    @include('layouts.partials.footer')

</div>
    <!--  AdminLTE Scripts  -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

    <!-- Bootstrap JS (necessário para o modal funcionar) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>