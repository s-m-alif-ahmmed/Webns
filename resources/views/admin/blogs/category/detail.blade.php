@extends('admin.master')

@section('title')
    Category Details
@endsection

@section('content')

    <section class="my-5">
        <!--breadcrumb-->
        <div class="d-flex justify-content-between">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">
                    <a href="{{ route('category.index') }}">Category</a>
                </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Category Detail Page</li>
                        </ol>
                    </nav>
                </div>
            </div>
            @php
                $permissionData = json_decode(Auth::user()->permission, true);
            @endphp
            @if($permissionData && isset($permissionData['blogs_all']['blog_categories']['category_create']) && $permissionData['blogs_all']['blog_categories']['category_create'] == 'category_create')
                <div class="">
                    <a class="btn all-btn-same rounded-3" href="{{ route('category.create') }}">Add Category</a>
                </div>
            @endif
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-muted">{{session('message')}}</p>

        <hr/>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header fs-3 fw-bold">Category Detail Page</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                @php
                                    $permissionData = json_decode(Auth::user()->permission, true);
                                @endphp
                                @if($permissionData && isset($permissionData['blogs_all']['blog_categories']['category_number']) && $permissionData['blogs_all']['blog_categories']['category_number'] == 'category_number')
                                <tr>
                                    <th> Category ID </th>
                                    <td>{{$category->id}}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th> Category Name </th>
                                    <td>{{$category->name}}</td>
                                </tr>
                                <tr>
                                    <th> Category Status</th>
                                    <td>
                                        {{$category->status}}
                                        @php
                                            $permissionData = json_decode(Auth::user()->permission, true);
                                        @endphp
                                        @if($permissionData && isset($permissionData['blogs_all']['blog_categories']['category_status']) && $permissionData['blogs_all']['blog_categories']['category_status'] == 'category_status')
                                            @if($category->status == 'active')
                                                <a href="{{ route('change.status.category', $category->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-success')"  class="btn btn-success">Change</a>
                                            @else($category->status == 'inActive')
                                                <a href="{{ route('change.status.category', $category->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">Change</a>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Action</th>
                                    <td>
                                        <div class="d-flex">
                                            @php
                                                $permissionData = json_decode(Auth::user()->permission, true);
                                            @endphp
                                            @if($permissionData && isset($permissionData['blogs_all']['blog_categories']['category_edit']) && $permissionData['blogs_all']['blog_categories']['category_edit'] == 'category_edit')
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Edit">
                                                    <a href="{{route('category.edit', Crypt::encryptString($category->id) )}}" class="text-warning mx-2"><i class="fa fa-edit"></i></a>
                                                </span>
                                            @endif
                                            @if($permissionData && isset($permissionData['blogs_all']['blog_categories']['category_delete']) && $permissionData['blogs_all']['blog_categories']['category_delete'] == 'category_delete')
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Delete">
                                                    <form action="{{ route('category.destroy', $category->id )}}" method="post" id="deleteForm{{ $category->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="text-danger border-0 mx-2" type="button" onclick="return deleteAction('{{ $category->id }}', 'Are you sure to delete this category?', 'btn-danger')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
