@extends('admin.master')

@section('title')
    Support Message Detail
@endsection

@section('content')

    <section class="py-5">
        <!--breadcrumb-->
        <div class="d-flex justify-content-between">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">
                    <a href="{{ route('support.index') }}">Support Message</a>
                </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Support Message Detail Page</li>
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
                        <div class="card-header fs-3 fw-bold">Support Message Details Page</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th> Create Date </th>
                                    <td>
                                        {{ $support_message->created_at->setTimezone('Asia/Dhaka')->format('M d, Y, h:ia') }}
                                    </td>
                                </tr>
                                {{--                                @php--}}
                                {{--                                    $permissionData = json_decode(Auth::user()->permission, true);--}}
                                {{--                                @endphp--}}
                                {{--                                @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_number']) && $permissionData['blogs_all']['blogs']['blog_number'] == 'blog_number')--}}
                                <tr>
                                    <th> Support Message Id </th>
                                    <td>{{$support_message->id}}</td>
                                </tr>
                                {{--                                @endif--}}
                                <tr>
                                    <th> Name </th>
                                    <td>{{$support_message->full_name}}</td>
                                </tr>
                                <tr>
                                    <th> Company Name </th>
                                    <td>{{$support_message->company_name}}</td>
                                </tr>
                                <tr>
                                    <th> Designation </th>
                                    <td>{{$support_message->designation}}</td>
                                </tr>
                                <tr>
                                    <th> Email </th>
                                    <td>{{$support_message->email}}</td>
                                </tr>
                                <tr>
                                    <th> Contact Number </th>
                                    <td>{{$support_message->number}}</td>
                                </tr>
                                <tr>
                                    <th> Choose Product </th>
                                    <td>{{$support_message->choose_product}}</td>
                                </tr>
                                <tr>
                                    <th> Message </th>
                                    <td>
                                        <textarea class="w-100" disabled rows="10">{{$support_message->message}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th> Note </th>
                                    <td>
                                        @if($support_message)
                                        <form action="{{ route('support.update', $support_message->id ) }}" method="POST">
                                            @csrf
                                            @method('patch')

                                            <input type="hidden" name="full_name" value="{{ $support_message->full_name }}">
                                            <input type="hidden" name="company_name" value="{{ $support_message->company_name }}">
                                            <input type="hidden" name="email" value="{{ $support_message->email }}">
                                            <input type="hidden" name="number" value="{{ $support_message->number }}">
                                            <input type="hidden" name="designation" value="{{ $support_message->designation }}">
                                            <input type="hidden" name="choose_product" value="{{ $support_message->choose_product }}">
                                            <input type="hidden" name="message" value="{{ $support_message->message }}">

                                            @if($support_message->note)
                                                <textarea class="w-100" name="note" id="editor" rows="5" cols="30">
                                                    {{ $support_message->note }}
                                                </textarea>
                                            @else
                                                <textarea class="w-100" name="note" id="editor1" rows="5" cols="30"></textarea>
                                            @endif

                                            <div class="float-end py-3">
                                                <button type="submit" class="btn all-btn-same">Save</button>
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
                                        @if($support_message->status == 'Read')
                                            <a href="{{ route('change.status.support', $support_message->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-success')" class="btn btn-success">Read</a>
                                        @elseif($support_message->status == 'UnRead')
                                            <a href="{{ route('change.status.support', $support_message->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">UnRead</a>
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
                                                    <form action="{{ route('support.destroy', $support_message->id )}}" method="post" enctype="multipart/form-data" id="deleteForm{{ $support_message->id }}">
                                                        @csrf
                                                        @method('delete')

                                                        <button class="text-danger border-0 mx-2" type="submit" onclick="return deleteAction('{{ $support_message->id }}', 'Are you sure to delete this support message?', 'btn-danger')">
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
