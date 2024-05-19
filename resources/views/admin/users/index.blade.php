@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection

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
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">users</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-6">
                <a class="block block-rounded block-link-shadow text-center" href="{{route('users.create')}}">
                    <div class="block-content block-content-full">
                        <div class="font-size-h2 text-success">
                            <i class="fa fa-plus"></i>
                        </div>
                    </div>
                    <div class="block-content py-2 bg-body-light">
                        <p class="font-w600 font-size-sm text-success mb-0">
                            Add New
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 ">
                <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="font-size-h2 text-danger">{{count($users)}}</div>
                    </div>
                    <div class="block-content py-2 bg-body-light">
                        <p class="font-w600 font-size-sm text-danger mb-0">
                            Users
                        </p>
                    </div>
                </a>
            </div>

        </div>
        <div class="row">
            <!-- Default Table -->
            <div class="block block-rounded col-md-12">
                <div class="block-header">
                    <h3 class="block-title">User List</h3>
                    <div class="block-options">
                        <div class="block-options-item">
                        </div>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>name</th>
                                <th>email</th>
                                <th>phone</th>
                                <th class="d-none d-sm-table-cell">role</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <th class="text-center" scope="row">{{$loop->iteration}}</th>
                                    <td class="text-center" scope="row">{{$user->username}}</td>
                                    <td class="text-center" scope="row">{{$user->email}}</td>
                                    <td class="text-center" scope="row">{{$user->phone}}</td>

                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-{{$user->is_admin == 0 ? 'info':'success'}}">{{$user->is_admin == 0 ? 'user':'admin'}}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">


                                            <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Edit Client" href="{{route('users.edit',$user->id)}}">
                                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                                </a>
                                                <button type="submit" class="btn btn-sm btn-light" data-toggle="tooltip" title="Remove Client">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>

                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>

                                    <td colspan="6">
                                        <span class="badge badge-info">No users</span>
                                    </td>

                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Default Table -->
        </div>
    </div>
    </div>
@endsection
