@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account</h1>
                        </div>
                        <form class="user" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control form-control-user @error('name') is-invalid @enderror"
                                    id="name"
                                    placeholder="Fullname"
                                    name="name"
                                    value="{{ old('name') }}"
                                    {{-- required --}}
                                    autocomplete="name"
                                    autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <input
                                    type="email"
                                    class="form-control form-control-user @error('email') is-invalid @enderror"
                                    id="email"
                                    placeholder="Email Address"
                                    name="email"
                                    value="{{ old('email') }}"
                                    {{-- required --}}
                                    autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            </div>

                            <div class="form-group">
                                <input
                                    type="password"
                                    class="form-control form-control-user @error('password') is-invalid @enderror"
                                    id="password"
                                    placeholder="Password"
                                    name="password"
                                    {{-- required --}}
                                    autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <input
                                    type="password"
                                    class="form-control form-control-user"
                                    id="password-confirm"
                                    name="password_confirmation"
                                    {{-- required --}}
                                    autocomplete="new-password"
                                    placeholder="Confirm Password">
                            </div>

                            <button type="submit" class="btn btn-dark btn-user btn-block">
                                Sign up
                            </button>

                            <hr>
                            <a href="{{ route('google.redirect') }}" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Sign up with Google
                            </a>
                            <a href="{{ route('facebook.redirect') }}" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Sign up with Facebook
                            </a>
                        </form>
                        <hr>

                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">Already have an account? Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>


@endsection
