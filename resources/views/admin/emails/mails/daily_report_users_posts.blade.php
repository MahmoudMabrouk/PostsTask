@extends('admin.emails.layout.layout')

@push('style')
    <style type="text/css">
        .invitation-container {
            padding: 0 !important;
        }

        .invitation-header {
            margin: 32px 0 20px 0;
            text-align: center;
            color: #212121;
            font-size: 30px;
            font-family: Roboto, serif;
            font-weight: 700;
            word-wrap: break-word;
            letter-spacing: 0;
        }

        .invitation-header h3 {
            font-family: Roboto, serif;
            font-weight: 700;
            font-size: 30px;
            line-height: 35.16px;
            text-align: center;
            color: #212121;
            margin-bottom: 0;
        }

        .invitation-body {
            padding-bottom: 40px;
            word-wrap: break-word;

            font-family: Roboto, serif;
            font-size: 18px;
            font-weight: 400;
            line-height: 21px;
            letter-spacing: 0em;
            text-align: center;
            color: #404040;
        }

        .bold_span {
            font-weight: 700;
        }

        .blue_text {
            color: #6B84F5
        }

        .text-decoration-auto {
            text-decoration: auto !important;
        }

        .text-decoration-none {
            text-decoration: none !important;
        }

        .text-decoration-none:hover {
            text-decoration: none !important;
        }

        .accept-info {
            color: #404040;
            font-size: 14px;
            font-family: Roboto;
            font-weight: 400;
            word-wrap: break-word;
            border: 1px solid #DADADA;
            border-radius: 20px;
            padding: 15px;
        }

        .accept-info .activity-data {
            font-family: Roboto, serif;
            letter-spacing: 0;
            text-align: left;
        }

        .accept-info .activity-owner {
            font-size: 20px;
            font-weight: 700;
            line-height: 23px;
        }

        .accept-info .activity-name {
            font-size: 18px;
            font-weight: 400;
            line-height: 21px;
        }

        .accept-info .invitation-message {
            font-family: Roboto, serif;
            font-size: 16px;
            line-height: 19px;
            letter-spacing: 0;
            text-align: left;
        }

        .accept-info .invitation-message .invitation-message-content {
            font-weight: 500;
        }

        .accept-info .invitation-message .invitation-message-data {
            font-weight: 400;
            margin: 0;
        }

        .invite-button-container {
            align-self: stretch;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            display: flex;
            margin: 30px 0;
            width: 100%;
        }

        .invite-button-container .invite-button-content {
            height: 50px;
            padding: 0 16px 0 16px;
            border-radius: 8px;
            gap: 16px;
            display: flex;
            width: 100%;
            justify-content: center;
            align-items: center;
        }

        .invite-button-container .invite-button-content a {
            width: 100%;
        }

        .invite-button-container .invite-button-content .invite-button-data {
            display: flex;
            width: 100%;
            justify-content: center;
            align-items: center;
        }

        .invite-button-container .invite-normal-button {
            border: 1px solid #8C8C8C;
            box-shadow: 0 4px 10px 0 #0000001A;
        }

        .invite-button-container .invite-normal-button a {
            color: #212121;
        }

        .invite-button-container .invite-facebook-button {
            background-color: #1778F2;
        }

        .invite-button-container .invite-facebook-button a {
            color: white;
        }

        .invite-button-container .invite-button-content-image-container {
            width: 21px;
            height: 21px;
            justify-content: center;
            align-items: center;
            display: flex;
            margin-right: 16px;
        }

        .invite-button-container .invite-button {
            font-size: 20px;
            font-family: Roboto, serif;
            font-weight: 700;
            word-wrap: break-word;
        }

        .invite-pronto-easy-to-platform {
            margin: 30px 0;
        }

        .invite-pronto-easy-to-platform > div {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .invite-pronto-easy-to-platform .platform-icon {
            width: 60px;
            height: 60px;
        }

        .invite-pronto-easy-to-platform .pronto-easy-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }

        .invite-pronto-easy-to-platform .platform-arrow {
            width: 20px;
            height: 20px;
            margin: 0 20px;
        }

        .invitation-footer {
            text-align: center;
            font-family: Roboto, serif;
            font-size: 14px;
            font-weight: 400;
            line-height: 16px;
            letter-spacing: 0;

        }

        .invitation-footer p {
            color: #8C8C8C;
            text-align: center;
        }

    </style>

@endpush

@push('media_query')
    <style type="text/css">
        @media screen and (max-width: 767px) {

            .invitation-body {
                padding-bottom: 32px !important;
            }

        }
    </style>
@endpush

@section('content')
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
                        <th class="text-center" style="width: 30px">#</th>
                        <th class="text-center" style="width: 100px">User Name</th>
                        <th class="text-center" style="width: 150px">Email</th>
                        <th class="text-center" style="width: 100px">phone</th>
                        <th class="text-center d-none d-sm-table-cell" style="width: 80px">role</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <th class="text-center" style="width: 30px" scope="row">{{$loop->iteration}}</th>
                            <td class="text-center" style="width: 100px" scope="row">{{$user->username}}</td>
                            <td class="text-center" style="width: 150px" scope="row">{{$user->email}}</td>
                            <td class="text-center" style="width: 100px" scope="row">{{$user->phone}}</td>

                            <td class="text-center d-none d-sm-table-cell"  style="width: 80px">
                                <span class="badge badge-{{$user->is_admin == 0 ? 'info':'success'}}">{{$user->is_admin == 0 ? 'user':'admin'}}</span>
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

    <hr>

    <div class="row">
        <!-- Default Table -->
        <div class="block block-rounded col-md-12">
            <div class="block-header">
                <h3 class="block-title">Blog List</h3>
                <div class="block-options">
                    <div class="block-options-item">
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                    <tr>
                        <th style="width: 5px">#</th>
                        <th >Title </th>
                        <th >Description</th>
                        <th >User Name</th>
                        <th >Phone Number</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($blogs as $blog)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$blog->title}}</td>
                            <td> {{substr($blog->description, 0, 50) }} {{ strlen($blog->description) < 50 ? '' : '...' }}</td>
                            <td>{{optional($blog->user)->username}}</td>
                            <td>{{$blog->phone_number}}</td>
                        </tr>
                    @empty
                        <tr>

                            <td colspan="6">
                                <span class="badge badge-info">No Posts</span>
                            </td>

                        </tr>
                    @endforelse
                    </tbody>

                </table>
            </div>
        </div>
        <!-- END Default Table -->
    </div>
@endsection
