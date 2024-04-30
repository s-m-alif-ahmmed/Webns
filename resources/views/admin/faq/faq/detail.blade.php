@extends('admin.master')

@section('title')
    FAQ Details
@endsection

@section('content')

    <section class="py-5">
        <!--breadcrumb-->
        <div class="d-flex justify-content-between">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">
                    <a href="{{ route('admin-faq.index') }}">FAQ</a>
                </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">FAQ Detail Page</li>
                        </ol>
                    </nav>
                </div>
            </div>
{{--            @php--}}
{{--                $permissionData = json_decode(Auth::user()->permission, true);--}}
{{--            @endphp--}}
{{--            @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_create']) && $permissionData['blogs_all']['blogs']['blog_create'] == 'blog_create')--}}
                <div class="">
                    <a class="btn all-btn-same rounded-3" href="{{ route('admin-faq.create') }}">Add FAQ</a>
                </div>
{{--            @endif--}}
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-muted">{{session('message')}}</p>

        <hr/>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header fs-3 fw-bold">FAQ Details Page</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th> FAQ Create Date </th>
                                    <td>
                                        {{ $faq->created_at->setTimezone('Asia/Dhaka')->format('M d, Y, h:ia') }}
                                    </td>
                                </tr>
{{--                                @php--}}
{{--                                    $permissionData = json_decode(Auth::user()->permission, true);--}}
{{--                                @endphp--}}
{{--                                @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_number']) && $permissionData['blogs_all']['blogs']['blog_number'] == 'blog_number')--}}
                                <tr>
                                    <th> FAQ Id </th>
                                    <td>{{$faq->id}}</td>
                                </tr>
{{--                                @endif--}}
                                <tr>
                                    <th> FAQ Category </th>
                                    <td>{{$faq->faq_category->english}} ({{$faq->faq_category->bangla}})</td>
                                </tr>
                                <tr>
                                    <th> FAQ Question </th>
                                    <td>{{$faq->question}}</td>
                                </tr>
                                <tr>
                                    <th> FAQ Answer </th>
                                    <td>{{$faq->answer}}</td>
                                </tr>
                                @if($faq->single_image)
                                    <tr>
                                        <th> FAQ Single Image </th>
                                        <td>
                                            <img src="{{asset($faq->single_image)}}" alt="" style="height: 200px; width: auto;">
                                        </td>
                                    </tr>
                                @endif
                                @if($faq_images->isNotEmpty())
                                    <tr>
                                        <th> FAQ Multiple Images </th>
                                        <td>
                                            <div class="d-flex">
                                                @foreach ($faq_images as $faq_image)
                                                    <img class="p-3" src="{{ asset($faq_image->image) }}" alt="" style="height: 200px; width: auto;">
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <th> FAQ Status</th>
                                    <td>
                                        {{$faq->status}}
{{--                                        @php--}}
{{--                                            $permissionData = json_decode(Auth::user()->permission, true);--}}
{{--                                        @endphp--}}
{{--                                        @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_status']) && $permissionData['blogs_all']['blogs']['blog_status'] == 'blog_status')--}}
                                            @if($faq->status == 'Publish')
                                                <a href="{{ route('change.status.faq', $faq->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-success')" class="btn btn-success">Change</a>
                                            @else($faq->status == 'Draft')
                                                <a href="{{ route('change.status.faq', $faq->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">Change</a>
                                            @endif
{{--                                        @endif--}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Action</th>
                                    <td>
                                        <div class="d-flex">
{{--                                            @php--}}
{{--                                                $permissionData = json_decode(Auth::user()->permission, true);--}}
{{--                                            @endphp--}}
{{--                                            @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_edit']) && $permissionData['blogs_all']['blogs']['blog_edit'] == 'blog_edit')--}}
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Edit">
                                                    <a href="{{route('admin-faq.edit', Crypt::encryptString($faq->id) )}}" class="text-warning mx-2"><i class="fa fa-edit"></i></a>
                                                </span>
{{--                                            @endif--}}
{{--                                            @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_delete']) && $permissionData['blogs_all']['blogs']['blog_delete'] == 'blog_delete')--}}
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Delete">
                                                    <form action="{{ route('admin-faq.destroy', $faq->id )}}" method="post" enctype="multipart/form-data" id="deleteForm{{ $faq->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="text-danger border-0 mx-2" type="submit" onclick="return deleteAction('{{ $faq->id }}', 'Are you sure to delete this blog?', 'btn-danger')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </span>
{{--                                            @endif--}}
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
