@extends('admin.master')

@section('title')
    Blog Details
@endsection

@section('content')

    <section class="py-5">
        <!--breadcrumb-->
        <div class="d-flex justify-content-between">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">
                    <a href="{{ route('blog.index') }}">Blog</a>
                </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Blog Detail Page</li>
                        </ol>
                    </nav>
                </div>
            </div>
            @php
                $permissionData = json_decode(Auth::user()->permission, true);
            @endphp
            @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_create']) && $permissionData['blogs_all']['blogs']['blog_create'] == 'blog_create')
                <div class="">
                    <a class="btn all-btn-same rounded-3" href="{{ route('blog.create') }}">Add Blog</a>
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
                        <div class="card-header fs-3 fw-bold">Blog Details Page</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th> Blog Create Date </th>
                                    <td>
                                        {{ $blog->created_at->setTimezone('Asia/Dhaka')->format('M d, Y, h:ia') }}
                                    </td>
                                </tr>
                                @php
                                    $permissionData = json_decode(Auth::user()->permission, true);
                                @endphp
                                @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_number']) && $permissionData['blogs_all']['blogs']['blog_number'] == 'blog_number')
                                    <tr>
                                        <th> Blog Id </th>
                                        <td>{{$blog->id}}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <th> Blog Language </th>
                                    <td>{{$blog->language}}</td>
                                </tr>
                                <tr>
                                    <th> Blog Meta Title </th>
                                    <td>{{$blog->meta_title}}</td>
                                </tr>
                                <tr>
                                    <th> Blog Meta Description </th>
                                    <td>{{$blog->meta_description}}</td>
                                </tr>
                                <tr>
                                    <th> Blog Author </th>
                                    <td>{{$blog->user->name}}</td>
                                </tr>
                                <tr>
                                    <th> Blog Title </th>
                                    <td>{{$blog->title}}</td>
                                </tr>
                                <tr>
                                    <th> Blog Category </th>
                                    <td>{{$blog->category->name}}</td>
                                </tr>
                                <tr>
                                    <th> Blog Tag</th>
                                    <td>
                                        @if($blog->tags->count() > 0)
                                            <ul class="d-flex">
                                                @foreach($blog->tags as $tag)
                                                    <li>
                                                        <span class="badge bg-warning mx-1">
                                                            {{ $tag->name }}
                                                        </span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            No tags associated with this blog.
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th> Blog Short Description </th>
                                    <td>{{$blog->short_description}}</td>
                                </tr>
                                <tr>
                                    <th> Blog Description </th>
                                    <td>
                                        <textarea id="summernote" cols="30" rows="10" disabled>{{$blog->description}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th> Blog Popular Status</th>
                                    <td>
                                        {{$blog->popular_status}}
                                        @php
                                            $permissionData = json_decode(Auth::user()->permission, true);
                                        @endphp
                                        @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_popular_status']) && $permissionData['blogs_all']['blogs']['blog_popular_status'] == 'blog_popular_status')
                                            @if($blog->popular_status == 'active')
                                                <a href="{{ route('change.status.popular.blog', $blog->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-success')" class="btn btn-success">Change</a>
                                            @else($blog->popular_status == 'inActive')
                                                <a href="{{ route('change.status.popular.blog', $blog->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">Change</a>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th> Blog Status</th>
                                    <td>
                                        {{$blog->status}}
                                        @php
                                            $permissionData = json_decode(Auth::user()->permission, true);
                                        @endphp
                                        @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_status']) && $permissionData['blogs_all']['blogs']['blog_status'] == 'blog_status')
                                            @if($blog->status == 'Publish')
                                                <a href="{{ route('change.status.blog', $blog->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-success')" class="btn btn-success">Change</a>
                                            @else($blog->status == 'Draft')
                                                <a href="{{ route('change.status.blog', $blog->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">Change</a>
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
                                            @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_edit']) && $permissionData['blogs_all']['blogs']['blog_edit'] == 'blog_edit')
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Edit">
                                                    <a href="{{route('blog.edit', Crypt::encryptString($blog->id) )}}" class="text-warning mx-2"><i class="fa fa-edit"></i></a>
                                                </span>
                                            @endif
                                            @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_delete']) && $permissionData['blogs_all']['blogs']['blog_delete'] == 'blog_delete')
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Delete">
                                                    <form action="{{ route('blog.destroy', $blog->id )}}" method="post" enctype="multipart/form-data" id="deleteForm{{ $blog->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="text-danger border-0 mx-2" type="submit" onclick="return deleteAction('{{ $blog->id }}', 'Are you sure to delete this blog?', 'btn-danger')">
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

