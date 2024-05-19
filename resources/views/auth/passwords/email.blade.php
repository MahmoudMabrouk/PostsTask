@extends('layouts_front.app')

@section('content')
<main id="main-container">
                <!-- Page Content -->
                <div class="hero-static">
                    <div class="content">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-4">
                                <!-- Reminder Block -->
                                <div class="block block-rounded block-themed mb-0">
                                    <div class="block-header bg-primary-dark">
                                        <h3 class="block-title">{{__('Password Reminder')}}</h3>
                                        <div class="block-options">
                                            <a class="btn-block-option" href="{{ route('login') }}" data-toggle="tooltip" data-placement="left" title="Sign In">
                                                <i class="fa fa-sign-in-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <div class="p-sm-3 px-lg-4 py-lg-5">
                                            <h1 class="h2 mb-1">{{ config('app.name', '') }}</h1>
                                            <p class="text-muted">
                                                Please provide your account’s email and we will send you your password.
                                            </p>

                                            <!-- Reminder Form -->
                                            <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/op_auth_reminder.min.js which was auto compiled from _js/pages/op_auth_reminder.js) -->
                                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->

                                            <form  action="{{ route('password.email') }}" class="js-validation-reminder" method="POST">
                                               @csrf
                                                <div class="form-group py-3">
                                                    <input type="email" name="email"  class="form-control form-control-lg form-control-alt" id="email"  value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Email Address') }}">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-xl-5">

                                                        <button type="submit" class="btn btn-block btn-alt-primary">
                                                            <i class="fa fa-fw fa-envelope mr-1"></i> Send Mail
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- END Reminder Form -->
                                        </div>
                                    </div>
                                </div>
                                <!-- END Reminder Block -->
                            </div>
                        </div>
                    </div>
                    <div class="content content-full font-size-sm text-muted text-center">
                        &copy; <span data-toggle="year-copy"></span>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>

@endsection
