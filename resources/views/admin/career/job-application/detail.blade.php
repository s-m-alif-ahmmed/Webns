@extends('admin.master')

@section('title')
    Job Application Details
@endsection

@section('content')

    <section class="py-5">
        <!--breadcrumb-->
        <div class="d-flex justify-content-between">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">
                    <a href="{{ route('career-job-application.index') }}">Job Application</a>
                </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Job Application Detail Page</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-muted">{{session('message')}}</p>

        <hr/>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header fs-3 fw-bold">Job Application Details Page</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th> Job Application Create Date </th>
                                    <td>
                                        {{ $career_job_application->created_at->setTimezone('Asia/Dhaka')->format('M d, Y, h:ia') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Job Application Id </th>
                                    <td>
                                        {{$career_job_application->id}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Job Post Title </th>
                                    <td>
                                        {{$career_job_application->career_job_post->job_title}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Job Prefix ID </th>
                                    <td>
                                        {{$career_job_application->prefix_id}}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Job Application Url </th>
                                    <td>{{$career_job_application->slug_job_application}}</td>
                                </tr>
                                <tr>
                                    <th> Full Name </th>
                                    <td>{{$career_job_application->full_name}}</td>
                                </tr>
                                <tr>
                                    <th> Email </th>
                                    <td>{{$career_job_application->email}}</td>
                                </tr>
                                <tr>
                                    <th> Phone Number </th>
                                    <td>0{{$career_job_application->number}}</td>
                                </tr>
                                <tr>
                                    <th> Expected Salary </th>
                                    <td>{{$career_job_application->expected_salary}}</td>
                                </tr>
                                <tr>
                                    <th> Cover Letter </th>
                                    <td>
                                        <textarea class="w-100" rows="5" disabled>{{$career_job_application->cover_letter}}</textarea>
                                    </td>
                                </tr>
                                @php
                                    $permissionData = json_decode(Auth::user()->permission, true);
                                @endphp
                                @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_download']) && $permissionData['career_all']['job_application_all']['job_application_download'] == 'job_application_download')
                                    <tr>
                                        <th> Resume</th>
                                        <td>
                                            <a href="/{{$career_job_application->resume}}" class="btn all-btn-same" download>
                                                <img src="/{{$career_job_application->resume}}" alt="Download" width="104" height="142">
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                                @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_checked']) && $permissionData['career_all']['job_application_all']['job_application_checked'] == 'job_application_checked')
                                    <tr>
                                        <th> Checked </th>
                                        <td>
                                            @if($career_job_application->checked == 'on')
                                                <a href="{{ route('change.status.job.application.checked', $career_job_application->id) }}">
                                                    <div class="main-toggle-group style1 d-flex flex-wrap mt-3">
                                                        <div class="toggle toggle-warning toggle-sm on">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            @elseif($career_job_application->checked == 'off')
                                                <a href="{{ route('change.status.job.application.checked', $career_job_application->id) }}">
                                                    <div class="main-toggle-group style1 d-flex flex-wrap mt-3">
                                                        <div class="toggle toggle-warning toggle-sm off">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                                @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_shortlisted']) && $permissionData['career_all']['job_application_all']['job_application_shortlisted'] == 'job_application_shortlisted')
                                    <tr>
                                        <th> Shortlisted</th>
                                        <td>
                                            @if($career_job_application->shortlisted == 'on')
                                                <a href="{{ route('change.status.job.application.shortlisted', $career_job_application->id) }}">
                                                    <div class="main-toggle-group style1 d-flex flex-wrap mt-3">
                                                        <div class="toggle toggle-warning toggle-sm on">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            @elseif($career_job_application->shortlisted == 'off')
                                                <a href="{{ route('change.status.job.application.shortlisted', $career_job_application->id) }}">
                                                    <div class="main-toggle-group style1 d-flex flex-wrap mt-3">
                                                        <div class="toggle toggle-warning toggle-sm off">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                                @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_interview_call']) && $permissionData['career_all']['job_application_all']['job_application_interview_call'] == 'job_application_interview_call')
                                    <tr>
                                        <th> Interview Call</th>
                                        <td>
                                            @if($career_job_application->interview_call == 'on')
                                                <a href="{{ route('change.status.job.application.interview-call', $career_job_application->id) }}">
                                                    <div class="main-toggle-group style1 d-flex flex-wrap mt-3">
                                                        <div class="toggle toggle-warning toggle-sm on">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            @elseif($career_job_application->interview_call == 'off')
                                                <a href="{{ route('change.status.job.application.interview-call', $career_job_application->id) }}">
                                                    <div class="main-toggle-group style1 d-flex flex-wrap mt-3">
                                                        <div class="toggle toggle-warning toggle-sm off">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                                @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_rejected']) && $permissionData['career_all']['job_application_all']['job_application_rejected'] == 'job_application_rejected')
                                    <tr>
                                        <th> Rejected</th>
                                        <td>
                                            @if($career_job_application->rejected == 'on')
                                                <a href="{{ route('change.status.job.application.rejected', $career_job_application->id) }}">
                                                    <div class="main-toggle-group style1 d-flex flex-wrap mt-3">
                                                        <div class="toggle toggle-warning toggle-sm on">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            @elseif($career_job_application->rejected == 'off')
                                                <a href="{{ route('change.status.job.application.rejected', $career_job_application->id) }}">
                                                    <div class="main-toggle-group style1 d-flex flex-wrap mt-3">
                                                        <div class="toggle toggle-warning toggle-sm off">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                                @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_hired']) && $permissionData['career_all']['job_application_all']['job_application_hired'] == 'job_application_hired')
                                    <tr>
                                        <th> Hired</th>
                                        <td>
                                            @if($career_job_application->hired == 'on')
                                                <a href="{{ route('change.status.job.application.hired', $career_job_application->id) }}">
                                                    <div class="main-toggle-group style1 d-flex flex-wrap mt-3">
                                                        <div class="toggle toggle-warning toggle-sm on">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            @elseif($career_job_application->hired == 'off')
                                                <a href="{{ route('change.status.job.application.hired', $career_job_application->id) }}">
                                                    <div class="main-toggle-group style1 d-flex flex-wrap mt-3">
                                                        <div class="toggle toggle-warning toggle-sm off">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                                @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_delete']) && $permissionData['career_all']['job_application_all']['job_application_delete'] == 'job_application_delete')
                                    <tr>
                                        <th>Action</th>
                                        <td>
                                            <div class="d-flex">
                                               <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Delete">
                                                   <form action="{{ route('career-job-application.destroy', $career_job_application->id )}}" method="post" enctype="multipart/form-data" id="deleteForm{{ $career_job_application->id }}">
                                                       @csrf

                                                       <button class="text-danger border-0 mx-2" type="submit" onclick="return deleteAction('{{ $career_job_application->id }}', 'Are you sure to delete this blog?', 'btn-danger')">
                                                            <i class="fa fa-trash"></i>
                                                       </button>
                                                   </form>
                                               </span>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
