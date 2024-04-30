@extends('webns.master')

@section('title')
    Cricket Tournament Form
@endsection

@section('content')

    {{--    Left Side Social Icon--}}
    <section class="left-social-icons">
        @include('webns.include.left-side-social-icon')
    </section>

    <section class="py-5">

        <div class="container-fluid py-3 mb-2">
            <div class="row">
                <div class="col-md-12 p-0 text-center">
                    <div class="top-text" style="height: 100px; position: relative; overflow: hidden;">
                        <p class="fw-900 text-uppercase heading-down-style">Pharma Cup 2024</p>
                        <p class="fw-900 top-contact text-capitalize heading-top-style">Registration Rules & Form</p>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center p-0 m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: var(--ash)!important; font-size: 14px; position: relative; z-index: 3;">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('events') }}" style="color: var(--ash)!important; font-size: 14px; position: relative; z-index: 3;">Events</a></li>
                                <li class="breadcrumb-item active">
                                    <span style="font-size: 14px; position: relative; z-index: 3;">
                                         Event Register
                                    </span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <p class="text-justify pb-3" style="line-height: 22px; font-size: 16px;">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores deleniti deserunt dignissimos dolorem iste quas?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores deleniti deserunt dignissimos dolorem iste quas?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores deleniti deserunt dignissimos dolorem iste quas?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores deleniti deserunt dignissimos dolorem iste quas?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores deleniti deserunt dignissimos dolorem iste quas?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores deleniti deserunt dignissimos dolorem iste quas?
                    </p>
                </div>
                <div class="col-md-9 mx-auto">
                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores deleniti deserunt dignissimos dolorem iste quas?</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores deleniti deserunt dignissimos dolorem iste quas?</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores deleniti deserunt dignissimos dolorem iste quas?</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores deleniti deserunt dignissimos dolorem iste quas?</li>
                    </ul>
                </div>

                <div class="col-md-12">
                    @if(session()->has('message'))
                        <div class="row">
                            <div class="col-12 mx-auto">
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
                        <form action="{{ route('outsider.user.store') }}" id="demoForm" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-2 justify-content-center p-0">

                                <div class="col-md-12 text-center pt-3">
                                    <p class="h1 fw-bold text-white">Registration Form</p>
                                </div>

                                <input type="hidden" name="note" value="" />

                                <div class="col-md-10">
                                    <p class="text-white fw-700" style="font-size: 24px;">Company Info:</p>
                                </div>

                                {{--                                <div class="col-md-5">--}}
                                {{--                                    <div class="form-floating">--}}
                                {{--                                        <input type="text" name="full_name" class="form-control shadow-none contact-input name-input" id="" placeholder="Enter full name" required oninput="validateName(this)" />--}}
                                {{--                                        <label for="" style="color: rgba(105,105,105,0.8)!important;">Company Name <span class="text-danger start-size">*</span></label>--}}
                                {{--                                        <div id="feedbackName" style="font-size: 14px !important;"></div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}

                                <div class="col-md-10">
                                    <div class="form-floating">
                                        {{--                                        <label for="" style="color: rgba(105,105,105,0.8)!important;"> Company Name <span class="text-danger start-size">*</span></label>--}}
                                        <select class="form-control pt-2 shadow-none contact-input"  name="company_name" id="company_name" aria-label="Default select example" required style="color: rgba(105,105,105,0.8)!important;">
                                            <option selected> Company Name <span class="text-danger start-size">*</span></option>
                                            <option value="WEBNS Technology Ltd.">WEBNS Technology Ltd.</option>
                                            <option value="WEBNS Teclogy Ltd.">WEBNS Teology Ltd.</option>
                                            <option value="WEBNS Techy Ltd.">WEBNS Techlogy Ltd.</option>
                                            <option value="WEBNS logy Ltd.">WEBNS Techy Ltd.</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-floating">
                                        <input type="file" name="company_logo" class="form-control shadow-none contact-input designation-input" id="company_logo" placeholder="Enter designation" required />
                                        <label for="company_logo" style="margin-top: -5px !important; color: rgba(105,105,105,0.8)!important;"> Company Logo <span class="text-danger start-size">*</span></label>
                                        <div id="feedbackDesignation" style="font-size: 14px !important;"></div>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-floating">
                                        <textarea class="form-control shadow-none contact-input" name="company_address" id="company_address" placeholder="Enter company name" required></textarea>
                                        {{--                                        <input type="text" name="company_name" class="form-control shadow-none contact-input" id="" placeholder="Enter company name" required />--}}
                                        <label for="company_address" style="color: rgba(105,105,105,0.8)!important;"> Address <span class="text-danger start-size">*</span></label>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-floating">
                                        <input type="text" name="company_email" minlength="3" maxlength="50" class="form-control shadow-none contact-input" id="company_email" placeholder="Enter company name" required />
                                        <label for="company_email" style="color: rgba(105,105,105,0.8)!important;"> Email <span class="text-danger start-size">*</span></label>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-floating">
                                        <input type="text" name="company_number" class="form-control shadow-none contact-input designation-input" id="company_number" placeholder="Enter designation" required />
                                        <label for="company_number" style="color: rgba(105,105,105,0.8)!important;"> Phone Number <span class="text-danger start-size">*</span></label>
                                        <div id="feedbackDesignation" style="font-size: 14px !important;"></div>
                                    </div>
                                </div>

                                {{--                                <div class="col-md-5">--}}
                                {{--                                    <div class="form-floating">--}}
                                {{--                                        <select class="form-control pt-2 shadow-none contact-input"  name="choose_product" id="" aria-label="Default select example" required style="color: rgba(105,105,105,0.8)!important;">--}}
                                {{--                                            <option selected> Total Players <span class="text-danger start-size">*</span></option>--}}
                                {{--                                            <option value="14">14 Players</option>--}}
                                {{--                                        </select>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}

                                <div class="col-md-10 pt-3">
                                    <p class="text-white fw-700" style="font-size: 24px;">Team Manager Info:</p>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-floating">
                                        <input type="text" name="team_manager_name" class="form-control shadow-none contact-input date-input" id="team_manager_name" placeholder="Choose date" required />
                                        <label for="team_manager_name" style="color: rgba(105,105,105,0.8)!important;"> Name <span class="text-danger start-size">*</span></label>
                                        <div id="feedbackDate" style="font-size: 14px !important;"></div>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-floating">
                                        <input type="text" name="manager_designation" class="form-control shadow-none contact-input date-input" id="manager_designation" placeholder="Choose date" required />
                                        <label for="manager_designation" style="color: rgba(105,105,105,0.8)!important;"> Designation <span class="text-danger start-size">*</span></label>
                                        <div id="feedbackDate" style="font-size: 14px !important;"></div>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-floating">
                                        <input type="text" name="manager_employ_id" class="form-control shadow-none contact-input date-input" id="manager_employ_id" placeholder="Choose date" required />
                                        <label for="manager_employ_id" style="color: rgba(105,105,105,0.8)!important;">Employ ID <span class="text-danger start-size">*</span></label>
                                        <div id="feedbackDate" style="font-size: 14px !important;"></div>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-floating">
                                        <input type="file" name="manager_employ_id_image" class="form-control shadow-none contact-input designation-input" id="manager_employ_id_image" placeholder="Enter designation" required />
                                        <label for="manager_employ_id_image" style="margin-top: -5px !important; color: rgba(105,105,105,0.8)!important;"> Employ ID Photo <span class="text-danger start-size">*</span></label>
                                        <div id="feedbackDesignation" style="font-size: 14px !important;"></div>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-floating">
                                        <input type="text" name="manager_number" class="form-control shadow-none contact-input date-input" id="manager_number" placeholder="Choose date" required />
                                        <label for="manager_number" style="color: rgba(105,105,105,0.8)!important;">Phone Number <span class="text-danger start-size">*</span></label>
                                        <div id="feedbackDate" style="font-size: 14px !important;"></div>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-floating">
                                        <input type="text" name="manager_email" class="form-control shadow-none contact-input date-input" id="manager_email" placeholder="Choose date" required />
                                        <label for="manager_email" style="color: rgba(105,105,105,0.8)!important;"> Email <span class="text-danger start-size">*</span></label>
                                        <div id="feedbackDate" style="font-size: 14px !important;"></div>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-floating">
                                        <input type="password" name="password" class="form-control shadow-none contact-input date-input" id="password" placeholder="Choose date" required autocomplete="new-password" />
                                        <label for="password" style="color: rgba(105,105,105,0.8)!important;"> Password <span class="text-danger start-size">*</span></label>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-floating">
                                        <input type="password" name="password_confirmation" class="form-control shadow-none contact-input date-input" id="password_confirmation"  placeholder="Enter confirm password" required  autocomplete="new-password" />
                                        <label for="password_confirmation" style="color: rgba(105,105,105,0.8)!important;"> Confirm Password <span class="text-danger start-size">*</span></label>
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-md-10 pt-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="terms" id="terms" value="agree" required />
                                        <label class="form-check-label" for="terms">
                                            I agree to the terms of service and privacy policy.
                                        </label>
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
                </div>
            </div>
        </div>

    </section>

@endsection



