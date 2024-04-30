@extends('admin.master')

@section('title')

    Departments

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
                            <li class="breadcrumb-item active" aria-current="page">Manage Department</li>
                        </ol>
                    </nav>
                </div>
            </div>
            @php
                $permissionData = json_decode(Auth::user()->permission, true);
            @endphp
            @if($permissionData && isset($permissionData['users_all']['user_department']['department_create']) && $permissionData['users_all']['user_department']['department_create'] == 'department_create')
                <div class="">
                    <a class="btn all-btn-same rounded-3" href="{{ route('department.create') }}">Add Department</a>
                </div>
            @endif
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
                            <th> SL </th>
                            @php
                                $permissionData = json_decode(Auth::user()->permission, true);
                            @endphp
                            @if($permissionData && isset($permissionData['users_all']['user_department']['department_number']) && $permissionData['users_all']['user_department']['department_number'] == 'department_number')
                                <th> Department ID </th>
                            @endif
                            <th> Department Name </th>
                            @if($permissionData && isset($permissionData['users_all']['user_department']['department_status']) && $permissionData['users_all']['user_department']['department_status'] == 'department_status')
                                <th> Department Status </th>
                            @endif
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($departments as $department)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                @php
                                    $permissionData = json_decode(Auth::user()->permission, true);
                                @endphp
                                @if($permissionData && isset($permissionData['users_all']['user_department']['department_number']) && $permissionData['users_all']['user_department']['department_number'] == 'department_number')
                                    <td>
                                        {{$department->id}}
                                    </td>
                                @endif
                                <td>
                                    {{$department->name}}
                                </td>
                                @if($permissionData && isset($permissionData['users_all']['user_department']['department_status']) && $permissionData['users_all']['user_department']['department_status'] == 'department_status')
                                <td>
                                    @if($department->status == 'active')
                                        <a href="{{ route('status.department', $department->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-success')" class="btn btn-success">Active</a>
                                    @else($department->status == 'inActive')
                                        <a href="{{ route('status.department', $department->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">InActive</a>
                                    @endif
                                </td>
                                @endif
                                <td>
                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                        @php
                                            $permissionData = json_decode(Auth::user()->permission, true);
                                        @endphp
                                        @if($permissionData && isset($permissionData['users_all']['user_department']['department_detail']) && $permissionData['users_all']['user_department']['department_detail'] == 'department_detail')
                                            <span class="d-inline-block ms-2" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="View">
                                                <a href="{{route('department.show', Crypt::encryptString($department->id))}}" class="text-primary mx-1"><i class="fa fa-eye"></i></a>
                                            </span>
                                        @endif
                                        @if($permissionData && isset($permissionData['users_all']['user_department']['department_edit']) && $permissionData['users_all']['user_department']['department_edit'] == 'department_edit')
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Edit">
                                                <a href="{{route('department.edit', Crypt::encryptString($department->id))}}" class="text-warning mx-1"><i class="fa fa-edit"></i></a>
                                            </span>
                                        @endif
                                        @if($permissionData && isset($permissionData['users_all']['user_department']['department_delete']) && $permissionData['users_all']['user_department']['department_delete'] == 'department_delete')
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Delete">
                                                <form action="{{ route('department.destroy', $department->id )}}" id="deleteForm{{ $department->id }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-danger border-0" type="button" onclick="return deleteAction('{{ $department->id }}', 'Are you sure to delete this department?', 'btn-danger')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </span>
                                        @endif
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
