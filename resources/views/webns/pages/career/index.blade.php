@extends('webns.master')

@section('title')
    Career
@endsection

@section('meta-info')
    <meta name="author" content="WEBNS Technology Ltd.">
    <meta name="description" content="WEBNS Technology Ltd.">
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
                        <p class="fw-900 text-uppercase heading-down-style">Career</p>
                        <p class="fw-900 top-contact text-capitalize heading-top-style">Build your career with us</p>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center p-0 m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}" style="color: var(--ash)!important; font-size: 14px; position: relative; z-index: 3;">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <span style="font-size: 14px; position: relative; z-index: 3;">
                                         Career
                                    </span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

            <div class="container">
                <div class="row career-order">

                    @if($career_jop_posts->isEmpty() || $career_jop_posts->every(function($job) { return $job->status != 'Publish'; }) )
                        <div class="col-md-10 mx-auto">
                            <div class="card shadow p-3">
                                <p class="text-center fs-2">No Jobs are Available Right Now</p>
                                <p class="text-center">Currently no jobs are available but, If you are still Interested to build your career with WEBNS Technology Ltd., Share your CV with WEBNS Technology Ltd. and we are always looking for Smart, Energetic & Enthusiastic individuals.</p>
                                <p class="text-center">Email: career@websntech.net</p>
                            </div>
                        </div>
                    @else
                    <div class="col-md-8 order-md-1">
                        <div class="jobs" id="jobs">
                            @foreach($career_jop_posts->sortByDesc('created_at') as $job)
                                @if(now()->greaterThan($job->deadline))
                                @else
                                    @if($job->status == 'Publish')
                                        <div class="card job p-4 mb-3 {{ $job->career_department->slug }} custom-left-shadow-light">
                                            <h4>
                                                <div class="" style="line-height: 1px !important;">
                                                    <p class="fw-500" style="font-size: 16px!important;">
                                                        {{$job->career_department->name}}
                                                    </p>
                                                    <p class="fw-500" style="font-size: 28px!important;">
                                                    <h4>
                                                        {{$job->job_title}}
                                                    </h4>
                                                    </p>
                                                </div>
                                            </h4>
                                            <div class="d-lg-flex justify-content-between">
                                                <p class="text-start" style="font-size: 14px !important;">Job Type: {{$job->job_type}}</p>
                                                <p class="text-lg-center text-md-start text-sm-start" style="font-size: 14px !important;">Experience: {{$job->experience}}</p>
                                                <p class="text-lg-end text-md-start text-sm-start" style="font-size: 14px !important;">Salary Range: {{$job->salary}}</p>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <a href="{{ route('career.detail', $job->slug_job_title) }}" class="btn px-3 py-2 fs-6" style="background-color: var(--yellow);">View Job Details</a>
                                                <p class="my-auto career-last-date fw-bold fw-500">Last Date: {{ $job->deadline }}</p>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach


                            <div class="pagination-simple col-md-12 pt-5">
                                {{ $career_jop_posts->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 order-md-2">
                        <div class="career-category">
                            <div class="p-3">
                                <h4 class="fw-700" style="color: var(--yellow);">
                                    Department
                                </h4>
                                <ul class="navbar-nav jobFilter">
                                    <li class="activeFilter">
                                        <a href="#" class="nav-link fw-bold fw-700 py-2" data-filter="all" style="color: var(--ash); font-size: 16px !important;">All Departments</a>
                                    </li>
                                    <div class="department-line-name" style="color: var(--ash);"></div>
                                    @foreach($career_departments->sortByDesc('created_at') as $department)
                                        <li class="nav-item">
                                            <a href="#" class="nav-link fw-bold fw-700 py-2" data-filter=".{{ $department->slug }}" style="color: var(--ash);font-size: 16px !important;">{{$department->name}} </a>
                                        </li>
                                        <div class="department-line-name" style="color: var(--ash);"></div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>


    </section>

    <script>
        jQuery(document).ready(function(){
            var $jobItems = jQuery('#jobs .job');
            if( window.location.hash != '' ) {
                var getJobFilterHash = window.location.hash;
                var hashJobFilter = getJobFilterHash.split('#');
                if( $jobItems.hasClass( hashJobFilter[1] ) ) {
                    jQuery('.jobFilter li').removeClass('activeFilter');
                    jQuery( '[data-filter=".'+ hashJobFilter[1] +'"]' ).parent('li').addClass('activeFilter');
                    var hashJobSelector = '.' + hashJobFilter[1];
                    $jobItems.css('display', 'none');
                    if( hashJobSelector != 'all' ) {
                        jQuery( hashJobSelector ).fadeIn(500);
                    } else {
                        $jobItems.fadeIn(500);
                    }
                }
            }

            jQuery('.jobFilter a').on( 'click', function(){
                jQuery('.jobFilter li').removeClass('activeFilter');
                jQuery(this).parent('li').addClass('activeFilter');
                var jobSelector = jQuery(this).attr('data-filter');
                $jobItems.css('display', 'none');
                if( jobSelector != 'all' ) {
                    jQuery( jobSelector ).fadeIn(500);
                } else {
                    $jobItems.fadeIn(500);
                }
                return false;
            });

        });
    </script>

@endsection

