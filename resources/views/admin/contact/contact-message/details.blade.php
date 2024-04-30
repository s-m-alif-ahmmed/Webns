@extends('admin.master')

@section('title')
    Contact Message Detail
@endsection

@section('content')

    <section class="py-5">
        <!--breadcrumb-->
        <div class="d-flex justify-content-between">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">
                    <a href="{{ route('contact-message.index') }}">Contact Message</a>
                </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Message Detail Page</li>
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
                        <div class="card-header fs-3 fw-bold">Contact Message Details Page</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th> Create Date </th>
                                    <td>
                                        {{ $contact_message->created_at->setTimezone('Asia/Dhaka')->format('M d, Y, h:ia') }}
                                    </td>
                                </tr>
                                {{--                                @php--}}
                                {{--                                    $permissionData = json_decode(Auth::user()->permission, true);--}}
                                {{--                                @endphp--}}
                                {{--                                @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_number']) && $permissionData['blogs_all']['blogs']['blog_number'] == 'blog_number')--}}
                                <tr>
                                    <th> Contact Message Id </th>
                                    <td>{{$contact_message->id}}</td>
                                </tr>
                                {{--                                @endif--}}
                                <tr>
                                    <th> Name </th>
                                    <td>{{$contact_message->name}}</td>
                                </tr>
                                <tr>
                                    <th> Email </th>
                                    <td>{{$contact_message->email}}</td>
                                </tr>
                                <tr>
                                    <th> Number </th>
                                    <td>{{$contact_message->number}}</td>
                                </tr>
                                <tr>
                                    <th> Company Name </th>
                                    <td>{{$contact_message->company_name}}</td>
                                </tr>
                                <tr>
                                    <th> Subject </th>
                                    <td>{{$contact_message->subject}}</td>
                                </tr>
                                <tr>
                                    <th> Message </th>
                                    <td>
                                        <textarea class="w-100" disabled rows="10">{{$contact_message->message}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th> Note </th>
                                    <td>
                                        @if($contact_message)
                                        <form action="{{ route('contact-message.update', $contact_message->id ) }}" method="POST">
                                            @csrf

                                            <input type="hidden" name="name" value="{{ $contact_message->name }}">
                                            <input type="hidden" name="company_name" value="{{ $contact_message->company_name }}">
                                            <input type="hidden" name="email" value="{{ $contact_message->email }}">
                                            <input type="hidden" name="number" value="{{ $contact_message->number }}">
                                            <input type="hidden" name="subject" value="{{ $contact_message->subject }}">
                                            <input type="hidden" name="message" value="{{ $contact_message->message }}">

                                            @if($contact_message->note)
                                                <textarea class="w-100" name="note" id="editor" rows="5" cols="30">
                                                    {{ $contact_message->note }}
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
                                        @if($contact_message->status == 'Read')
                                            <a href="{{ route('contact-message.change.status', $contact_message->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-success')" class="btn btn-success">Read</a>
                                        @elseif($contact_message->status == 'UnRead')
                                            <a href="{{ route('contact-message.change.status', $contact_message->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">UnRead</a>
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
                                                    <form action="{{ route('contact-message.destroy', $contact_message->id )}}" method="post" enctype="multipart/form-data" id="deleteForm{{ $contact_message->id }}">
                                                        @csrf

                                                        <button class="text-danger border-0 mx-2" type="submit" onclick="return deleteAction('{{ $contact_message->id }}', 'Are you sure to delete this contact message?', 'btn-danger')">
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
