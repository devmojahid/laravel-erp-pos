@extends('frontend.layouts.master')

@section('title', $page_title)

@section('content')
    <!--------------------------------- Breadcrumb --------------------------------->
    @include('frontend.layouts.partials.breadcrumb', ['title' => $page_title])
    <!--------------------------------- Breadcrumb END --------------------------------->
    <div class="register py-120">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-xl-5 col-md-6">
                    <div class="login-area">
                        <h2>Log in your Account</h2>
                        <p>There are no enrollment fees or shipping quotas. Simp vide your contact information, create a
                            user ID and word.</p>
                        <form class="login-form">
                            <input type="email" name="email" placeholder="Username or Email Address">
                            <input type="password" name="password" placeholder="Enter Password">
                            <button class="def-btn btn-border">Login</button>
                        </form>
                        <span class="devider">or</span>
                        <div class="social-login-box">
                            <button class="def-btn btn-fb">Login with your facebook</button>
                            <button class="def-btn btn-gl">Login with your google+</button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-md-6">
                    <div class="author-area">
                        <h2>Become an Author</h2>
                        <p>There are no enrollment fees or shipping quotas. Simp vide your contact information, create a
                            user ID and word.</p>
                        <form action="{{ route('user.register') }}" id="registerForm" method="POST" class="login-form">
                            @csrf
                            <input type="text" name="name" id="name" placeholder="Full Name"
                                class="@error('name') is-invalid @enderror">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="email" name="email" id="email"
                                placeholder="Username or Email Address"class="@error('email') is-invalid @enderror">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="password" name="password" id="password" placeholder="Enter Password"
                                class="@error('password') is-invalid @enderror">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                placeholder="confirm Password" class="@error('password_confirmation') is-invalid @enderror">
                            @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-check">
                                <input class="form-check-input shipping-check" type="checkbox" name="shippingMode"
                                    id="agreeToTerm">
                                <span class="sub-input"><i class="fa-regular fa-check"></i></span>
                                <label class="form-check-label" for="agreeToTerm">
                                    Agree to the <a href="#">Terms and Conditions</a>
                                </label>
                            </div>
                            <button id="registerButton" type="submit" class="def-btn btn-border">Register</button>
                        </form>
                        <span class="devider">or</span>
                        <div class="social-login-box">
                            <button class="def-btn btn-fb">Sign Up with your facebook</button>
                            <button class="def-btn btn-gl">Sign Up with your google+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
