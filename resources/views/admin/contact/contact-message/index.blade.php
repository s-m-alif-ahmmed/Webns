@extends('admin.master')

@section('title')
    Contact Messages
@endsection

@section('content')

    <section class="py-5">
        <!--breadcrumb-->
        <div class="d-flex justify-content-between">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Contact Messages</li>
                        </ol>
                    </nav>
                </div>
            </div>
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
                            {{--                            @php--}}
                            {{--                                $permissionData = json_decode(Auth::user()->permission, true);--}}
                            {{--                            @endphp--}}
                            {{--                            @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_number']) && $permissionData['blogs_all']['blogs']['blog_number'] == 'blog_number')--}}
                            <th> Create Time </th>
                            {{--                            @endif--}}
                            <th> Name </th>
                            <th> Company Name </th>
                            {{--                            @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_status']) && $permissionData['blogs_all']['blogs']['blog_status'] == 'blog_status')--}}
                            <th> Status </th>
                            {{--                            @endif--}}
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contact_messages as $contact_message)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                {{--                                @php--}}
                                {{--                                    $permissionData = json_decode(Auth::user()->permission, true);--}}
                                {{--                                @endphp--}}
                                {{--                                @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_number']) && $permissionData['blogs_all']['blogs']['blog_number'] == 'blog_number')--}}
                                <td>
                                    {{$contact_message->created_at->setTimezone('Asia/Dhaka')->format('M d, Y, h:ia')}}
                                </td>
                                {{--                                @endif--}}
                                <td>
                                    {{$contact_message->name}}
                                </td>
                                <td>
                                    {{$contact_message->company_name}}
                                </td>
                                {{--                                @php--}}
                                {{--                                    $permissionData = json_decode(Auth::user()->permission, true);--}}
                                {{--                                @endphp--}}
                                {{--                                @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_status']) && $permissionData['blogs_all']['blogs']['blog_status'] == 'blog_status')--}}
                                <td>

                                        @if($contact_message->status == 'Read')
                                            <a href="{{ route('contact-message.change.status', $contact_message->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-success')" class="btn btn-success">Read</a>
                                        @elseif($contact_message->status == 'UnRead')
                                            <a href="{{ route('contact-message.change.status', $contact_message->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">UnRead</a>
                                        @endif

                                </td>
                                {{--                                @endif--}}
                                <td>
                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                        {{--                                        @php--}}
                                        {{--                                            $permissionData = json_decode(Auth::user()->permission, true);--}}
                                        {{--                                        @endphp--}}
                                        {{--                                        @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_detail']) && $permissionData['blogs_all']['blogs']['blog_detail'] == 'blog_detail')--}}
                                        <span class="d-inline-block ms-2" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="View">
                                            <a href="{{route('contact-message.show', Crypt::encryptString($contact_message->id))}}" class="text-primary mx-1"><i class="fa fa-eye"></i></a>
                                        </span>
                                        {{--                                        @endif--}}
                                        {{--                                        @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_delete']) && $permissionData['blogs_all']['blogs']['blog_delete'] == 'blog_delete')--}}
                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Delete">
                                                <form action="{{ route('contact-message.destroy', $contact_message->id )}}" method="post" id="deleteForm{{ $contact_message->id }}">
                                                    @csrf

                                                    <button class="text-danger border-0" type="submit" onclick="return deleteAction('{{ $contact_message->id }}', 'Are you sure to delete this contact message?', 'btn-danger')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </span>
                                        {{--                                        @endif--}}
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
