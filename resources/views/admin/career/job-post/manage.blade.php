@extends('admin.master')

@section('title')
    Job Posts
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
                            <li class="breadcrumb-item active" aria-current="page">Manage Job Posts</li>
                        </ol>
                    </nav>
                </div>
            </div>
            @php
                $permissionData = json_decode(Auth::user()->permission, true);
            @endphp
            @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_create']) && $permissionData['blogs_all']['blogs']['blog_create'] == 'blog_create')
                <div class="">
                    <a class="btn all-btn-same rounded-3" href="{{ route('career-job.create') }}">Add Job Post</a>
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
                    <table class="table table-bordered text-nowrap border-bottom w-100" id="file-datatable" style="width:100%">
                        <thead>
                        <tr>
                            <th> SL </th>
                            @php
                                $permissionData = json_decode(Auth::user()->permission, true);
                            @endphp
                            <th> Job ID </th>
                            <th> Job Title </th>
                            @if($permissionData && isset($permissionData['career_all']['job_post_all']['job_post_status']) && $permissionData['career_all']['job_post_all']['job_post_status'] == 'job_post_status')
                                <th> Job Status </th>
                            @endif
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($career_job_posts as $job)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
{{--                                @php--}}
{{--                                    $permissionData = json_decode(Auth::user()->permission, true);--}}
{{--                                @endphp--}}
{{--                                @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_number']) && $permissionData['blogs_all']['blogs']['blog_number'] == 'blog_number')--}}
                                    <td>
                                        {{$job->prefix_id}}
                                    </td>
{{--                                @endif--}}
                                <td>
                                    {{$job->job_title}}
                                </td>
                                @php
                                    $permissionData = json_decode(Auth::user()->permission, true);
                                @endphp
                                @if($permissionData && isset($permissionData['career_all']['job_post_all']['job_post_status']) && $permissionData['career_all']['job_post_all']['job_post_status'] == 'job_post_status')
                                    <td>
                                        @if(now()->greaterThan($job->deadline))
                                            Expired
                                        @else
                                                @if($job->status == 'Publish')
                                                    <a href="{{ route('change.status.job', $job->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-success')" class="btn btn-success">Publish</a>
                                                @elseif($job->status == 'UnPublish')
                                                    <a href="{{ route('change.status.job', $job->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">UnPublish</a>
                                                @elseif($job->status == 'Draft')
                                                    <a href="{{ route('change.status.job', $job->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">Draft</a>
                                                @endif
                                        @endif
                                    </td>
                                @endif
                                <td>
                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                        @php
                                            $permissionData = json_decode(Auth::user()->permission, true);
                                        @endphp
                                        @if($permissionData && isset($permissionData['career_all']['job_post_all']['job_post_preview']) && $permissionData['career_all']['job_post_all']['job_post_preview'] == 'job_post_preview')
                                            <span class="d-inline-block ms-2" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Preview">
                                                <a href="{{route('career-job.preview', Crypt::encryptString($job->id))}}" target="_blank" class="text-gray mx-1"><i class="fa fa-eye"></i></a>
                                            </span>
                                        @endif
                                        @if($permissionData && isset($permissionData['career_all']['job_post_all']['job_post_detail']) && $permissionData['career_all']['job_post_all']['job_post_detail'] == 'job_post_detail')
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="View">
                                                <a href="{{route('career-job.show', Crypt::encryptString($job->id))}}" class="text-primary mx-1"><i class="fa fa-eye"></i></a>
                                            </span>
                                        @endif
                                        @if($permissionData && isset($permissionData['career_all']['job_post_all']['job_post_edit']) && $permissionData['career_all']['job_post_all']['job_post_edit'] == 'job_post_edit')
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Edit">
                                                <a href="{{route('career-job.edit', Crypt::encryptString($job->id))}}" class="text-warning mx-1"><i class="fa fa-edit"></i></a>
                                            </span>
                                        @endif
                                        @if($permissionData && isset($permissionData['career_all']['job_post_all']['job_post_delete']) && $permissionData['career_all']['job_post_all']['job_post_delete'] == 'job_post_delete')
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Delete">
                                                <form action="{{ route('career-job.destroy', $job->id )}}" method="post" id="deleteForm{{ $job->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-danger border-0" type="submit" onclick="return deleteAction('{{ $job->id }}', 'Are you sure to delete this blog?', 'btn-danger')">
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
