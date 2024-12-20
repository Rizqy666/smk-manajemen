@extends('layouts.auth')

@section('title', 'Login')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="d-flex justify-content-center py-4">
                    <img src="assets/img/logo.png" alt="" />
                    <a href="#" class="logo d-flex align-items-center w-auto">
                        <span class="d-none d-lg-block text-center">Sistem Informasi Pengelolaan Data Siswa</span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">
                                Login to Your Account
                            </h5>
                            <p class="text-center small">
                                Enter your email & password to login
                            </p>
                        </div>

                        <form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation" novalidate>
                            @csrf
                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group has-validation">
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email" required
                                        autocomplete="current-password">
                                    <div class="invalid-feedback">
                                        Please enter your email.
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">
                                <div class="invalid-feedback">
                                    Please enter your password!
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" value="true"
                                        id="rememberMe" />
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    Login
                                </button>
                            </div>
                            <div class="col-12">
                                <p class="small mb-0">
                                    Don't have account?
                                    <a href="{{ route('register') }}">Create an account</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
