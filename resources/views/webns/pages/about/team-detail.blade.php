@extends('webns.master')

@section('title')
    About Team Detail
@endsection

@section('content')

    {{--    Left Side Social Icon--}}
    <section class="left-social-icons">
        @include('webns.include.left-side-social-icon')
    </section>

    <section>

        <div class="container-fluid pb-3 mb-2">
            <div class="row">
                <div class="col-md-12 p-0 text-center">
                    <div class="top-text" style="height: 100px; position: relative; overflow: hidden;">
                        <p class="fw-900 text-uppercase heading-down-style">Directors</p>
                        <p class="fw-900 top-contact text-capitalize heading-top-style">OUR TOP MANAGEMENT</p>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center p-0 m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: var(--ash)!important; font-size: 14px; position: relative; z-index: 3;">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('about') }}" style="color: var(--ash)!important; font-size: 14px; position: relative; z-index: 3;">About Us</a></li>
                                <li class="breadcrumb-item active">
                                    <span style="font-size: 14px; position: relative; z-index: 3;">
                                        Team Detail
                                    </span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="text-center p-0" style="line-height: 15px;">--}}
{{--                        <h2 class="fw-900" style="font-size: 40px; color: var(--yellow);">S M Alif Ahmmed</h2>--}}
{{--                        <p class="fw-700" style="font-size: 22px; color: var(--ash);">Managing Director</p>--}}
{{--                        <p class="fw-700" style="font-size: 22px; color: var(--ash);">& CEO</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="container">
            <div class="row py-3 my-3">
                <div class="col-md-6 text-center">
                    <img class="border custom-left-shadow-light" src="{{ asset('/') }}company/images/section/team/DSC_0541 copy.jpg" alt="" style="height: 350px; width: auto; border-radius: 10px;" />
                </div>
                <div class="col-md-6 p-5">
                    <div class="text-start p-0" style="line-height: 15px;">
                        <h2 class="fw-900" style="font-size: 40px; color: var(--yellow);">S M Alif Ahmmed</h2>
                        <p class="fw-700" style="font-size: 22px; color: var(--ash);">Managing Director</p>
                        <p class="fw-700" style="font-size: 22px; color: var(--ash);">& CEO</p>
                    </div>
                    <div class="text-start">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur cupiditate quam sed? Amet esse in ipsam magni nihil, nulla recusandae tempora? Assumenda consectetur et, in nemo quibusdam quisquam sapiente sit totam. Eum fugit hic minima modi quas quia ratione rem. Asperiores delectus expedita, explicabo iusto libero nemo sint ullam vel veritatis voluptates.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row py-5 my-3">
                <div class="col-md-6 p-5">
                    <p class="text-center fw-700" style="font-size: 36px;">
                        What we have in our product?
                    </p>
                    <p class="text-center">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur atque consequuntur ducimus, est et quis sequi soluta totam unde vero? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad assumenda culpa cupiditate distinctio eveniet exercitationem ipsum iure molestiae perferendis perspiciatis!
                    </p>
                </div>
                <div class="col-md-6 text-center">
                    <img class="border custom-left-shadow-light" src="{{ asset('/') }}company/images/section/team/DSC_0541 copy.jpg" alt="" style="height: 350px; width: auto; border-radius: 10px;" />
                </div>
            </div>
            <div class="row py-5 my-3">
                <div class="col-md-6 text-center">
                    <img class="border custom-left-shadow-light" src="{{ asset('/') }}company/images/section/team/DSC_0541 copy.jpg" alt="" style="height: 350px; width: auto; border-radius: 10px;" />
                </div>
                <div class="col-md-6 p-5">
                    <p class="text-center fw-700" style="font-size: 36px;">
                        How easy to use our product?
                    </p>
                    <p class="text-center">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur atque consequuntur ducimus, est et quis sequi soluta totam unde vero? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad assumenda culpa cupiditate distinctio eveniet exercitationem ipsum iure molestiae perferendis perspiciatis!
                    </p>
                </div>
            </div>
        </div>

        <div class="container-fluid p-0" style="height: 200px; width: auto; overflow: hidden;" >
            <div class="row">
                <div class="col-md-12 contact-section">
                    {{--            <img src="{{asset('/')}}company/images/section/section-images/contact-back.png" alt="">--}}
                    <img src="{{asset('/')}}company/images/section/section-images/contact-back-1.png" alt="">
                    <div class="text-center contact-text position-relative pt-4">
                        <p class="fw-900 text-white" style="font-size: 36px; margin: 0; padding: 0;">"Let's Talk"</p>
                        <p class="text-white fw-700" style="font-size: 20px;">To know more about the software and get demo</p>
                        <a href="{{ route('contact') }}" class="btn border-0 custom-btn-5" style="font-size: 24px;">
                            <i class="fa-solid fa-angles-right text-white" style="font-size: 16px;"></i>
                            <span class="fw-700 custom-btn-contact" style="padding-left: 15px;">
                                Click Here
                            </span>
                            <i class="fa-solid fa-angles-left text-white" style="font-size: 16px; padding-left: 6px;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection


