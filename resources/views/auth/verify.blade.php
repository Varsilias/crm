@extends('layouts.app')

@section('content')
    <div class="container">
    <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                         @if (session('resent'))
                                            <div class="alert alert-success" role="alert">
                                                {{ __('A fresh verification link has been sent to your email address.') }}
                                            </div>
                                        @endif

                                        <h1 class="h4 text-gray-900 mb-2">Verify Your Email Address</h1>
                                        <p class="mb-4">We get it, you really can't wait to use our service.
                                            We just want to make sure that the email you registered with is active and correct.
                                            We sent a Verification link to the email you provided. If you didn't see the mail,
                                            <form method="POST" action="{{ route('verification.resend') }}" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                                                    Click here to get a new link
                                                </button>
                                            </form>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
