@extends('admin.master')

@section('title')
    Designation Details
@endsection

@section('content')

    <section class="my-5">
        <div class="container">
            <div class="row">
                <!--breadcrumb-->
                <div class="d-flex justify-content-between">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">
                            <a href="{{ route('designation.index') }}">Designation</a>
                        </div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Manage Designation</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    @php
                        $permissionData = json_decode(Auth::user()->permission, true);
                    @endphp
                    @if($permissionData && isset($permissionData['users_all']['user_designation']['designation_create']) && $permissionData['users_all']['user_designation']['designation_create'] == 'designation_create')
                        <div class="">
                            <a class="btn all-btn-same rounded-3" href="{{ route('designation.create') }}">Add Designation</a>
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
                                @if($permissionData && isset($permissionData['users_all']['user_designation']['designation_number']) && $permissionData['users_all']['user_designation']['designation_number'] == 'designation_number')
                                    <tr>
                                        <th> Designation ID </th>
                                        <td>
                                            {{$designation->id}}
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <th> Department Name </th>
                                    <td>
                                        {{$designation->department->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Designation Name </th>
                                    <td>
                                        {{$designation->name}}
                                    </td>
                                </tr>
                                    <tr>
                                        <th> Designation Status</th>
                                        <td>
                                            {{$designation->status}}
                                            @if($permissionData && isset($permissionData['users_all']['user_designation']['designation_status']) && $permissionData['users_all']['user_designation']['designation_status'] == 'designation_status')
                                                @if($designation->status == 'active')
                                                    <a href="{{ route('status.designation', $designation->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-success')" class="btn btn-success">Active</a>
                                                @else($designation->status == 'inActive')
                                                    <a href="{{ route('status.designation', $designation->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">InActive</a>
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
                                            @if($permissionData && isset($permissionData['users_all']['user_designation']['designation_edit']) && $permissionData['users_all']['user_designation']['designation_edit'] == 'designation_edit')
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Edit">
                                                <a href="{{route('designation.edit', Crypt::encryptString($designation->id) )}}" class="text-warning mx-2"><i class="fa fa-edit"></i></a>
                                            </span>
                                            @endif
                                            @if($permissionData && isset($permissionData['users_all']['user_designation']['designation_delete']) && $permissionData['users_all']['user_designation']['designation_delete'] == 'designation_delete')
                                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Delete">
                                                <form action="{{ route('designation.destroy', $designation->id )}}" method="post" id="deleteForm{{ $designation->id }}" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-danger border-0 mx-2" type="button" onclick="return deleteAction('{{ $designation->id }}', 'Are you sure to delete this designation?', 'btn-danger')">
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
