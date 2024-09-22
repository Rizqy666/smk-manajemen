@extends('layouts.auth')
@section('title', 'Register')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex justify-content-center py-4">
                    <img src="assets/img/logo.png" alt="" />
                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                        <span class="d-none d-lg-block text-center">Sistem Informasi Pengelolaan Data Siswa</span>
                    </a>
                </div><!-- End Logo -->

                <div class="card mb-3">

                    <div class="card-body">

                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                            <p class="text-center small">Enter your personal details to create account</p>
                        </div>

                        <form method="POST" action="{{ route('register') }}" class="row g-3 needs-validation" novalidate>
                            @csrf
                            <div class="col-12">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                                <div class="invalid-feedback">Please, enter your name!</div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Your Email</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                                <div class="invalid-feedback">Please enter a valid Email address!</div>
                            </div>

                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                                <div class="invalid-feedback">Please enter your password!</div>
                            </div>

                            <div class="col-12">
                                <label for="password-confirm" class="form-label">Password Confirm</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="password-confirm" required>
                                <div class="invalid-feedback">Please confirm your password!</div>
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" name="terms" type="checkbox" value="1"
                                        id="acceptTerms" required>
                                    <label class="form-check-label" for="acceptTerms">I agree and accept the
                                        <a href="#">terms and conditions</a></label>
                                    <div class="invalid-feedback">You must agree before submitting.</div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Create Account</button>
                            </div>

                            <div class="col-12">
                                <p class="small mb-0">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection