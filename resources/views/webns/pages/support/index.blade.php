@extends('webns.master')

@section('title')
    Support
@endsection

@section('content')

    {{--    Left Side Social Icon--}}
    <section class="left-social-icons">
        @include('webns.include.left-side-social-icon')
    </section>

    <section class="py-3">
        <div class="container">

            <div class="container-fluid pb-3 mb-2">
                <div class="row">
                    <div class="col-md-12 p-0 text-center">
                        <div class="top-text" style="height: 100px; position: relative; overflow: hidden;">
                            <p class="fw-900 text-uppercase heading-down-style">Get Support</p>
                            <p class="fw-900 top-contact text-capitalize heading-top-style">Support</p>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center p-0 m-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}" style="color: var(--ash)!important; font-size: 14px; position: relative; z-index: 3;">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        <span style="font-size: 14px; position: relative; z-index: 3;">
                                            Support
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
                        <div class="container alert p-1 alert-success border-0 sticky-float-bottom back-gradient-yellow" data-animate="fadeInUp faster">
                            <div class="row justify-content-between align-items-center p-0 m-0">
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

            <div class="container back-gradient-yellow rounded-4 my-3">
                {{--    <div class="row d-flex mx-auto">--}}
                <form action="{{ route('support.store') }}" id="demoForm" method="POST">
                    @csrf

                    <div class="row g-2 justify-content-center p-0">
                        <div class="col-md-12 text-center py-3">
                            <h2 class="h1 fw-bold text-white">Support request Form</h2>
                        </div>

                        <input type="hidden" name="note" value="" />

                        <div class="col-md-5">
                            <div class="form-floating">
                                <input type="text" name="full_name" class="form-control shadow-none contact-input name-input" id="" placeholder="Enter full name" required oninput="validateName(this)" />
                                <label for="" style="color: rgba(105,105,105,0.8)!important;">Full Name <span class="text-danger start-size">*</span></label>
                                <div id="feedbackName" style="font-size: 14px !important;"></div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-floating">
                                <input type="text" name="company_name" minlength="3" maxlength="50" class="form-control shadow-none contact-input" id="" placeholder="Enter company name" required />
                                <label for="" style="color: rgba(105,105,105,0.8)!important;">Company Name <span class="text-danger start-size">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-floating">
                                <input type="text" name="designation" class="form-control shadow-none contact-input designation-input" id="" placeholder="Enter designation" required oninput="validateDesignation(this)" />
                                <label for="" style="color: rgba(105,105,105,0.8)!important;">Designation <span class="text-danger start-size">*</span></label>
                                <div id="feedbackDesignation" style="font-size: 14px !important;"></div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control shadow-none contact-input email-input" id="" placeholder="Enter email" required oninput="validateEmail(this)" />
                                <label for="" style="color: rgba(105,105,105,0.8)!important;">Email <span class="text-danger start-size">*</span></label>
                                <div id="feedbackEmail" style="font-size: 14px !important;"></div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-floating">
                                <input type="text" name="number" minlength="11" maxlength="14" class="form-control shadow-none number-input contact-input" id="" placeholder="Enter contact number" required oninput="validatePhoneNumber(this)" />
                                <label for="" style="color: rgba(105,105,105,0.8)!important;">Contact Number <span class="text-danger start-size">*</span></label>
                                <div id="feedbackNumber" style="font-size: 12px !important;"></div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-floating">
                                <select class="form-control pt-2 shadow-none contact-input"  name="choose_product" id="" aria-label="Default select example" required style="color: rgba(105,105,105,0.8)!important;">
                                    <option selected>Choose product for support <span class="text-danger start-size">*</span></option>
                                    <option value="One">One</option>
                                    <option value="Two">Two</option>
                                    <option value="Three">Three</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-floating">
                                <textarea class="form-control shadow-none contact-input" name="message" minlength="30" maxlength="3000" placeholder="Enter message here" id="" required style="min-height: 100px;" ></textarea>
                                <label for="" style="color: rgba(105,105,105,0.8)!important;">Message <span class="text-danger start-size">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-10 text-center pt-2 pb-4" style="max-height: 60px;">
                            <button type="submit" id="demo-submit-btn" class="btn border-0 custom-btn-4">
                        <span class="custom-btn-8">
                            Submit
                        </span>
                            </button>
                        </div>

                    </div>
                </form>
                {{--    </div>--}}
            </div>

            <div class="container">
                <div class="row py-3 text-center">
                    <p style="line-height: 26px; font-size: 20px;">
                        <span class="fw-700">To get quick support, please call us:</span>
                        <br>
                        +88 01988 0008100-01
                    </p>
                </div>
            </div>

        </div>

        <div class="container-fluid p-0 contact-us-footer">
            <div class="row">
                <div class="col-md-12 contact-section">
                    <img class="img-fluid w-100" src="{{asset('/')}}company/images/section/section-images/contact-back-1.png" alt="image">
                    <div class="text-center contact-text position-relative pt-4">
                        <p class="fw-700 text-white" style="font-size: 36px; margin: 0; padding: 0;">"Let's Talk"</p>
                        <p class="text-white" style="font-size: 18px;">To know more about the software and get demo</p>
                        <a href="{{ route('contact') }}" class="btn border-0 custom-btn-5 mb-2" style="font-size: 24px;">
                            <svg xmlns="http://www.w3.org/2000/svg" style="height: 16px; width: 16px;" viewBox="0 0 512 512"><path fill="#ffffff" d="M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z"/></svg>
                            <span class="fw-700 custom-btn-contact" style="padding: 3px 15px 3px 18px; line-height: 28px !important;">
                                Click Here
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" style="height: 16px; width: 16px; margin-left: 6px;" viewBox="0 0 512 512"><path fill="#ffffff" d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160zm352-160l-160 160c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L301.3 256 438.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
