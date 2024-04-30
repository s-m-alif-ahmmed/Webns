@extends('admin.master')

@section('title')
    Department Details
@endsection

@section('content')

    <section class="my-5">
        <div class="container">
            <div class="row">
                <!--breadcrumb-->
                <div class="d-flex justify-content-between">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">
                            <a href="{{ route('department.index') }}">Department</a>
                        </div>
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
                <p class="text-success text-center">{{session('message')}}</p>
                <hr>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                @php
                                    $permissionData = json_decode(Auth::user()->permission, true);
                                @endphp
                                @if($permissionData && isset($permissionData['users_all']['user_department']['department_number']) && $permissionData['users_all']['user_department']['department_number'] == 'department_number')
                                <tr>
                                    <th> Department ID </th>
                                    <td>{{$department->id}}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th> Department Name </th>
                                    <td>
                                        {{$department->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Department Status</th>
                                    <td>
                                        {{$department->status}}
                                        @php
                                            $permissionData = json_decode(Auth::user()->permission, true);
                                        @endphp
                                        @if($permissionData && isset($permissionData['users_all']['user_department']['department_status']) && $permissionData['users_all']['user_department']['department_status'] == 'department_status')
                                            @if($department->status == 'active')
                                                <a href="{{ route('status.department', $department->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-success')" class="btn btn-success">Change</a>
                                            @else($department->status == 'inActive')
                                                <a href="{{ route('status.department', $department->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">Change</a>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Actions</th>
                                    <td>
                                        <div class="d-flex">
                                            @php
                                                $permissionData = json_decode(Auth::user()->permission, true);
                                            @endphp
                                            @if($permissionData && isset($permissionData['users_all']['user_department']['department_edit']) && $permissionData['users_all']['user_department']['department_edit'] == 'department_edit')
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Edit">
                                                    <a href="{{route('department.edit', Crypt::encryptString($department->id) )}}" class="text-warning mx-2"><i class="fa fa-edit"></i></a>
                                                </span>
                                            @endif
                                            @if($permissionData && isset($permissionData['users_all']['user_department']['department_delete']) && $permissionData['users_all']['user_department']['department_delete'] == 'department_delete')
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Delete">
                                                    <form action="{{ route('department.destroy', $department->id )}}" method="post" id="deleteForm{{ $department->id }}" >
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="text-danger border-0 mx-2" type="button" onclick="return deleteAction('{{ $department->id }}','Are you sure to delete this department?')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </span>
                                            @endif
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
