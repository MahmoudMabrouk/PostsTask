@extends('layouts.backend')

@section('content')
<!-- Main Container -->
<main id="main-container">

    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    blogs
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Admin</li>
                        <li class="breadcrumb-item">blogs</li>
                        <li class="breadcrumb-item" aria-current="blog">
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
                    <h3 class="block-title">Create blog</h3>
                    <div class="block-options">
                        <div class="block-options-item">
                        </div>
                    </div>
                </div>
                <div class="block-content">
                    <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title </label>
                            <input class="form-control" id="title" placeholder="Title " type="text" name="title" value="{{old('title') ?? ''}}">
                            @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control js-simplemde" id="simplemde"  type="text" name="description">{{old('description') ?? ''}}</textarea>
                            @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input class="form-control" id="phone_number" placeholder="phone_number" type="text" name="phone_number" value="{{old('phone_number') ?? ''}}">
                            @if ($errors->has('phone_number'))
                            <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                            @endif
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
