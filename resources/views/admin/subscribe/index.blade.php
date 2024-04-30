@extends('admin.master')

@section('title')
    Subscription
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
                            <li class="breadcrumb-item active" aria-current="page">Manage Subscriptions</li>
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
                            <th> Email </th>
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subscribe_emails as $subscribe_email)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                {{--                                @php--}}
                                {{--                                    $permissionData = json_decode(Auth::user()->permission, true);--}}
                                {{--                                @endphp--}}
                                {{--                                @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_number']) && $permissionData['blogs_all']['blogs']['blog_number'] == 'blog_number')--}}
                                <td>
                                    {{$subscribe_email->created_at->setTimezone('Asia/Dhaka')->format('M d, Y, h:ia')}}
                                </td>
                                {{--                                @endif--}}
                                <td>
                                    {{$subscribe_email->email}}
                                </td>
                                <td>
                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                        {{--                                        @php--}}
                                        {{--                                            $permissionData = json_decode(Auth::user()->permission, true);--}}
                                        {{--                                        @endphp--}}
                                        {{--                                        @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_delete']) && $permissionData['blogs_all']['blogs']['blog_delete'] == 'blog_delete')--}}
                                        <span class="d-inline-block ms-2" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Delete">
                                                <form action="{{ route('subscribe.email.destroy', $subscribe_email->id )}}" method="post" id="deleteForm{{ $subscribe_email->id }}">
                                                    @csrf

                                                    <button class="text-danger border-0" type="submit" onclick="return deleteAction('{{ $subscribe_email->id }}', 'Are you sure to delete this subscription email?', 'btn-danger')">
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

