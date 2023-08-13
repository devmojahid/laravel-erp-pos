@extends('backend.layouts.guest')

@section('title', 'Login')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{ url('/') }}" class="h1"><b>{{ env('APP_NAME') }}</b></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <div class="showMessage"></div>
            <form action="{{ route('admin.login.store') }}" method="post" id="login_form">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" id="login_btn" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center mt-2 mb-3">
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                </a>
            </div>
            <!-- /.social-auth-links -->

            <p class="mb-1">
                {{-- <a href="{{ route('admin.forgot.password') }}">I forgot my password</a> --}}
            </p>
            <p class="mb-0">
                {{-- <a href="{{ route('admin.register') }}" class="text-center">Register a new membership</a> --}}
            </p>
        </div>
    </div>
@endsection
