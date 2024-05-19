@extends('layouts.backend')

@section('content')
<!-- Main Container -->
<main id="main-container">

    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Users
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Admin</li>
                        <li class="breadcrumb-item">Users</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Create</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <!-- Default Table -->
            <div class="block block-rounded col-md-12">
                <div class="block-header">
                    <h3 class="block-title">Create User</h3>
                    <div class="block-options">
                        <div class="block-options-item">
                        </div>
                    </div>
                </div>
                <div class="block-content">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf


                        <div class="form-group">
                            <label for="username">User Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input class="form-control" id="User Name" placeholder="User Name" name="username" type="text">
                                @if ($errors->has('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" placeholder="you@example.com" type="email" name="email">
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Phone Number</label>
                            <input class="form-control" id="Phone Number" placeholder="Phone Number" type="text" name="phone">
                            @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="password">Password</label>
                                <input class="form-control" id="password" placeholder="Password" type="password" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="confirm">Confirm password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" required>
                                @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                        </div>

                        <hr>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
            <!-- END Default Table -->
        </div>
    </div>
    </div>
    @endsection
