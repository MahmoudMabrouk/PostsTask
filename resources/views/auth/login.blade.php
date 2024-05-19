@extends('layouts.app')

@section('content')
{{--<div class="bg-image" style="background-image: url('media/photos/photo28@2x.jpg');">--}}
<div class="bg-image" >
{{--    <div class="row no-gutters bg-primary-dark-op">--}}
    <div class="row no-gutters bg-primary-dark-op" style="background-image: url('media/photos/photo28@2x.jpg');">
        <!-- Meta Info Section -->
        <div class="hero-static col-lg-4 d-none d-lg-flex flex-column justify-content-center">
            <div class="p-4 p-xl-5 flex-grow-1 d-flex align-items-center">
                <div class="w-100">
                    <a class="link-fx font-w600 font-size-h2 text-white" href="#">
                        Diet-<span class="font-w400">Nation</span>
                    </a>
                    <p class="text-white-75 mr-xl-8 mt-2">
                        People tend to get more fit so they need to find a way to get a specific
                        diet that fit their body need and achieve the best result possible but also
                        considering their food choice
                    </p>
                </div>
            </div>
        </div>
        <!-- END Meta Info Section -->

        <!-- Main Section -->
        <div class="hero-static col-lg-8 d-flex flex-column align-items-center bg-white">
            <div class="p-3 w-100 d-lg-none text-center">
                <a class="link-fx font-w600 font-size-h3 text-dark" href="#">
                    Diet-<span class="font-w400">Nation</span>
                </a>
            </div>
            <div class="p-4 w-100 flex-grow-1 d-flex align-items-center">
                <div class="w-100">
                    <!-- Header -->
                    <div class="text-center mb-5">
                        <p class="mb-3">
                            <i class="fa fa-2x fa-circle-notch text-primary-light"></i>
                        </p>
                        <h1 class="font-w700 mb-2">
                            {{ __('Login') }}
                        </h1>
                        <h2 class="font-size-base text-muted">

                        </h2>
                    </div>
                    <!-- END Header -->

                    <!-- Sign In Form -->
                    <div class="row no-gutters justify-content-center">
                        <div class="col-sm-8 col-xl-4">
                            <form class="js-validation-signin" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control form-control-lg form-control-alt py-4 @error('email') is-invalid @enderror" name="email" placeholder="{{ __('Email Address') }}" value="{{ old('email') }}" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control form-control-lg form-control-alt py-4 @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group d-flex justify-content-between align-items-center">
                                    <div>
                                        @if (Route::has('password.request'))
                                        <a class="text-muted font-size-sm font-w500 d-block d-lg-inline-block mb-1" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        @endif
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-lg btn-alt-primary">
                                            <i class="fa fa-fw fa-sign-in-alt mr-1 opacity-50"></i> {{ __('Login') }}
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!-- END Sign In Form -->
                </div>
            </div>
{{--            <div class="px-4 py-3 w-100 d-lg-none d-flex flex-column flex-sm-row justify-content-between font-size-sm text-center text-sm-left">--}}
{{--                <p class="font-w500 text-black-50 py-2 mb-0">--}}
{{--                    <strong>OneUI 4.9</strong> &copy; <span data-toggle="year-copy"></span>--}}
{{--                </p>--}}
{{--                <ul class="list list-inline py-2 mb-0">--}}
{{--                    <li class="list-inline-item">--}}
{{--                        <a class="text-muted font-w500" href="javascript:void(0)">Legal</a>--}}
{{--                    </li>--}}
{{--                    <li class="list-inline-item">--}}
{{--                        <a class="text-muted font-w500" href="javascript:void(0)">Contact</a>--}}
{{--                    </li>--}}
{{--                    <li class="list-inline-item">--}}
{{--                        <a class="text-muted font-w500" href="javascript:void(0)">Terms</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
        </div>
        <!-- END Main Section -->
    </div>
</div>
@endsection
