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
    <script src="{{ asset('js/blogs/tables_datatables.js') }}"></script>
@endsection

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
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="">blogs</a>
                    </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-6">
                <a class="block block-rounded block-link-shadow text-center" href="{{route('blogs.create')}}">
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
                        <div class="font-size-h2 text-danger">{{count($blogs)}}</div>
                    </div>
                    <div class="block-content py-2 bg-body-light">
                        <p class="font-w600 font-size-sm text-danger mb-0">
                            blogs
                        </p>
                    </div>
                </a>
            </div>

        </div>
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
                                <th>Action</th>
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
                                            <td>

                                                <form action="{{ route('blogs.destroy',$blog->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-icon btn-info btn-icon-style-1" id="editrole"><span class="btn-icon-wrap"><i class="fa fa-pencil-alt" ></i></span></a>
                                                    <button type="submit" class="btn btn-icon btn-danger btn-icon-style-1"><span class="btn-icon-wrap"><i class="fa fa-trash"></i></span></button>
                                                </form>
                                            </td>
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
    </div>
    </div>
    @section('js_after')
<script>
$('#practice_modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') // Extract info from data-* attributes
  var name_en = button.data('name_en') // Extract info from data-* attributes
  var name_ar = button.data('name_ar') // Extract info from data-* attributes
  var image = button.data('image') // Extract info from data-* attributes
   var action = button.data('action') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('#FormNameAR').val(name_ar)
  modal.find('#FormNameEn').val(name_en)
  modal.find('#client_id').val(id)
  modal.find('#FormImage').attr('src',image)
modal.find('#formedit').attr('action', function (i,old) {
    return action;
});
})
</script>
@endsection
@endsection

