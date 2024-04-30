@extends('webns.master')

@section('title')
    Demo Request
@endsection

@section('content')

    {{--    Left Side Social Icon--}}
    <section class="left-social-icons">
        @include('webns.include.left-side-social-icon')
    </section>

    <section class="pt-3">
        <div class="container-fluid mb-3">
            <div class="row">
                <div class="col-md-12 p-0 text-center">
                    <div class="top-text" style="height: 100px; position: relative; overflow: hidden;">
                        <p class="fw-900 text-uppercase heading-down-style">Get Demo</p>
                        <p class="fw-900 top-contact text-capitalize heading-top-style">Request</p>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center p-0 m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: var(--ash)!important; font-size: 14px; position: relative; z-index: 3;">Home</a></li>
                                <li class="breadcrumb-item active">
                                    <span style="font-size: 14px; position: relative; z-index: 3;">
                                       Request Demo
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
    </section>

    <section class="pb-3 demo-request-form">
        <div class="container back-gradient-yellow rounded-4 my-3 ">
            {{--    <div class="row d-flex mx-auto">--}}
            <form action="{{ route('demo.request.store') }}" id="demoForm" method="POST">
                @csrf

                <div class="row g-2 justify-content-center p-0">
                    <div class="col-md-12 text-center py-3">
                        <h2 class="h1 fw-bold text-white">Demo request Form</h2>
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
                                <option selected>Choose product <span class="text-danger start-size">*</span></option>
                                <option value="One">One</option>
                                <option value="Two">Two</option>
                                <option value="Three">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-floating">
                            <input type="date" name="date" class="form-control shadow-none contact-input date-input" id="date" placeholder="Choose date" required oninput="validateDate(this)" />
                            <label for="date" style="color: rgba(105,105,105,0.8)!important;">Date <span class="text-danger start-size">*</span></label>
                            <div id="feedbackDate" style="font-size: 14px !important;"></div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-floating">
                            <select class="form-control pt-2 shadow-none contact-input" name="time" id="" aria-label="Default select example" required style="color: rgba(105,105,105,0.8)!important;">
                                <option selected>Choose Time <span class="text-danger start-size">*</span></option>
                                <option value="10:00am">10:00am</option>
                                <option value="11:00am">11:00am</option>
                                <option value="12:00pm">12:00pm</option>
                                <option value="01:00pm">01:00pm</option>
                                <option value="02:00pm">02:00pm</option>
                                <option value="03:00pm">03:00pm</option>
                                <option value="04:00pm">04:00pm</option>
                                <option value="05:00pm">05:00pm</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-floating">
                            <textarea class="form-control shadow-none contact-input" name="comment" minlength="300" maxlength="3000" placeholder="Enter comment here" id="" required style="min-height: 100px;" ></textarea>
                            <label for="" style="color: rgba(105,105,105,0.8)!important;">Comment <span class="text-danger start-size">*</span></label>
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

    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var currentDate = new Date();
            var minDate = currentDate.toISOString().split('T')[0]; // Format: YYYY-MM-DD
            document.getElementById('date').min = minDate;
        });

        function validateDate(input) {
            var enteredDate = new Date(input.value);
            var currentDate = new Date();
            var feedbackDate = document.getElementById("feedbackDate");

            if (isNaN(enteredDate.getTime())) {
                // Invalid date format
                feedbackDate.innerText = "Invalid date. Please enter a valid date.";
                feedbackDate.style.color = "red";
                return false;
            }

            if (enteredDate < currentDate) {
                feedbackDate.innerText = "Invalid date. Please enter a date on or after today.";
                feedbackDate.style.color = "red";
                return false;
            }

            feedbackDate.innerText = "Valid date!";
            feedbackDate.style.color = "white";
            return true;
        }
    </script>

@endsection
