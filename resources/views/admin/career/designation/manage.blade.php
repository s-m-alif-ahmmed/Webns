@extends('admin.master')

@section('title')

    Designations

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
                            <li class="breadcrumb-item">
                                <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('career-department.index') }}">Department</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Designation</li>
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
                            <th> Department Name </th>
                            <th> Designation Name </th>
                            <th> Prefix ID </th>
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($career_designations as $designation)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    @if($designation->career_department)
                                        {{$designation->career_department->name}}
                                    @else
                                        No Department
                                    @endif
                                </td>
                                <td>{{$designation->name}}</td>
                                <td>{{$designation->prefix_id}}</td>
                                <td>
                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                        @php
                                            $permissionData = json_decode(Auth::user()->permission, true);
                                        @endphp
                                        @if($permissionData && isset($permissionData['career_all']['career_designation']['designation_detail']) && $permissionData['career_all']['career_designation']['designation_detail'] == 'designation_detail')
                                            <span class="d-inline-block ms-2" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="View">
                                                <a href="{{route('career-designation.show', Crypt::encryptString($designation->id))}}" class="text-primary mx-1"><i class="fa fa-eye"></i></a>
                                            </span>
                                        @endif
                                        @if($permissionData && isset($permissionData['career_all']['career_designation']['designation_edit']) && $permissionData['career_all']['career_designation']['designation_edit'] == 'designation_edit')
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Edit">
                                                <a href="{{route('career-designation.edit', Crypt::encryptString($designation->id))}}" class="text-warning mx-1"><i class="fa fa-edit"></i></a>
                                            </span>
                                        @endif
                                        @if($permissionData && isset($permissionData['career_all']['career_designation']['designation_delete']) && $permissionData['career_all']['career_designation']['designation_delete'] == 'designation_delete')
                                             <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Delete">
                                                <form action="{{ route('career-designation.destroy', $designation->id )}}" method="post" id="deleteForm{{ $designation->id }}" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-danger border-0" type="button" onclick="return deleteAction('{{ $designation->id }}', 'Are you sure to delete this designation?', 'btn-danger')">
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
