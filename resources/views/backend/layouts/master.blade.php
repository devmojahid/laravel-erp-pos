<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') < {{ env('APP_NAME') }} </title>

            <!-- Google Font: Source Sans Pro -->
            <link rel="stylesheet"
                href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
            <!-- Font Awesome -->
            <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
            <!-- overlayScrollbars -->
            <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
            <link rel="stylesheet"
                href="{{ asset('backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
            <!-- Theme style -->

            {{-- page spasific css --}}
            @stack('css')
            <link rel="stylesheet" href="{{ asset('backend/assets/css/adminlte.min.css') }}">
            <!-- Custom style -->
            <link rel="stylesheet" href="{{ asset('backend/assets/css/custom.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('backend.layouts.partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('backend.layouts.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content pt-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            {{-- notification --}}
                            @include('backend.layouts.partials.notification')
                            {{-- main content --}}
                            @yield('content')
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('backend.layouts.partials.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    {{-- page spacifc script --}}
    @stack('script')

    <!-- sweetalert2 -->


    <script>
        //  when session flash
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        @if (session()->has('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            })
        @endif

        @if (session()->has('error'))
            Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}'
            })
        @endif
    </script>

    <!-- AdminLTE App -->
    <script src="{{ asset('backend/assets/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>

</body>

</html>
