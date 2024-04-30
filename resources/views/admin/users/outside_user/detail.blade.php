@extends('admin.master')

@section('title')
    Company Details
@endsection

@section('content')

    <section class="my-5">
        <div class="container">
            <div class="row">
                <!--breadcrumb-->
                <div class="d-flex justify-content-between">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">
                            <a href="{{ route('outsider.user.index') }}">Manage Company</a>
                        </div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Company Detail</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
{{--                    @php--}}
{{--                        $permissionData = json_decode(Auth::user()->permission, true);--}}
{{--                    @endphp--}}
{{--                    @if($permissionData && isset($permissionData['users_all']['user_designation']['designation_create']) && $permissionData['users_all']['user_designation']['designation_create'] == 'designation_create')--}}
{{--                        <div class="">--}}
{{--                            <a class="btn all-btn-same rounded-3" href="{{ route('designation.create') }}">Add Designation</a>--}}
{{--                        </div>--}}
{{--                    @endif--}}
                </div>
                <!--end breadcrumb-->
                <p class="text-success text-center">{{session('message')}}</p>
                <hr>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
{{--                                @php--}}
{{--                                    $permissionData = json_decode(Auth::user()->permission, true);--}}
{{--                                @endphp--}}
{{--                                @if($permissionData && isset($permissionData['users_all']['user_designation']['designation_number']) && $permissionData['users_all']['user_designation']['designation_number'] == 'designation_number')--}}
                                    <tr>
                                        <th> Designation ID </th>
                                        <td>
                                            {{$outside_user->id}}
                                        </td>
                                    </tr>
{{--                                @endif--}}
                                <tr>
                                    <th> Company Registration Time </th>
                                    <td>
                                        {{$outside_user->created_at->setTimezone('Asia/Dhaka')->format('M d, Y, h:ia')}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Company Logo </th>
                                    <td>
                                        <img src="{{ asset($outside_user->company_logo) }}" alt="" style="height: 100px; width: 100px;">
                                    </td>
                                </tr>
                                <tr>
                                    <th> Company Name </th>
                                    <td>
                                        {{$outside_user->company_name}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Company Email </th>
                                    <td>
                                        {{$outside_user->company_email}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Company Number </th>
                                    <td>
                                        {{$outside_user->company_number}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Company Address </th>
                                    <td>
                                        {{$outside_user->company_address}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Team Manager Name </th>
                                    <td>
                                        {{$outside_user->team_manager_name}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Manager Designation </th>
                                    <td>
                                        {{$outside_user->manager_designation}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Manager Email </th>
                                    <td>
                                        {{$outside_user->manager_email}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Manager Number </th>
                                    <td>
                                        {{$outside_user->manager_number}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Manager Email </th>
                                    <td>
                                        {{$outside_user->manager_email}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Manager Employ ID </th>
                                    <td>
                                        {{$outside_user->manager_employ_id}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Manager Employ ID Image </th>
                                    <td>
                                        <img src="{{ asset($outside_user->manager_employ_id_image) }}" alt="" style="height: 100px; width: 100px;">
                                    </td>
                                </tr>
                                <tr>
                                    <th> Manager Image </th>
                                    <td>
                                        @if($outside_user->manager_photo)
                                            <img src="{{ asset($outside_user->manager_photo) }}" alt="" style="height: 100px; width: 100px;">
                                        @else
                                            No Image Found.
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th> Status</th>
                                    <td>
                                        {{$outside_user->approve_status}}
{{--                                        @if($permissionData && isset($permissionData['users_all']['user_designation']['designation_status']) && $permissionData['users_all']['user_designation']['designation_status'] == 'designation_status')--}}
                                            @if($outside_user->approve_status == 'Waiting')
                                                <a href="{{ route('outsider.change.approve.status', $outside_user->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-success')" class="btn btn-success">Waiting</a>
                                            @elseif($outside_user->approve_status == 'Approved')
                                                <a href="{{ route('outsider.change.approve.status', $outside_user->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">Approved</a>
                                            @elseif($outside_user->approve_status == 'Rejected')
                                                <a href="{{ route('outsider.change.approve.status', $outside_user->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">Rejected</a>
                                            @endif
{{--                                        @endif--}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Restriction</th>
                                    <td>
                                        @if($outside_user->ban_status == 1)
                                            <p>Restricted</p>
                                        @elseif($outside_user->ban_status == 0)
                                            <p>Unrestricted</p>
                                        @endif
                                            @if($outside_user->ban_status == 1)
                                                <a href="{{ route('outsider.change.ban.status', $outside_user->id) }}" onclick="return BanAction(event, 'Are you sure to unrestricted this user?', 'btn-success')" class="btn btn-danger btn-sm">Restricted</a>
                                            @elseif($outside_user->ban_status == 0)
                                                <a href="{{ route('outsider.change.ban.status', $outside_user->id) }}" onclick="return BanAction(event, 'Are you sure to restricted this user?', 'btn-danger')" class="btn btn-success btn-sm">Unrestricted</a>
                                            @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Actions</th>
                                    <td>
                                        <div class="d-flex">
{{--                                            @php--}}
{{--                                                $permissionData = json_decode(Auth::user()->permission, true);--}}
{{--                                            @endphp--}}
{{--                                            @if($permissionData && isset($permissionData['users_all']['user_designation']['designation_edit']) && $permissionData['users_all']['user_designation']['designation_edit'] == 'designation_edit')--}}
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Edit">
                                                <a href="{{route('outsider.user.admin.edit', Crypt::encryptString($outside_user->id) )}}" class="text-warning mx-2"><i class="fa fa-edit"></i></a>
                                            </span>
{{--                                            @endif--}}
{{--                                            @if($permissionData && isset($permissionData['users_all']['user_designation']['designation_delete']) && $permissionData['users_all']['user_designation']['designation_delete'] == 'designation_delete')--}}
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Delete">
                                                <form action="{{ route('outsider.user.delete', $outside_user->id )}}" method="post" id="deleteForm{{ $outside_user->id }}" >
                                                    @csrf

                                                    <button class="text-danger border-0 mx-2" type="button" onclick="return deleteAction('{{ $outside_user->id }}', 'Are you sure to delete this designation?', 'btn-danger')">
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

            <p class="mb-0 py-2 text-center fw-bold" style="color: #F8C243; font-size: 24px;"> Coach </p>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom w-100" id="responsive-datatable" style="width:100%">
                            <thead>
                            <tr>
                                <th> SL </th>
                                <th> Company Name </th>
                                <th> Coach Name </th>
                                <th> Coach Employ ID </th>
                                <th> Coach Photo </th>
                                <th> Coach Status </th>
                                <th> Actions </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($outside_user_coaches as $coach)
                                <tr>
                                    <td>
                                        {{$loop->iteration}}
                                    </td>
                                    <td>
                                        {{ $coach->outside_user->company_name }}
                                    </td>
                                    <td>
                                        {{$coach->name}}
                                    </td>
                                    <td>
                                        {{$coach->employ_id}}
                                    </td>
                                    <td>
                                        <img src="{{ asset( $coach->image ) }}" alt="" style="height: 50px; width: auto;">
                                    </td>
                                    <td>
                                        {{$coach->status}}
                                    </td>
                                    <td>
                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Company Detail">
                                            <a href="{{ route('admin.outsider.user.coach.show', Crypt::encryptString($coach->id)) }}" class="btn btn-bitbucket btn-sm">
                                                <i class="fa fa-solid fa-eye"></i>
                                            </a>
                                        </span>
                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Edit">
                                            <a href="{{route('admin.outsider.user.coach.edit', Crypt::encryptString($coach->id))}}" class="btn btn-secondary btn-sm text-warning mx-1"><i class="fa fa-edit"></i></a>
                                        </span>
                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Company Delete">
                                            <form action="{{ route('admin.outsider.user.coach.delete', $coach->id) }}" id="deleteForm{{ $coach->id }}" method="POST" style="display: inline;">
                                                @csrf

                                                <button type="button" class="btn btn-danger btn-sm" onclick="return deleteAction('{{ $coach->id }}', 'Are you sure to delete this coach?', 'btn-danger')">
                                                    <i class="fa fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </span>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <p class="mb-0 py-2 text-center fw-bold" style="color: #F8C243; font-size: 24px;"> Players </p>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom w-100" id="file-datatable" style="width:100%">
                            <thead>
                            <tr>
                                <th> SL </th>
                                <th> Company Name </th>
                                <th> Player Name </th>
                                <th> Player Employ ID </th>
                                <th> Player Photo </th>
                                <th> Player Status </th>
                                <th> Actions </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($outside_user_players as $player)
                                <tr>
                                    <td>
                                        {{$loop->iteration}}
                                    </td>
                                    <td>
                                        {{ $player->outside_user->company_name }}
                                    </td>
                                    <td>
                                        {{$player->name}}
                                    </td>
                                    <td>
                                        {{$player->employ_id}}
                                    </td>
                                    <td>
                                        <img src="{{ asset( $player->image ) }}" alt="" style="height: 50px; width: auto;">
                                    </td>
                                    <td>
                                        {{$player->status}}

                                    </td>
                                    <td>
                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Company Detail">
                                                <a href="{{ route('admin.outsider.user.player.show', Crypt::encryptString($player->id)) }}" class="btn btn-bitbucket btn-sm">
                                                    <i class="fa fa-solid fa-eye"></i>
                                                </a>
                                            </span>
                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Edit">
                                            <a href="{{route('admin.outsider.user.player.edit', Crypt::encryptString($player->id))}}" class="btn btn-secondary btn-sm text-warning mx-1"><i class="fa fa-edit"></i></a>
                                        </span>
                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Company Delete">
                                            <form action="{{ route('admin.outsider.user.player.delete', $player->id) }}" id="deleteForm{{ $player->id }}" method="POST" style="display: inline;">
                                                @csrf

                                                <button type="button" class="btn btn-danger btn-sm" onclick="return deleteAction('{{ $player->id }}', 'Are you sure to delete this player?', 'btn-danger')">
                                                    <i class="fa fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </span>
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
