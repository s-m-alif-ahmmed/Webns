@extends('admin.master')

@section('title')
    Support Messages
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
                            <li class="breadcrumb-item active" aria-current="page">Manage Support Messages</li>
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
                            <th> Full Name </th>
                            <th> Company Name </th>
                            {{--                            @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_status']) && $permissionData['blogs_all']['blogs']['blog_status'] == 'blog_status')--}}
                            <th> Status </th>
                            {{--                            @endif--}}
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($support_messages as $support_message)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                {{--                                @php--}}
                                {{--                                    $permissionData = json_decode(Auth::user()->permission, true);--}}
                                {{--                                @endphp--}}
                                {{--                                @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_number']) && $permissionData['blogs_all']['blogs']['blog_number'] == 'blog_number')--}}
                                <td>
                                    {{$support_message->created_at->setTimezone('Asia/Dhaka')->format('M d, Y, h:ia')}}
                                </td>
                                {{--                                @endif--}}
                                <td>
                                    {{$support_message->full_name}}
                                </td>
                                <td>
                                    {{$support_message->company_name}}
                                </td>
                                {{--                                @php--}}
                                {{--                                    $permissionData = json_decode(Auth::user()->permission, true);--}}
                                {{--                                @endphp--}}
                                {{--                                @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_status']) && $permissionData['blogs_all']['blogs']['blog_status'] == 'blog_status')--}}
                                <td>
                                    @if($support_message->status == 'Read')
                                        <a href="{{ route('change.status.support', $support_message->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-success')" class="btn btn-success">Read</a>
                                    @elseif($support_message->status == 'UnRead')
                                        <a href="{{ route('change.status.support', $support_message->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">UnRead</a>
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
                                            <a href="{{route('support.show', Crypt::encryptString($support_message->id))}}" class="text-primary mx-1"><i class="fa fa-eye"></i></a>
                                        </span>
                                        {{--                                        @endif--}}
                                        {{--                                        @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_delete']) && $permissionData['blogs_all']['blogs']['blog_delete'] == 'blog_delete')--}}
                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Delete">
                                                <form action="{{ route('support.destroy', $support_message->id )}}" method="post" id="deleteForm{{ $support_message->id }}">
                                                    @csrf
                                                    @method('delete')

                                                    <button class="text-danger border-0" type="submit" onclick="return deleteAction('{{ $support_message->id }}', 'Are you sure to delete this support message?', 'btn-danger')">
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
