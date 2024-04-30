@extends('admin.master')

@section('title')
    Tags
@endsection

@section('content')

    <section class="py-5">
        <!--breadcrumb-->
        <div class="d-flex justify-content-between">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Tag</li>
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
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom w-100" id="file-datatable" style="width:100%">
                        <thead>
                        <tr>
                            <th> SL </th>
                            @php
                                $permissionData = json_decode(Auth::user()->permission, true);
                            @endphp
                            @if($permissionData && isset($permissionData['blogs_all']['blog_tags']['tag_number']) && $permissionData['blogs_all']['blog_tags']['tag_number'] == 'tag_number')
                                <th> Tag ID </th>
                            @endif
                            <th> Tag Name </th>
                            @if($permissionData && isset($permissionData['blogs_all']['blog_tags']['tag_status']) && $permissionData['blogs_all']['blog_tags']['tag_status'] == 'tag_status')
                                <th> Tag Status </th>
                            @endif
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                @php
                                    $permissionData = json_decode(Auth::user()->permission, true);
                                @endphp
                                @if($permissionData && isset($permissionData['blogs_all']['blog_tags']['tag_number']) && $permissionData['blogs_all']['blog_tags']['tag_number'] == 'tag_number')
                                    <td>{{$tag->id}}</td>
                                @endif
                                <td>{{$tag->name}}</td>
                                @php
                                    $permissionData = json_decode(Auth::user()->permission, true);
                                @endphp
                                @if($permissionData && isset($permissionData['blogs_all']['blog_tags']['tag_status']) && $permissionData['blogs_all']['blog_tags']['tag_status'] == 'tag_status')
                                    <td>
                                        @if($tag->status == 'active')
                                            <a href="{{ route('change.status.tag', $tag->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-success')" class="btn btn-success">Active</a>
                                        @else($tag->status == 'inActive')
                                            <a href="{{ route('change.status.tag', $tag->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">InActive</a>
                                        @endif
                                    </td>
                                @endif
                                <td>
                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                        @php
                                            $permissionData = json_decode(Auth::user()->permission, true);
                                        @endphp
                                        @if($permissionData && isset($permissionData['blogs_all']['blog_tags']['tag_detail']) && $permissionData['blogs_all']['blog_tags']['tag_detail'] == 'tag_detail')
                                            <span class="d-inline-block ms-2" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="View">
                                                <a href="{{route('tag.show', Crypt::encryptString($tag->id))}}" class="text-primary mx-1"><i class="fa fa-eye"></i></a>
                                            </span>
                                        @endif
                                        @if($permissionData && isset($permissionData['blogs_all']['blog_tags']['tag_edit']) && $permissionData['blogs_all']['blog_tags']['tag_edit'] == 'tag_edit')
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Edit">
                                                <a href="{{route('tag.edit', Crypt::encryptString($tag->id))}}" class="text-warning mx-1"><i class="fa fa-edit"></i></a>
                                            </span>
                                        @endif
                                        @if($permissionData && isset($permissionData['blogs_all']['blog_tags']['tag_delete']) && $permissionData['blogs_all']['blog_tags']['tag_delete'] == 'tag_delete')
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Delete">
                                                <form action="{{ route('tag.destroy', $tag->id )}}" method="post" id="deleteForm{{ $tag->id }}" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-danger border-0" type="button" onclick="return deleteAction('{{ $tag->id }}', 'Are you sure to delete this tag?', 'btn-danger')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>

@endsection
