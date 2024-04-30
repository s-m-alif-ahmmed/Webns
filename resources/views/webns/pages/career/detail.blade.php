@extends('webns.master')

@section('title')
    job Post Detail
@endsection

@section('meta-info')
    <meta name="author" content="SemiColonWeb">
    <meta name="description" content="Get Canvas to build powerful websites easily with the Highly Customizable &amp; Best Selling Bootstrap Template, today.">
@endsection

@section('content')

    {{--    Left Side Social Icon--}}
    <section class="left-social-icons">
        @include('webns.include.left-side-social-icon')
    </section>

    <section class="py-5">

        <div class="container-fluid pb-3 mb-2">
            <div class="row">
                <div class="col-md-12 p-0 text-center">
                    <div class="top-text" style="height: 100px; position: relative; overflow: hidden;">
                        <p class="fw-900 text-uppercase heading-down-style">Job Post</p>
                        <p class="fw-900 top-contact text-capitalize heading-top-style">Build your career with us</p>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center p-0 m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}" style="color: var(--ash)!important; font-size: 14px; position: relative; z-index: 3;">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('career') }}" style="color: var(--ash)!important; font-size: 14px; position: relative; z-index: 3;">Career</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <span style="font-size: 14px; position: relative; z-index: 3;">
                                         Job Post
                                    </span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        @if($career_job_post->status == 'Publish')
            <div class="container">
                <div class="row career-detail-order">
                    <div class="col-md-4 order-md-1">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="">
                                        <div class="pb-3 px-3">
                                            <h4 class="fw-900" style="color: var(--yellow);">Job Summary</h4>
                                        </div>
                                        <div class="p-3">
                                            <div class="" style="line-height: 10px!important;">
                                                <p class="fw-bold fw-700" style="color: var(--black);font-size: 18px !important;">Published On</p>
                                                <p class="fw-500" style="color: var(--black);font-size: 16px !important;">{{$career_job_post->created_at->setTimezone('Asia/Dhaka')->format('M d, Y')}}</p>
                                            </div>
                                            <div class="department-line-name mb-3" style="color: var(--ash);"></div>
                                            <div class="" style="line-height: 10px!important;">
                                                <p class="fw-bold fw-700" style="color: var(--black);font-size: 18px !important;">Vacancy</p>
                                                <p class="fw-500" style="color: var(--black);font-size: 16px !important;">{{$career_job_post->vacancy}}</p>
                                            </div>
                                            <div class="department-line-name mb-3" style="color: var(--ash);"></div>
                                            <div class="" style="line-height: 10px!important;">
                                                <p class="fw-bold fw-700" style="color: var(--black);font-size: 18px !important;">Employment Status</p>
                                                <p class="fw-500" style="color: var(--black);font-size: 16px !important;">{{$career_job_post->job_type}}</p>
                                            </div>
                                            <div class="department-line-name mb-3" style="color: var(--ash);"></div>
                                            <div class="" style="line-height: 10px!important;">
                                                <p class="fw-bold fw-700" style="color: var(--black);font-size: 18px !important;">Experience</p>
                                                <p class="fw-500" style="color: var(--black);font-size: 16px !important;">{{$career_job_post->experience}}</p>
                                            </div>
                                            <div class="department-line-name mb-3" style="color: var(--ash);"></div>
                                            <div class="" style="line-height: 10px!important;">
                                                <p class="fw-bold fw-700" style="color: var(--black);font-size: 18px !important;">Job Location</p>
                                                <p class="fw-500" style="color: var(--black);font-size: 16px !important;">{{$career_job_post->location}}</p>
                                            </div>
                                            <div class="department-line-name mb-3" style="color: var(--ash);"></div>
                                            <div class="" style="line-height: 10px!important;">
                                                <p class="fw-bold fw-700" style="color: var(--black);font-size: 18px !important;">Salary</p>
                                                <p class="fw-500" style="color: var(--black);font-size: 16px !important;">{{$career_job_post->salary}}</p>
                                            </div>
                                            <div class="department-line-name mb-3" style="color: var(--ash);"></div>
                                            <div class="" style="line-height: 10px!important;">
                                                <p class="fw-bold fw-700" style="color: var(--black);font-size: 18px !important;">Application Deadline</p>
                                                <p class="fw-500" style="color: var(--black);font-size: 16px !important;">{{$career_job_post->deadline}}</p>
                                            </div>
                                            <div class="department-line-name mb-3" style="color: var(--ash);"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="pb-3" style="margin: -20px 0 0 0;">
                                    <div class="text-center">
                                        <a href="{{ route('career.job.application', $career_job_post->slug_job_title) }}" class="btn custom-btn-9">
                                            Apply
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="col-md-12">-->
                            <!--    <div class="card mb-3 custom-left-shadow-light">-->
                            <!--        <div class="p-2" style="line-height: 10px;">-->
                            <!--            <p class="text-center pt-1 fw-700" style="font-size: 20px;">Share Job Post</p>-->
                            <!--            <ul class="nav d-flex justify-content-center" style="z-index: 1;">-->
                            <!--                <li class="nav-item">-->
                            <!--                    <a href="" class="nav-link">-->
                            <!--                        <i class="fa-brands fa-square-facebook share-icon-facebook" style="color: var(--ash); font-size: 22px;"></i>-->
                            <!--                    </a>-->
                            <!--                </li>-->
                            <!--                <li class="nav-item">-->
                            <!--                    <a href="" class="nav-link">-->
                            <!--                        <i class="fa-brands fa-linkedin share-icon-linkedin" style="color: var(--ash); font-size: 22px;"></i>-->
                            <!--                    </a>-->
                            <!--                </li>-->
                            <!--                <li class="nav-item">-->
                            <!--                    <a href="" class="nav-link">-->
                            <!--                        <i class="fa-brands fa-square-x-twitter share-icon-x-twitter" style="color: var(--ash); font-size: 22px;"></i>-->
                            <!--                    </a>-->
                            <!--                </li>-->
                            <!--                <li class="nav-item">-->
                            <!--                    <a href="" class="nav-link">-->
                            <!--                        <i class="fa-brands fa-square-whatsapp share-icon-whatsapp" style="color: var(--ash); font-size: 22px;"></i>-->
                            <!--                    </a>-->
                            <!--                </li>-->
                            <!--                <li class="nav-item">-->
                            <!--                    <a href="" class="nav-link">-->
                            <!--                        <i class="fa-solid fa-link share-icon-link" style="color: var(--ash); font-size: 22px;"></i>-->
                            <!--                    </a>-->
                            <!--                </li>-->
                            <!--            </ul>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="col-md-8 order-md-2">
                        <div class="card custom-left-shadow-light">
                            <div class="p-5">
                                <h4>
                                    <div class="" style="line-height: 10px !important;">

                                        <h1 class="fw-700" style="font-size: 28px!important;">
                                            {{$career_job_post->job_title}}
                                        </h1>
                                        <p class="fw-500" style="font-size: 16px!important;">
                                            {{$career_job_post->career_department->name}}
                                        </p>
                                    </div>
                                </h4>
                                <hr>
                                <span style="line-height: 22px!important;">{!! $career_job_post->job_description !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </section>

@endsection


