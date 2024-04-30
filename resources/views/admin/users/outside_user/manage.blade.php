@extends('admin.master')

@section('title')
    Company Users
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
                            <li class="breadcrumb-item active" aria-current="page">Manage Company Users</li>
                        </ol>
                    </nav>
                </div>
            </div>
{{--            @php--}}
{{--                $permissionData = json_decode(Auth::user()->permission, true);--}}
{{--            @endphp--}}
{{--            @if($permissionData && isset($permissionData['users_all']['employ_all']['employ_create']) && $permissionData['users_all']['employ_all']['employ_create'] == 'employ_create')--}}
{{--                <div class="">--}}
{{--                    <a class="btn all-btn-same rounded-3" href="{{ route('users.registration') }}">Add User</a>--}}
{{--                </div>--}}
{{--            @endif--}}
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-muted">{{session('message')}}</p>
        <hr/>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom w-100" id="file-datatable" style="width: 100%;">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th> Company Logo </th>
                            <th> Company Name</th>
                            <th> Company Email </th>
                            <th> Status </th>
                            <th> Restriction </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($outside_users as $user)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td>
                                    @if($user->company_logo)
                                        <img src="{{ asset($user->company_logo) }}" alt="" style="height: 50px; width: auto;">
                                    @endif
                                </td>
                                <td>
                                    @if($user->company_name)
                                        {{$user->company_name}}
                                    @endif
                                </td>
                                <td>
                                    @if($user->company_email)
                                        {{$user->company_email}}
                                    @endif
                                </td>
                                <td>
                                    @if($user->approve_status == 'Waiting')
                                        {{$user->approve_status}}
                                    @elseif($user->approve_status == 'Approved')
                                        {{$user->approve_status}}
                                    @elseif($user->approve_status == 'Rejected')
                                        {{$user->approve_status}}
                                    @endif
                                </td>
                                <td>
                                    @if($user->ban_status == 1)
                                        <p>Restricted</p>
                                    @elseif($user->ban_status == 0)
                                        <p>Unrestricted</p>
                                    @endif
{{--                                    @php--}}
{{--                                        $permissionData = json_decode(Auth::user()->permission, true);--}}
{{--                                    @endphp--}}
{{--                                    @if($permissionData && isset($permissionData['users_all']['employ_all']['employ_restriction']) && $permissionData['users_all']['employ_all']['employ_restriction'] == 'employ_restriction')--}}
                                        @if($user->ban_status == 1)
                                            <a href="{{ route('outsider.change.ban.status', $user->id) }}" onclick="return BanAction(event, 'Are you sure to unrestricted this user?', 'btn-success')" class="btn btn-danger btn-sm">Restricted</a>
                                        @elseif($user->ban_status == 0)
                                            <a href="{{ route('outsider.change.ban.status', $user->id) }}" onclick="return BanAction(event, 'Are you sure to restricted this user?', 'btn-danger')" class="btn btn-success btn-sm">Unrestricted</a>
                                        @endif
{{--                                    @endif--}}
                                </td>
                                <td>
{{--                                    @php--}}
{{--                                        $permissionData = json_decode(Auth::user()->permission, true);--}}
{{--                                    @endphp--}}
{{--                                    @if($permissionData && isset($permissionData['users_all']['employ_all']['employ_detail']) && $permissionData['users_all']['employ_all']['employ_detail'] == 'employ_detail')--}}
                                            <span class="d-inline-block ms-2" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Company Detail">
                                                <a href="{{ route('outsider.user.show', Crypt::encryptString($user->id)) }}" class="btn btn-bitbucket btn-sm">
                                                    <i class="fa fa-solid fa-eye"></i>
                                                </a>
                                            </span>
{{--                                    @endif--}}
{{--                                    @if($permissionData && isset($permissionData['users_all']['employ_all']['employ_edit']) && $permissionData['users_all']['employ_all']['employ_edit'] == 'employ_edit')--}}
                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Company Edit">
                                            <a href="{{route('outsider.user.admin.edit', Crypt::encryptString($user->id) )}}" class="btn btn-success btn-sm btn-warning">
                                                <i class="fa fa-solid fa-edit"></i>
                                            </a>
                                        </span>
{{--                                    @endif--}}
{{--                                    @if($permissionData && isset($permissionData['users_all']['employ_all']['employ_delete']) && $permissionData['users_all']['employ_all']['employ_delete'] == 'employ_delete')--}}
                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Company Delete">
                                            <form action="{{ route('outsider.user.delete', $user->id) }}" id="deleteForm{{ $user->id }}" method="POST" style="display: inline;">
                                                @csrf

                                                <button type="button" class="btn btn-danger btn-sm" onclick="return deleteAction('{{ $user->id }}', 'Are you sure to delete this user?', 'btn-danger')">
                                                    <i class="fa fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </span>
{{--                                    @endif--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </section>



@endsection

