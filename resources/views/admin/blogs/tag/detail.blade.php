@extends('admin.master')

@section('title')
    Tag Details
@endsection

@section('content')

    <section class="my-5">
        <!--breadcrumb-->
        <div class="d-flex justify-content-between">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">
                    <a href="{{ route('tag.index') }}">Tag</a>
                </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Tag Detail Page</li>
                        </ol>
                    </nav>
                </div>
            </div>
            @php
                $permissionData = json_decode(Auth::user()->permission, true);
            @endphp
            @if($permissionData && isset($permissionData['blogs_all']['blog_tags']['tag_create']) && $permissionData['blogs_all']['blog_tags']['tag_create'] == 'tag_create')
                <div class="">
                    <a class="btn all-btn-same rounded-3" href="{{ route('tag.create') }}">Add Tag</a>
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
                        <div class="card-header fs-3 fw-bold">Tag Detail Page</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                @php
                                    $permissionData = json_decode(Auth::user()->permission, true);
                                @endphp
                                @if($permissionData && isset($permissionData['blogs_all']['blog_tags']['tag_number']) && $permissionData['blogs_all']['blog_tags']['tag_number'] == 'tag_number')
                                    <tr>
                                        <th> Tag ID </th>
                                        <td>{{$tag->id}}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <th> Tag Name </th>
                                    <td>{{$tag->name}}</td>
                                </tr>
                                <tr>
                                    <th> Tag Status </th>
                                    <td>
                                        {{$tag->status}}
                                        @php
                                            $permissionData = json_decode(Auth::user()->permission, true);
                                        @endphp
                                        @if($permissionData && isset($permissionData['blogs_all']['blog_tags']['tag_status']) && $permissionData['blogs_all']['blog_tags']['tag_status'] == 'tag_status')
                                            @if($tag->status == 'active')
                                                <a href="{{ route('change.status.tag', $tag->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-success')" class="btn btn-success">Active</a>
                                            @else($tag->status == 'inActive')
                                                <a href="{{ route('change.status.tag', $tag->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">InActive</a>
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
                                            @if($permissionData && isset($permissionData['blogs_all']['blog_tags']['tag_edit']) && $permissionData['blogs_all']['blog_tags']['tag_edit'] == 'tag_edit')
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Edit">
                                                    <a href="{{route('tag.edit', Crypt::encryptString($tag->id) )}}" class="text-warning mx-2"><i class="fa fa-edit"></i></a>
                                                </span>
                                            @endif
                                            @if($permissionData && isset($permissionData['blogs_all']['blog_tags']['tag_delete']) && $permissionData['blogs_all']['blog_tags']['tag_delete'] == 'tag_delete')
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Delete">
                                                    <form action="{{ route('tag.destroy', $tag->id )}}" method="post" id="deleteForm{{ $tag->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="text-danger border-0 mx-2" type="button" onclick="return deleteAction('{{ $tag->id }}', 'Are you sure to delete this tag?', 'btn-danger')">
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
