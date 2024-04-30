@extends('admin.master')

@section('title')
    Job Post Details
@endsection

@section('content')

    <section class="py-5">
        <!--breadcrumb-->
        <div class="d-flex justify-content-between">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">
                    <a href="{{ route('career-job.index') }}">Job Post</a>
                </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Job Post Detail Page</li>
                        </ol>
                    </nav>
                </div>
            </div>
            @php
                $permissionData = json_decode(Auth::user()->permission, true);
            @endphp
            @if($permissionData && isset($permissionData['career_all']['job_post_all']['job_post_create']) && $permissionData['career_all']['job_post_all']['job_post_create'] == 'job_post_create')
                <div class="">
                    <a class="btn all-btn-same rounded-3" href="{{ route('career-job.create') }}">Add Job Post</a>
                </div>
            @endif
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-muted">{{session('message')}}</p>

        <hr/>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header fs-3 fw-bold">Job Post Details Page</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th> Job Post Create Date </th>
                                    <td>
                                        {{ $career_job_post->created_at->setTimezone('Asia/Dhaka')->format('M d, Y, h:ia') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Job Post Id </th>
                                    <td>{{$career_job_post->id}}</td>
                                </tr>
                                <tr>
                                    <th> Job Department </th>
                                    <td>{{$career_job_post->career_department->name}}</td>
                                </tr>
                                <tr>
                                    <th> Job Designation </th>
                                    <td>{{$career_job_post->career_designation->name}}</td>
                                </tr>
                                <tr>
                                    <th> Job Prefix ID </th>
                                    <td>{{$career_job_post->prefix_id}}</td>
                                </tr>
                                <tr>
                                    <th> Job Title </th>
                                    <td>{{$career_job_post->job_title}}</td>
                                </tr>
                                <tr>
                                    <th> Job Post Url </th>
                                    <td>{{$career_job_post->slug_job_title}}</td>
                                </tr>
                                <tr>
                                    <th> Job Type </th>
                                    <td>{{$career_job_post->job_type}}</td>
                                </tr>
                                <tr>
                                    <th> Job Vacancy </th>
                                    <td>{{$career_job_post->vacancy}}</td>
                                </tr>
                                <tr>
                                    <th> Years of Experience</th>
                                    <td>
                                        {{$career_job_post->experience}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Job Location </th>
                                    <td>{{$career_job_post->location}}</td>
                                </tr>
                                <tr>
                                    <th> Salary Range</th>
                                    <td>
                                        {{$career_job_post->salary}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Job Post Details </th>
                                    <td>
                                        <textarea id="editor" cols="30" rows="10" disabled>{{$career_job_post->job_description}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th> Application Deadline</th>
                                    <td>
                                        {{$career_job_post->deadline}}
                                    </td>
                                </tr>
                                    <tr>
                                        <th> Job Post Status</th>
                                        <td>
                                            {{$career_job_post->status}}
                                            @php
                                                $permissionData = json_decode(Auth::user()->permission, true);
                                            @endphp
                                            @if($permissionData && isset($permissionData['career_all']['job_post_all']['job_post_status']) && $permissionData['career_all']['job_post_all']['job_post_status'] == 'job_post_status')
                                                @if($career_job_post->status == 'Publish')
                                                    <a href="{{ route('change.status.job', $career_job_post->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-success')" class="btn btn-success">Publish</a>
                                                @elseif($career_job_post->status == 'UnPublish')
                                                    <a href="{{ route('change.status.job', $career_job_post->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">UnPublish</a>
                                                @elseif($career_job_post->status == 'Draft')
                                                    <a href="{{ route('change.status.job', $career_job_post->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">Draft</a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                <tr>
                                    <th>Action</th>
                                    <td>
                                        <div class="d-flex">
                                            @php
                                                $permissionData = json_decode(Auth::user()->permission, true);
                                            @endphp
                                            @if($permissionData && isset($permissionData['career_all']['job_post_all']['job_post_edit']) && $permissionData['career_all']['job_post_all']['job_post_edit'] == 'job_post_edit')
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Edit">
                                                    <a href="{{route('career-job.edit', Crypt::encryptString($career_job_post->id) )}}" class="text-warning mx-2"><i class="fa fa-edit"></i></a>
                                                </span>
                                            @endif
                                            @if($permissionData && isset($permissionData['career_all']['job_post_all']['job_post_delete']) && $permissionData['career_all']['job_post_all']['job_post_delete'] == 'job_post_delete')
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Delete">
                                                    <form action="{{ route('career-job.destroy', $career_job_post->id )}}" method="post" enctype="multipart/form-data" id="deleteForm{{ $career_job_post->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="text-danger border-0 mx-2" type="submit" onclick="return deleteAction('{{ $career_job_post->id }}', 'Are you sure to delete this blog?', 'btn-danger')">
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
