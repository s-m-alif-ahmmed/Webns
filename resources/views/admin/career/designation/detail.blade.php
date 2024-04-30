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
                            <a href="{{ route('career-department.index') }}">Department</a>
                        </div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('career-designation.index') }}"> Manage Designation</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Designation Detail</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    @php
                        $permissionData = json_decode(Auth::user()->permission, true);
                    @endphp
                    @if($permissionData && isset($permissionData['career_all']['career_designation']['designation_create']) && $permissionData['career_all']['career_designation']['designation_create'] == 'designation_create')
                        <div class="">
                            <a class="btn all-btn-same rounded-3" href="{{ route('career-designation.create') }}">Add Designation</a>
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
                                <tr>
                                    <th> Department Name </th>
                                    <td>
                                        {{$career_designation->career_department->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Designation Name </th>
                                    <td>
                                        {{$career_designation->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Prefix ID </th>
                                    <td>
                                        {{$career_designation->prefix_id}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Actions</th>
                                    <td>
                                        <div class="d-flex">
                                            @php
                                                $permissionData = json_decode(Auth::user()->permission, true);
                                            @endphp
                                            @if($permissionData && isset($permissionData['career_all']['career_designation']['designation_edit']) && $permissionData['career_all']['career_designation']['designation_edit'] == 'designation_edit')
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Edit">
                                                    <a href="{{route('career-designation.edit', Crypt::encryptString($career_designation->id) )}}" class="text-warning mx-2"><i class="fa fa-edit"></i></a>
                                                </span>
                                            @endif
                                            @if($permissionData && isset($permissionData['career_all']['career_designation']['designation_delete']) && $permissionData['career_all']['career_designation']['designation_delete'] == 'designation_delete')
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Delete">
                                                    <form action="{{ route('career-designation.destroy', $career_designation->id )}}" method="post" id="deleteForm{{ $career_designation->id }}" >
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="text-danger border-0 mx-2" type="button" onclick="return deleteAction('{{ $career_designation->id }}', 'Are you sure to delete this designation?', 'btn-danger')">
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
