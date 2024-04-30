@extends('admin.master')

@section('title')
    Demo Request Message Detail
@endsection

@section('content')

    <section class="py-5">
        <!--breadcrumb-->
        <div class="d-flex justify-content-between">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">
                    <a href="{{ route('demo-request.index') }}">Demo Request Message</a>
                </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Demo Request Message Detail Page</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-muted">{{session('message')}}</p>

        <hr/>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header fs-3 fw-bold">Demo Request Message Details Page</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th> Create Date </th>
                                    <td>
                                        {{ $demo_request->created_at->setTimezone('Asia/Dhaka')->format('M d, Y, h:ia') }}
                                    </td>
                                </tr>
                                {{--                                @php--}}
                                {{--                                    $permissionData = json_decode(Auth::user()->permission, true);--}}
                                {{--                                @endphp--}}
                                {{--                                @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_number']) && $permissionData['blogs_all']['blogs']['blog_number'] == 'blog_number')--}}
                                <tr>
                                    <th> Demo Request Message Id </th>
                                    <td>{{$demo_request->id}}</td>
                                </tr>
                                {{--                                @endif--}}
                                <tr>
                                    <th> Full Name </th>
                                    <td>{{$demo_request->full_name}}</td>
                                </tr>
                                <tr>
                                    <th> Company Name </th>
                                    <td>{{$demo_request->company_name}}</td>
                                </tr>
                                <tr>
                                    <th> Designation </th>
                                    <td>{{$demo_request->designation}}</td>
                                </tr>
                                <tr>
                                    <th> Email </th>
                                    <td>{{$demo_request->email}}</td>
                                </tr>
                                <tr>
                                    <th> Number </th>
                                    <td>{{$demo_request->number}}</td>
                                </tr>
                                <tr>
                                    <th> Choose Product </th>
                                    <td>{{$demo_request->choose_product}}</td>
                                </tr>
                                <tr>
                                    <th> Date </th>
                                    <td>{{$demo_request->date}}</td>
                                </tr>
                                <tr>
                                    <th> Time </th>
                                    <td>{{$demo_request->time}}</td>
                                </tr>
                                <tr>
                                    <th> Comment </th>
                                    <td>
                                        <textarea class="w-100" disabled rows="10">{{$demo_request->comment}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th> Note </th>
                                    <td>
                                        @if($demo_request)
                                            <form action="{{ route('demo-request.update', $demo_request->id ) }}" method="POST">
                                                @csrf

                                                <input type="hidden" name="full_name" value="{{ $demo_request->full_name }}">
                                                <input type="hidden" name="company_name" value="{{ $demo_request->company_name }}">
                                                <input type="hidden" name="designation" value="{{ $demo_request->designation }}">
                                                <input type="hidden" name="email" value="{{ $demo_request->email }}">
                                                <input type="hidden" name="number" value="{{ $demo_request->number }}">
                                                <input type="hidden" name="choose_product" value="{{ $demo_request->choose_product }}">
                                                <input type="hidden" name="date" value="{{ $demo_request->date }}">
                                                <input type="hidden" name="time" value="{{ $demo_request->time }}">
                                                <input type="hidden" name="comment" value="{{ $demo_request->comment }}">

                                                @if($demo_request->note)
                                                    <textarea class="w-100" name="note" id="editor" rows="5" cols="30">
                                                    {{ $demo_request->note }}
                                                </textarea>
                                                @else
                                                    <textarea class="w-100" name="note" id="editor1" rows="5" cols="30"></textarea>
                                                @endif

                                                <div class="float-end py-3">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        @else
                                            no
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <th> Status</th>
                                    <td>
                                        {{--                                            {{$career_job_post->status}}--}}
                                        {{--                                            @php--}}
                                        {{--                                                $permissionData = json_decode(Auth::user()->permission, true);--}}
                                        {{--                                            @endphp--}}
                                        {{--                                            @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_status']) && $permissionData['blogs_all']['blogs']['blog_status'] == 'blog_status')--}}
                                        @if($demo_request->status == 'Read')
                                            <a href="{{ route('demo-request.change.status', $demo_request->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-success')" class="btn btn-success">Read</a>
                                        @elseif($demo_request->status == 'UnRead')
                                            <a href="{{ route('demo-request.change.status', $demo_request->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">UnRead</a>
                                        @endif
                                        {{--                                            @endif--}}
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

                                            {{--                                            @endif--}}
                                            {{--                                            @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_delete']) && $permissionData['blogs_all']['blogs']['blog_delete'] == 'blog_delete')--}}
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Delete">
                                                    <form action="{{ route('demo-request.destroy', $demo_request->id )}}" method="post" enctype="multipart/form-data" id="deleteForm{{ $demo_request->id }}">
                                                        @csrf

                                                        <button class="text-danger border-0 mx-2" type="submit" onclick="return deleteAction('{{ $demo_request->id }}', 'Are you sure to delete this contact message?', 'btn-danger')">
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
