@extends('admin.master')

@section('title')
    Job Applications
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
                            <li class="breadcrumb-item active" aria-current="page">Manage Job Applications</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-muted">{{session('message')}}</p>

        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="p-3">
{{--                    <ul class="navbar-nav applicationFilter float-end">--}}
{{--                        <li class="activeFilter p-2">--}}
{{--                            <a href="#" class="nav-link btn btn-primary fw-bold fw-700 px-2 py-1" data-filter="all" style="color: var(--ash) !important; font-size: 12px !important;">All</a>--}}
{{--                        </li>--}}
{{--                        <div class="department-line-name" style="color: var(--ash);"></div>--}}
{{--                            <li class="nav-item p-2">--}}
{{--                                <a href="#" class="nav-link btn btn-primary fw-bold fw-700 px-2 py-1" data-filter=".checked" style="color: var(--ash);font-size: 12px !important;">Checked </a>--}}
{{--                            </li>--}}
{{--                            <div class="department-line-name" style="color: var(--ash);"></div>--}}
{{--                            <li class="nav-item p-2">--}}
{{--                                <a href="#" class="nav-link btn btn-primary fw-bold fw-700 px-2 py-1" data-filter=".shortlisted" style="color: var(--ash);font-size: 12px !important;">Shortlisted </a>--}}
{{--                            </li>--}}
{{--                            <div class="department-line-name" style="color: var(--ash);"></div>--}}
{{--                            <li class="nav-item p-2">--}}
{{--                                <a href="#" class="nav-link btn btn-primary fw-bold fw-700 px-2 py-1" data-filter=".interview_call" style="color: var(--ash);font-size: 12px !important;">Interview Call </a>--}}
{{--                            </li>--}}
{{--                            <div class="department-line-name" style="color: var(--ash);"></div>--}}
{{--                            <li class="nav-item p-2">--}}
{{--                                <a href="#" class="nav-link btn btn-primary fw-bold fw-700 px-2 py-1" data-filter=".reject" style="color: var(--ash);font-size: 12px !important;">Reject </a>--}}
{{--                            </li>--}}
{{--                            <div class="department-line-name" style="color: var(--ash);"></div>--}}
{{--                            <li class="nav-item p-2">--}}
{{--                                <a href="#" class="nav-link btn btn-primary fw-bold fw-700 px-2 py-1" data-filter=".hired" style="color: var(--ash);font-size: 12px !important;">Hired </a>--}}
{{--                            </li>--}}
{{--                            <div class="department-line-name" style="color: var(--ash);"></div>--}}
{{--                    </ul>--}}
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom w-100" id="file-datatable" style="width:100%">
                        <thead>
                        <tr>
                            <th> SL </th>
                            <th> Job ID </th>
                            @php
                                $permissionData = json_decode(Auth::user()->permission, true);
                            @endphp
                            @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_name']) && $permissionData['career_all']['job_application_all']['job_application_name'] == 'job_application_name')
                                <th> Full Name </th>
                            @endif
                            @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_email']) && $permissionData['career_all']['job_application_all']['job_application_email'] == 'job_application_email')
                                <th> Email </th>
                            @endif
                            @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_checked']) && $permissionData['career_all']['job_application_all']['job_application_checked'] == 'job_application_checked')
                            <th> Checked </th>
                            @endif
                            @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_shortlisted']) && $permissionData['career_all']['job_application_all']['job_application_shortlisted'] == 'job_application_shortlisted')
                                <th> Shortlisted </th>
                            @endif
                            @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_interview_call']) && $permissionData['career_all']['job_application_all']['job_application_interview_call'] == 'job_application_interview_call')
                                <th> Interview Call </th>
                            @endif
                            @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_rejected']) && $permissionData['career_all']['job_application_all']['job_application_rejected'] == 'job_application_rejected')
                                <th> Rejected </th>
                            @endif
                            @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_hired']) && $permissionData['career_all']['job_application_all']['job_application_hired'] == 'job_application_hired')
                                <th> Hired </th>
                            @endif
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody class="applications" id="applications">
                        @foreach($career_job_applications as $job_application)
                            <tr>
                                <td class="px-0 mx-0 text-center">
                                    {{$loop->iteration}}
                                </td>

                                <td class="px-0 mx-0 text-center">
                                    {{ $job_application->prefix_id }}
                                </td>
                                @php
                                    $permissionData = json_decode(Auth::user()->permission, true);
                                @endphp
                                @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_name']) && $permissionData['career_all']['job_application_all']['job_application_name'] == 'job_application_name')
                                    <td class="px-0 mx-0 text-center">
                                        {{$job_application->full_name}}
                                    </td>
                                @endif
                                @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_email']) && $permissionData['career_all']['job_application_all']['job_application_email'] == 'job_application_email')
                                    <td class="px-0 mx-0 text-center">
                                        {{$job_application->email}}
                                    </td>
                                @endif
                                @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_checked']) && $permissionData['career_all']['job_application_all']['job_application_checked'] == 'job_application_checked')
                                    <td class="px-0 mx-0 text-center">
                                        @if($job_application->checked == 'on')
                                            <a href="{{ route('change.status.job.application.checked', $job_application->id) }}">
                                                <div class="main-toggle-group style1 d-flex flex-wrap mt-3">
                                                    <div class="toggle toggle-warning toggle-sm on">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </a>
                                        @elseif($job_application->checked == 'off')
                                            <a href="{{ route('change.status.job.application.checked', $job_application->id) }}">
                                                <div class="main-toggle-group style1 d-flex flex-wrap mt-3">
                                                    <div class="toggle toggle-warning toggle-sm off">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </a>
                                        @endif
                                    </td>
                                @endif
                                @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_shortlisted']) && $permissionData['career_all']['job_application_all']['job_application_shortlisted'] == 'job_application_shortlisted')
                                    <td class="px-0 mx-0 text-center">
                                        @if($job_application->shortlisted == 'on')
                                            <a href="{{ route('change.status.job.application.shortlisted', $job_application->id) }}">
                                                <div class="main-toggle-group style1 d-flex flex-wrap mt-3">
                                                    <div class="toggle toggle-warning toggle-sm on">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </a>
                                        @elseif($job_application->shortlisted == 'off')
                                            <a href="{{ route('change.status.job.application.shortlisted', $job_application->id) }}">
                                                <div class="main-toggle-group style1 d-flex flex-wrap mt-3">
                                                    <div class="toggle toggle-warning toggle-sm off">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </a>
                                        @endif
                                    </td>
                                @endif
                                @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_interview_call']) && $permissionData['career_all']['job_application_all']['job_application_interview_call'] == 'job_application_interview_call')
                                    <td class="px-0 mx-0 text-center">
                                        @if($job_application->interview_call == 'on')
                                            <a href="{{ route('change.status.job.application.interview-call', $job_application->id) }}">
                                                <div class="main-toggle-group style1 d-flex flex-wrap mt-3">
                                                    <div class="toggle toggle-warning toggle-sm on">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </a>
                                        @elseif($job_application->interview_call == 'off')
                                            <a href="{{ route('change.status.job.application.interview-call', $job_application->id) }}">
                                                <div class="main-toggle-group style1 d-flex flex-wrap mt-3">
                                                    <div class="toggle toggle-warning toggle-sm off">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </a>
                                        @endif
                                    </td>
                                @endif
                                @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_rejected']) && $permissionData['career_all']['job_application_all']['job_application_rejected'] == 'job_application_rejected')
                                    <td class="px-0 mx-0 text-center">
                                        @if($job_application->rejected == 'on')
                                            <a href="{{ route('change.status.job.application.rejected', $job_application->id) }}">
                                                <div class="main-toggle-group style1 d-flex flex-wrap mt-3">
                                                    <div class="toggle toggle-warning toggle-sm on">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </a>
                                        @elseif($job_application->rejected == 'off')
                                            <a href="{{ route('change.status.job.application.rejected', $job_application->id) }}">
                                                <div class="main-toggle-group style1 d-flex flex-wrap mt-3">
                                                    <div class="toggle toggle-warning toggle-sm off">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </a>
                                        @endif
                                    </td>
                                @endif
                                @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_hired']) && $permissionData['career_all']['job_application_all']['job_application_hired'] == 'job_application_hired')
                                    <td class="px-0 mx-0 text-center">
                                        @if($job_application->hired == 'on')
                                            <a href="{{ route('change.status.job.application.hired', $job_application->id) }}">
                                                <div class="main-toggle-group style1 d-flex flex-wrap mt-3">
                                                    <div class="toggle toggle-warning toggle-sm on">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </a>
                                        @elseif($job_application->hired == 'off')
                                            <a href="{{ route('change.status.job.application.hired', $job_application->id) }}">
                                                <div class="main-toggle-group style1 d-flex flex-wrap mt-3">
                                                    <div class="toggle toggle-warning toggle-sm off">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </a>
                                        @endif
                                    </td>
                                @endif
                                <td class="px-0 mx-0 text-center">
                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                        @php
                                            $permissionData = json_decode(Auth::user()->permission, true);
                                        @endphp
                                        @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_detail']) && $permissionData['career_all']['job_application_all']['job_application_detail'] == 'job_application_detail')
                                            <span class="d-inline-block ms-2" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="View">
                                                <a href="{{route('career-job-application.show', Crypt::encryptString($job_application->id) )}}" class="text-primary mx-1"><i class="fa fa-eye"></i></a>
                                            </span>
                                        @endif
                                        @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_delete']) && $permissionData['career_all']['job_application_all']['job_application_delete'] == 'job_application_delete')
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Delete">
                                                <form action="{{ route('career-job-application.destroy', $job_application->id )}}" method="post" id="deleteForm{{ $job_application->id }}">
                                                    @csrf

                                                    <button class="text-danger border-0" type="submit" onclick="return deleteAction('{{ $job_application->id }}', 'Are you sure to delete this blog?', 'btn-danger')">
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
