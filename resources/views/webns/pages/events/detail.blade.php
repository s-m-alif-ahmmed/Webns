@extends('webns.master')

@section('title')
    Events
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
                        <p class="fw-900 text-uppercase heading-down-style">Read Some</p>
                        <p class="fw-900 top-contact text-capitalize heading-top-style">Event Detail</p>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center p-0 m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: var(--ash)!important; font-size: 14px; position: relative; z-index: 3;">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('events') }}" style="color: var(--ash)!important; font-size: 14px; position: relative; z-index: 3;">Events</a></li>
                                <li class="breadcrumb-item active">
                                    <span style="font-size: 14px; position: relative; z-index: 3;">
                                         Event Detail
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
                <div class="col-md-8">
                    <div class="row">
{{--                        @if($blog->status == 'Publish')--}}
                            <div class="col-lg-12 py-3">
                                <div class="card p-4 border custom-left-shadow-light h-translatey-sm all-ts overflow-hidden" style="border-radius: 10px;">
{{--                                    <h3 class="pt-3">{{ $blog->title }}</h3>--}}
                                    <h3 class="pt-3">Hi hello how are you</h3>
                                    <span class="d-flex">
                                            <hr style="width: 15px; margin-top: 13px !important;" />
{{--                                            <p class="ps-2">{{ $blog->category->name }}</p>--}}
                                            <p class="ps-2">Are You ok</p>
                                        </span>
{{--                                    <img class="py-3" src="{{ asset( $blog->image) }}" alt="{{ $blog->alt }}" style="height: 400px; width: auto;" />--}}
{{--                                    <span class="py-3">--}}
{{--                                        {!! $blog->description !!}--}}
{{--                                    </span>--}}
                                    <span class="py-3">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis expedita explicabo, facilis, ipsam molestias natus necessitatibus nemo nesciunt omnis quas, qui tenetur vel voluptas? Consequuntur cupiditate, eligendi exercitationem molestiae odio pariatur quaerat? Ad assumenda autem debitis deleniti, dolor eaque exercitationem expedita explicabo impedit itaque iusto laborum magnam minus nemo nesciunt, nisi nobis numquam obcaecati quae ratione, reiciendis sequi sit tenetur? Adipisci aliquam amet asperiores autem ducimus eligendi fugiat laboriosam maiores natus necessitatibus nobis non obcaecati perspiciatis, rem reprehenderit saepe sed, voluptates! Eum non numquam veritatis vero. Ab beatae eligendi ipsam optio veniam. Aliquid asperiores atque consectetur ipsam minima quidem quod.
                                    </span>
                                    <a href="{{ route('events.cricket.form') }}" class="btn btn-warning">form</a>
                                </div>
                            </div>
{{--                        @endif--}}
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 px-4 py-3">
                            <div class="card py-2 border custom-left-shadow-light h-translatey-sm all-ts overflow-hidden" style="border-radius: 10px;">
                                <section class="news-ticker">
                                    <div class="news">
                                        @foreach($outside_users as $outside_user)
                                            <div class="row border-bottom">
                                                <div class="col-md-12">
                                                        <span>
                                                            <div class="row align-items-center">
                                                                <div class="col-md-3">
                                                                    <img class="p-2" src="{{ asset($outside_user->company_logo) }}" alt="" style="height: 50px; width: auto;">
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="row" style="line-height: 10px;">
                                                                        <div class="col-md-12">
                                                                            <p class="px-1" style="font-size: 14px;">{{ $outside_user->company_name }}</p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p class="px-1" style="font-size: 12px;">{{ $outside_user->created_at->setTimezone('Asia/Dhaka')->format('M D, Y') }}</p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p class="px-1" style="font-size: 12px;">{{ $outside_user->created_at->setTimezone('Asia/Dhaka')->format('h:ia') }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <style>
                        .news-ticker {
                            padding: 0px;
                            display: flex;
                            align-items: center;
                        }

                        .news {
                            height: 300px;
                            overflow: hidden;
                        }

                        .news>div {
                            animation: slide 7s linear infinite;
                            margin-bottom: 12px;
                        }

                        @keyframes slide {
                            0% {
                                transform: translateY(0);
                            }
                            100% {
                                transform: translateY(calc(-50px * 1)); /* Adjust the number based on the number of news items */
                            }
                        }
                    </style>

                    <div class="row">
                        <div class="col-md-12 px-4 py-3">
                            <div class="card py-2 border custom-left-shadow-light h-translatey-sm all-ts overflow-hidden" style="border-radius: 10px;">
                                <h3 class="px-4 pt-3 pb-2 fw-700 border-bottom" style="color: var(--ash);">Event Gallery</h3>
                                <div class="row d-flex">
                                    <div class="col-md-4 p-1">
                                        <a href="">
                                            <img src="{{ asset('/') }}company/images/section/section-images/product-logo-section.jpg" alt="image">
                                        </a>
                                    </div>
                                    <div class="col-md-4 p-1">
                                        <a href="">
                                            <img src="{{ asset('/') }}company/images/section/section-images/product-logo-section.jpg" alt="image">
                                        </a>
                                    </div>
                                    <div class="col-md-4 p-1">
                                        <a href="">
                                            <img src="{{ asset('/') }}company/images/section/section-images/product-logo-section.jpg" alt="image">
                                        </a>
                                    </div>
                                    <div class="col-md-4 p-1">
                                        <a href="">
                                            <img src="{{ asset('/') }}company/images/section/section-images/product-logo-section.jpg" alt="image">
                                        </a>
                                    </div>
                                    <div class="col-md-4 p-1">
                                        <a href="">
                                            <img src="{{ asset('/') }}company/images/section/section-images/product-logo-section.jpg" alt="image">
                                        </a>
                                    </div>
                                    <div class="col-md-4 p-1">
                                        <a href="">
                                            <img src="{{ asset('/') }}company/images/section/section-images/product-logo-section.jpg" alt="image">
                                        </a>
                                    </div>
                                    <div class="col-md-4 p-1">
                                        <a href="">
                                            <img src="{{ asset('/') }}company/images/section/section-images/product-logo-section.jpg" alt="image">
                                        </a>
                                    </div>
                                    <div class="col-md-4 p-1">
                                        <a href="">
                                            <img src="{{ asset('/') }}company/images/section/section-images/product-logo-section.jpg" alt="image">
                                        </a>
                                    </div>
                                    <div class="col-md-4 p-1">
                                        <a href="">
                                            <img src="{{ asset('/') }}company/images/section/section-images/product-logo-section.jpg" alt="image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="pt-3">

        <!-- Testimonial Start -->
        <div class="testimonial" style="overflow: hidden;">
            <div class="container">
                <div class="row">
                    <div class="d-flex">
                        <div class="col-md-3" style="height: 200px; overflow: hidden;">
                            <img src="{{ asset('/') }}company/images/section/section-images/product-logo-section.jpg" alt="image" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="owl-carousel events-carousel overflow-hidden">
                            <div class="testimonial-item py-3 mt-2 mx-3">
                                <div class="d-flex border back-gradient-yellow shadow my-auto p-2" style="height: 150px; border-radius: 20px;">
                                    <div class="col-md-5 ms-3 card shadow rounded-3 my-auto" style="height: 100px; width: 100px;">
                                        <img class="my-auto" src="{{ asset('/') }}company/images/section/product/steps_erp_shadow.png" alt="Image">
                                    </div>
                                    <div class="col-md-7 p-2 mx-auto">
                                        <div class="testimonial-text text-center mt-2">
                                            <p class="text-start text-white fw-bold mb-2" style="line-height: 22px; font-size: 16px;" >
                                                Lorem ipsum dolor sit amet elit. Phasel preti dfss dsfsds
                                            </p>
                                            <a href="#" class="btn btn-sm border-white bg-transparent border-2 fw-bold text-white custom-btn-5">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-item py-3 mt-2 mx-3">
                                <div class="d-flex border back-gradient-yellow shadow my-auto p-2" style="height: 150px; border-radius: 20px;">
                                    <div class="col-md-5 ms-3 card shadow rounded-3 my-auto" style="height: 100px; width: 100px;">
                                        <img class="my-auto" src="{{ asset('/') }}company/images/section/product/steps_erp_shadow.png" alt="Image">
                                    </div>
                                    <div class="col-md-7 p-2 mx-auto">
                                        <div class="testimonial-text text-center mt-2">
                                            <p class="text-start text-white fw-bold mb-2" style="line-height: 22px; font-size: 16px;" >
                                                Lorem ipsum dolor sit amet elit. Phasel preti dfss dsfsds
                                            </p>
                                            <a href="#" class="btn btn-sm border-white bg-transparent border-2 fw-bold text-white custom-btn-5">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-item py-3 mt-2 mx-3">
                                <div class="d-flex border back-gradient-yellow shadow my-auto p-2" style="height: 150px; border-radius: 20px;">
                                    <div class="col-md-5 ms-3 card shadow rounded-3 my-auto" style="height: 100px; width: 100px;">
                                        <img class="my-auto" src="{{ asset('/') }}company/images/section/product/steps_erp_shadow.png" alt="Image">
                                    </div>
                                    <div class="col-md-7 p-2 mx-auto">
                                        <div class="testimonial-text text-center mt-2">
                                            <p class="text-start text-white fw-bold mb-2" style="line-height: 22px; font-size: 16px;" >
                                                Lorem ipsum dolor sit amet elit. Phasel preti dfss dsfsds
                                            </p>
                                            <a href="#" class="btn btn-sm border-white bg-transparent border-2 fw-bold text-white custom-btn-5">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-item py-3 mt-2 mx-3">
                                <div class="d-flex border back-gradient-yellow shadow my-auto p-2" style="height: 150px; border-radius: 20px;">
                                    <div class="col-md-5 ms-3 card shadow rounded-3 my-auto" style="height: 100px; width: 100px;">
                                        <img class="my-auto" src="{{ asset('/') }}company/images/section/product/steps_erp_shadow.png" alt="Image">
                                    </div>
                                    <div class="col-md-7 p-2 mx-auto">
                                        <div class="testimonial-text text-center mt-2">
                                            <p class="text-start text-white fw-bold mb-2" style="line-height: 22px; font-size: 16px;" >
                                                Lorem ipsum dolor sit amet elit. Phasel preti dfss dsfsds
                                            </p>
                                            <a href="#" class="btn btn-sm border-white bg-transparent border-2 fw-bold text-white custom-btn-5">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

    </section>

@endsection



