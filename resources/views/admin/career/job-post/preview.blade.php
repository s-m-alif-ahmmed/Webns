@extends('admin.master')

@section('title')
    Job Post Preview
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
                            <li class="breadcrumb-item active" aria-current="page">Job Post Preview Page</li>
                        </ol>
                    </nav>
                </div>
            </div>
{{--            @php--}}
{{--                $permissionData = json_decode(Auth::user()->permission, true);--}}
{{--            @endphp--}}
{{--            @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_create']) && $permissionData['blogs_all']['blogs']['blog_create'] == 'blog_create')--}}
                <div class="">
                    <a class="btn all-btn-same rounded-3" href="{{ route('career-job.create') }}">Add Job Post</a>
                </div>
{{--            @endif--}}
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-muted">{{session('message')}}</p>

        <hr/>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="p-3">
                                    <h3 class="job-summary-text">Job Summary</h3>
                                    <h6 class="fw-bold">Published On</h6>
                                    <p>{{$career_job_post->created_at->setTimezone('Asia/Dhaka')->format('M d, Y')}}</p>
                                    <hr>
                                    <h6 class="fw-bold">Vacancy</h6>
                                    <p>{{$career_job_post->vacancy}}</p>
                                    <hr>
                                    <h6 class="fw-bold">Employment Status</h6>
                                    <p>{{$career_job_post->job_type}}</p>
                                    <hr>
                                    <h6 class="fw-bold">Experience</h6>
                                    <p>{{$career_job_post->experience}}</p>
                                    <hr>
                                    <h6 class="fw-bold">Job Location</h6>
                                    <p>{{$career_job_post->location}}</p>
                                    <hr>
                                    <h6 class="fw-bold">Salary</h6>
                                    <p>{{$career_job_post->salary}}</p>
                                    <hr>
                                    <h6 class="fw-bold">Application Deadline</h6>
                                    <p>{{$career_job_post->deadline}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="p-3 text-center">
                                    <a href="#" class="btn btn-warning fw-bold px-5 py-2">Apply</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="p-3">
                                    <h4 class="text-center">Share Job Post</h4>
                                    <ul class="d-flex justify-content-center">
                                        <li class="p-3">
                                            <a href="">
                                                <i class="fa fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="p-3">
                                            <a href="">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li class="p-3">
                                            <a href="">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="p-3">
                                            <a href="">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="p-3">
                            <h3 class="fw-bold">{{ $career_job_post->job_title }}</h3>
                            <p>{{ $career_job_post->career_department->name }}</p>
                            <hr>
                            <span>{!! $career_job_post->job_description !!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

