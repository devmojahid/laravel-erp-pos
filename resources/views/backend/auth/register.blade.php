@extends('backend.layouts.guest')

@section('title', 'Register')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{ url('/') }}" class="h1"><b>{{ env('APP_NAME') }}</b></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <div class="showMessage"></div>
            <form action="{{ route('admin.register.store') }}" method="post" id="register_submit">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Full Name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="cpassword" id="cpassword" class="form-control"
                        placeholder="Confirm Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <div class="invalid-feedback"></div>
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
                        <button type="submit" id="submitButton" class="btn btn-primary btn-block">Sign Up</button>
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
                <a href="{{ route('admin.forgot.password') }}">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="{{ route('admin.login') }}" class="text-center">I already Have Account</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $("#register_submit").submit(function(e) {
                    e.preventDefault();
                    $("#submitButton").html('please Wait..');
                    $.ajax({
                        url: '{{ route('admin.register.store') }}',
                        method: "post",
                        data: $(this).serialize(),
                        dataType: "json",
                        success: function(res) {
                            if (res.status == 400) {
                                showError('name', res.messages.name);
                                showError('email', res.messages.email);
                                showError('password', res.messages.password);
                                showError('cpassword', res.messages.cpassword);
                                $("#submitButton").html("Register");
                            } else if (res.status == 200) {
                                $(".showMessage").html(showMessage('success', res.messages));
                                $("#register_submit")[0].reset();
                                removeValidationClass("#register_submit")
                                $("#submitButton").html("Register");

                            }
                        }
                    });
                })
            });
        </script>
    @endpush
@endsection
