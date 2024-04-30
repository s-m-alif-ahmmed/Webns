<div class="container-fluid py-3 mb-2">
    <div class="row">
        <div class="col-md-12 p-0 text-center">
            <div class="top-text" style="height: 100px; position: relative; overflow: hidden;">
                <p class="fw-900 text-uppercase heading-down-style">GET IN TOUCH</p>
                <p class="fw-900 top-contact text-capitalize heading-top-style">Contact Us</p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: var(--ash)!important; font-size: 14px; position: relative; z-index: 3;">Home</a></li>
                        <li class="breadcrumb-item active">
                            <span style="font-size: 14px; position: relative; z-index: 3;">
                                Contact Us
                            </span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-3">
    <div class="row">
        <div class="col-md-12 p-0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.8955793240207!2d90.38388547397007!3d23.751102788751957!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b96c8cc45f49%3A0x8eb368fe3c293680!2sWebns%20Technology%20Ltd.!5e0!3m2!1sen!2sbd!4v1706762619893!5m2!1sen!2sbd" width="auto" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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

<section class="contact-page-form">
    <div class="container back-gradient-yellow rounded-4 my-3">
        <form action="{{ route('contact.store') }}" id="contactForm" method="POST">
            @csrf

            <input type="hidden" name="note" value="" />

            <div class="row g-2 justify-content-center p-0">
                <div class="col-md-12 text-center py-3">
                    <h2 class="h1 fw-bold text-white">Contact Form</h2>
                </div>
                <div class="col-md-5">
                    <div class="form-floating">
                        <input type="text" name="name" style="height: 5px;" class="form-control shadow-none name-input" id="contact-input" placeholder="Enter your name" required oninput="validateName(this)" />
                        <label for="contact-input" style="color: rgba(105,105,105,0.8)!important;">Name</label>
                        <div id="feedbackName" style="font-size: 14px !important;"></div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control shadow-none email-input" id="contact-input" placeholder="Enter email" required oninput="validateEmail(this)" />
                        <label for="contact-input" style="color: rgba(105,105,105,0.8)!important;">Email</label>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-floating">
                        <input type="text" name="number" minlength="11" maxlength="14" class="form-control shadow-none number-input" id="contact-input" placeholder="Enter phone number" required oninput="validatePhoneNumber(this)" />
                        <label for="contact-input" style="color: rgba(105,105,105,0.8)!important;">Phone Number</label>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-floating">
                        <input type="text" name="company_name" minlength="3" maxlength="50" class="form-control shadow-none" id="contact-input" placeholder="Enter company name" required />
                        <label for="contact-input" style="color: rgba(105,105,105,0.8)!important;">Company Name</label>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-floating">
                        <input type="text" name="subject" class="form-control shadow-none" minlength="30" maxlength="100" id="contact-input" placeholder="Enter subject here" required />
                        <label for="contact-input" style="color: rgba(105,105,105,0.8)!important;">Subject</label>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-floating">
                        <textarea class="form-control shadow-none" minlength="30" maxlength="300" name="message" placeholder="Leave a message here" id="contact-input" style="min-height: 100px;" required ></textarea>
                        <label for="contact-input" style="color: rgba(105,105,105,0.8)!important;">Message</label>
                    </div>
                </div>

                <div class="col-md-10 text-center pt-2 pb-4" style="max-height: 60px;">
                    <button type="submit" id="submit-button" class="btn border-0 custom-btn-5">
                        <span class="custom-btn-8" style="font-size: 14px !important;">
                            Submit
                        </span>
                    </button>
                </div>

            </div>
        </form>
    </div>
</section>


<div class="container py-3">
    <div class="row ms-5">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="border-end">
                <i class="fa-solid fa-map-location-dot py-2 text-warning" style="font-size: 20px;"></i>
                <h6 class="fw-bold">Address</h6>
                <p style="font-size: 14px;">Level-07, 152/2A-2, Rowshan Tower,<br>
                    Panthapath, Dhaka-1205. </p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="border-end">
                <i class="fa-regular fa-address-card py-2 text-warning" style="font-size: 20px;"></i>
                <h6 class="fw-bold">Contact Info</h6>
                <div style="line-height: 20px; font-size: 14px;">
                    <p>Phone Number: +88 01988-000800-01
                        <br>
                        Email: info@webnstech.net
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="">
                <i class="fa-solid fa-blog py-2 text-warning" style="font-size: 20px;"></i>
                <h6 class="fw-bold">Blogs:</h6>
                <div class="contact-blog">
                    <div class="owl-carousel contact-blog-carousel overflow-hidden">
                        @foreach($blogs as $blog)
                            @if($blog->status == 'Publish')
                                <div class="testimonial-item contact-blog-item px-3 pb-3">
                                    <div class="d-flex border back-gradient-yellow shadow contact-full-box my-auto p-2">
                                        <div class="col-md-5 card shadow rounded-3 my-auto contact-full-img-box">
                                            <img class="img-fluid my-auto w-100" src="{{ asset( $blog->image ) }}" alt="Image">
                                        </div>
                                        <div class="col-md-7 mx-auto">
                                            <div class="testimonial-text text-center">
                                                <p class="text-start text-white fw-bold contact-full-box-text">
                                                    {{ $blog->title }}
                                                </p>
                                                <a href="#" class="btn btn-sm border-white bg-transparent border-2 fw-bold text-white custom-btn-5 contact-full-box-btn">
                                                    Read More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

{{--                <div class="d-flex justify-content-center justify-content-md-start">--}}

{{--                    <div id="top-bar" class="transparent-topbar border-0">--}}
{{--                        <div class="container p-0">--}}
{{--                            <div class="row align-items-center">--}}

{{--                                <ul id="top-social" class="justify-content-center justify-content-lg-end">--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="h-bg-linkedin">--}}
{{--                                                    <span class="ts-icon">--}}
{{--                                                        <i class="fa-brands fa-linkedin-in"></i>--}}
{{--                                                    </span>--}}
{{--                                            <span class="ts-text h-bg-linkedin">--}}
{{--                                                        Linkedin--}}
{{--                                                    </span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="h-bg-facebook">--}}
{{--                                                    <span class="ts-icon">--}}
{{--                                                        <i class="fa-brands fa-facebook-f"></i>--}}
{{--                                                    </span>--}}
{{--                                            <span class="ts-text">--}}
{{--                                                        Facebook--}}
{{--                                                    </span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="h-bg-instagram">--}}
{{--                                                    <span class="ts-icon">--}}
{{--                                                        <i class="fa-brands fa-instagram"></i>--}}
{{--                                                    </span>--}}
{{--                                            <span class="ts-text">--}}
{{--                                                        Instagram--}}
{{--                                                    </span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="h-bg-x-twitter">--}}
{{--                                                    <span class="ts-icon">--}}
{{--                                                        <i class="fa-brands fa-x-twitter"></i>--}}
{{--                                                    </span>--}}
{{--                                            <span class="ts-text">--}}
{{--                                                        Twitter--}}
{{--                                                    </span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="h-bg-reddit">--}}
{{--                                                    <span class="ts-icon">--}}
{{--                                                        <i class="fa-brands fa-reddit"></i>--}}
{{--                                                    </span>--}}
{{--                                            <span class="ts-text">--}}
{{--                                                        Reddit--}}
{{--                                                    </span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="h-bg-quora">--}}
{{--                                                    <span class="ts-icon">--}}
{{--                                                        <i class="fa-brands fa-quora"></i>--}}
{{--                                                    </span>--}}
{{--                                            <span class="ts-text">--}}
{{--                                                        Quora--}}
{{--                                                    </span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}

{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Attach the validation functions to the oninput event
        $(".name-input").on("input", function () {
            validateName(this);
        });

        $(".email-input").on("input", function () {
            validateEmail(this);
        });

        $(".number-input").on("input", function () {
            validatePhoneNumber(this);
        });

    });
</script>



