@extends('admin.master')

@section('title')
    Coach Details
@endsection

@section('content')

    <section class="my-5">
        <div class="container">
            <div class="row">
                <!--breadcrumb-->
                <div class="d-flex justify-content-between">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">
                            <a href="{{ route('outsider.user.index') }}">Manage Coach</a>
                        </div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Coach Detail</li>
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
                                    <th> Coach ID </th>
                                    <td>
                                        {{$outside_user_coach->id}}
                                    </td>
                                </tr>
                                {{--                                @endif--}}
                                <tr>
                                    <th> Coach Registration Time </th>
                                    <td>
                                        {{$outside_user_coach->created_at->setTimezone('Asia/Dhaka')->format('M d, Y, h:ia')}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Company Name </th>
                                    <td>
                                        {{$outside_user_coach->outside_user->company_name}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Name </th>
                                    <td>
                                        {{$outside_user_coach->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Email </th>
                                    <td>
                                        {{$outside_user_coach->email}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Number </th>
                                    <td>
                                        {{$outside_user_coach->number}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Coach Photo </th>
                                    <td>
                                        <img src="{{ asset($outside_user_coach->image) }}" alt="" style="height: 100px; width: 100px;">
                                    </td>
                                </tr>
                                <tr>
                                    <th> Designation </th>
                                    <td>
                                        {{$outside_user_coach->designation}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Employ ID </th>
                                    <td>
                                        {{$outside_user_coach->employ_id}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Employ ID Image </th>
                                    <td>
                                        <img src="{{ asset($outside_user_coach->employ_id_image) }}" alt="" style="height: 100px; width: 100px;">
                                    </td>
                                </tr>
                                <tr>
                                    <th> Status</th>
                                    <td>
                                        {{$outside_user_coach->status}}
                                        {{--                                        @if($permissionData && isset($permissionData['users_all']['user_designation']['designation_status']) && $permissionData['users_all']['user_designation']['designation_status'] == 'designation_status')--}}
                                        @if($outside_user_coach->status == 'Waiting')
                                            <a href="{{ route('admin.outsider.user.coach.status', $outside_user_coach->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-success')" class="btn btn-success">Waiting</a>
                                        @elseif($outside_user_coach->status == 'Approved')
                                            <a href="{{ route('admin.outsider.user.coach.status', $outside_user_coach->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">Approved</a>
                                        @elseif($outside_user_coach->status == 'Rejected')
                                            <a href="{{ route('admin.outsider.user.coach.status', $outside_user_coach->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">Rejected</a>
                                        @endif
                                        {{--                                        @endif--}}
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
                                                <a href="{{route('admin.outsider.user.coach.edit', Crypt::encryptString($outside_user_coach->id) )}}" class="text-warning mx-2"><i class="fa fa-edit"></i></a>
                                            </span>
                                            {{--                                            @endif--}}
                                            {{--                                            @if($permissionData && isset($permissionData['users_all']['user_designation']['designation_delete']) && $permissionData['users_all']['user_designation']['designation_delete'] == 'designation_delete')--}}
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Delete">
                                                <form action="{{ route('admin.outsider.user.coach.delete', $outside_user_coach->id )}}" method="post" id="deleteForm{{ $outside_user_coach->id }}" >
                                                    @csrf

                                                    <button class="text-danger border-0 mx-2" type="button" onclick="return deleteAction('{{ $outside_user_coach->id }}', 'Are you sure to delete this coach?', 'btn-danger')">
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


