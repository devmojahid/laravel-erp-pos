<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') < {{ env('APP_NAME') }} </title>


            <!-- Google Font: Source Sans Pro -->
            <link rel="stylesheet"
                href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
            <!-- Font Awesome -->
            <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
            <!-- icheck bootstrap -->
            <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
            <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/toastr.min.css') }}">
            <!-- Theme style -->
            <link rel="stylesheet" href="{{ asset('backend/assets/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        @yield('content')
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/assets/js/adminlte.min.js') }}"></script>
    <script>
        @if (Session::has('messege'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('messege') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('messege') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('messege') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('messege') }}");
                    break;
            }
        @endif
    </script>
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
    @stack('scripts')
</body>

</html>
