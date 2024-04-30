@extends('webns.master')

@section('title')
    WEBNS | job Application
@endsection

@section('meta-info')
    <meta name="author" content="WEBNS Technology Ltd.">
    <meta name="description" content="Get Canvas to build powerful websites easily with the Highly Customizable &amp; Best Selling Bootstrap Template, today.">
@endsection

@section('content')

    {{--    Left Side Social Icon--}}
    <section class="left-social-icons">
        @include('webns.include.left-side-social-icon')
    </section>

    <section class="py-5" style="overflow: hidden;">

        <div class="container-fluid pb-3 mb-2">
            <div class="row">
                <div class="col-md-12 p-0 text-center">
                    <div class="top-text" style="height: 100px; position: relative; overflow: hidden;">
                        <p class="fw-900 text-uppercase heading-down-style">Job Application</p>
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
                                         Job Application
                                    </span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @if(session()->has('message'))
            <div class="row">
                <div class="col-6 mx-auto">
                    <div class="container alert alert-success border-0 sticky-float-bottom back-gradient-yellow" data-animate="fadeInUp faster">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-lg-auto" style="color: white; font-size: 18px;">
                                {{ session('message') }}
                            </div>
                            <div class="col-lg-auto mt-3 mt-lg-0">
                                <button type="button" class="btn float-lg-none ms-md-3" data-bs-dismiss="alert" aria-hidden="true">
                                    <i class="fa-solid fa-xmark" style="color: white !important; font-size: 20px !important;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row px-2">
            <div class="col-md-6 mx-auto">
                <form action="{{ route('career.job.application.store') }}" class="" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('post')

                    <input type="hidden" name="career_job_post_id" value="{{ $career_job_post->id }}" />
                    <input type="hidden" name="prefix_id" value="{{ $career_job_post->prefix_id }}" />

                    <div class="card border-warning">
                        <div class="p-4">

                            <div class=" mb-3">
                                <label class="ps-1" for="">Full Name <span>*</span> </label>
                                <input type="text" class="form-control border-warning focus-ring focus-ring-warning" id="full_name" name="full_name" placeholder="Enter full name" required />
                                <x-input-error :messages="$errors->get('full_name')" class="mt-2 text-danger" />
                            </div>
                            <div class=" mb-3">
                                <label class="ps-1" for="">Email <span>*</span> </label>
                                <input type="email" class="form-control border-warning focus-ring focus-ring-warning" id="email" name="email" placeholder="Enter your email" required />
                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                            </div>
                            <div class=" mb-3">
                                <label class="ps-1" for="">Phone Number <span>*</span> </label>
                                <input type="number" class="form-control border-warning focus-ring focus-ring-warning" id="number" name="number" placeholder="Enter phone number" required />
                                <x-input-error :messages="$errors->get('number')" class="mt-2 text-danger" />
                            </div>
                            <div class=" mb-3">
                                <label class="ps-1" for="">Expected Salary <span>*</span> </label>
                                <input type="text" class="form-control border-warning focus-ring focus-ring-warning" id="expected_salary" name="expected_salary" placeholder="Enter expected salary" required />
                                <x-input-error :messages="$errors->get('expected_salary')" class="mt-2 text-danger" />
                            </div>
                            <div class=" mb-3">
                                <label class="ps-1" for="">Cover Letter</label>
                                <textarea type="text" maxlength="3000" class="form-control border-warning focus-ring focus-ring-warning" id="cover_letter" name="cover_letter" placeholder="Write cover letter" style="min-height: 100px;"></textarea>
                                <x-input-error :messages="$errors->get('cover_letter')" class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <label class="ps-1" for="">Resume <span>*</span> </label>
                                <input type="file" class="form-control border-warning focus-ring focus-ring-warning" id="resume" name="resume" accept=".pdf" required />
                                <x-input-error :messages="$errors->get('resume')" class="mt-2 text-danger" />
                            </div>
                            <div class="mb-1 text-center">
                                <input type="submit" class="btn job-app-btn" value="submit" />
                            </div>

                            <style>
                                .job-app-btn{
                                    background-color: #F8C243;
                                    border-radius: 10px;
                                    color: black;
                                    font-weight: 500;
                                    transform: scale(1);
                                }
                                .job-app-btn:hover{
                                    background-color: #F8C243;
                                    border-radius: 10px;
                                    color: black;
                                    font-weight: 500;
                                    transform: scale(0.9);
                                    transition: 0.3s;
                                }
                            </style>

                        </div>
                    </div>

                </form>
            </div>
        </div>

    </section>

@endsection



