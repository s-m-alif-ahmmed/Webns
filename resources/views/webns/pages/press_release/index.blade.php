@extends('webns.master')

@section('title')
    Press Release
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
                        <p class="fw-900 text-uppercase heading-down-style">View Some</p>
                        <p class="fw-900 top-contact text-capitalize heading-top-style">Press Release</p>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center p-0 m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}" style="color: var(--ash)!important; font-size: 14px; position: relative; z-index: 3;">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <span style="font-size: 14px; position: relative; z-index: 3;">
                                         Press Release
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
                <div class="col-lg-12 py-3">
                    <div class="row team blog team-list g-0 align-items-center custom-left-shadow-light all-ts overflow-hidden" style="border-radius: 10px;">
                        <div class="col-md-4 team-image col-sm-4 d-flex align-self-stretch">
                            <img src="https://source.unsplash.com/fIHozNWfcvs/800x450" alt="" style="height: 310px;">
                        </div>
                        <div class="col-md-8 col-sm-8 p-4">
                            <div class="team-desc text-start">
                                <div class="team-title pt-0 mb-3">
                                    <a href="{{ route('press.release.single') }}" class="text-black">
                                        <h2 class="text-break fw-700">dfsjshfdks dshfkdsh khfdshf hdsfkhdsf khfdshf hdsfkhdsf</h2>
                                    </a>
                                    <span class="fst-normal text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias amet consequuntur cupiditate dolor in maiores molestias odit quae suscipit tenetur. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid asperiores aut, earum eveniet incidunt ipsam maxime mollitia nulla provident voluptates.</span>
                                </div>
                                <p class="mb-3"></p>
                            </div>
                            <div class="row justify-content-between d-flex">
                                <div class="col-lg-6 col-md-6 col-sm-12 team-desc text-start">
                                    <div class="text-center text-md-start">
                                        <div class="d-flex justify-content-center justify-content-md-start">

                                            <div id="top-bar" class="transparent-topbar border-0 py-md-2">
                                                <div class="container">
                                                    <div class="row align-items-center">

                                                        <ul id="top-social" class="justify-content-center justify-content-lg-end">
                                                            <li>
                                                                <a href="#" class="h-bg-facebook">
                                                                    <span class="ts-icon">
                                                                        <i class="fa-brands fa-facebook-f" style="font-size: 16px;"></i>
                                                                    </span>
                                                                    <span class="ts-text">
                                                                        Facebook
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="h-bg-linkedin">
                                                                    <span class="ts-icon">
                                                                        <i class="fa-brands fa-linkedin-in" style="font-size: 16px;"></i>
                                                                    </span>
                                                                    <span class="ts-text">
                                                                        Linkedin
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="h-bg-x-twitter">
                                                                    <span class="ts-icon">
                                                                        <i class="fa-brands fa-x-twitter" style="font-size: 16px;"></i>
                                                                    </span>
                                                                    <span class="ts-text">
                                                                        Twitter
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="h-bg-copy-link">
                                                                    <span class="ts-icon">
                                                                        <i class="fa-solid fa-link" style="font-size: 16px;"></i>
                                                                    </span>
                                                                    <span class="ts-text">
                                                                        Copy Link
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        </ul>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 team-desc press-btn mt-3">
                                    <a href="{{ route('press.release.single') }}" class="btn border-0 custom-btn-5">
                                        <span class="custom-btn-4">
                                             Read More
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 py-3">
                    <div class="row team blog team-list g-0 align-items-center custom-left-shadow-light all-ts overflow-hidden" style="border-radius: 10px;">
                        <div class="col-md-4 team-image col-sm-4 d-flex align-self-stretch">
                            <img src="https://source.unsplash.com/fIHozNWfcvs/800x450" alt="" style="height: 310px;">
                        </div>
                        <div class="col-md-8 col-sm-8 p-4">
                            <div class="team-desc text-start">
                                <div class="team-title pt-0 mb-3">
                                    <a href="{{ route('press.release.single') }}" class="text-black">
                                        <h2 class="text-break fw-700">dfsjshfdks dshfkdsh khfdshf hdsfkhdsf khfdshf hdsfkhdsf</h2>
                                    </a>
                                    <span class="fst-normal text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias amet consequuntur cupiditate dolor in maiores molestias odit quae suscipit tenetur. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid asperiores aut, earum eveniet incidunt ipsam maxime mollitia nulla provident voluptates.</span>
                                </div>
                                <p class="mb-3"></p>
                            </div>
                            <div class="row justify-content-between d-flex">
                                <div class="col-lg-6 col-md-6 col-sm-12 team-desc text-start">
                                    <div class="text-center text-md-start">
                                        <div class="d-flex justify-content-center justify-content-md-start">

                                            <div id="top-bar" class="transparent-topbar border-0 py-md-2">
                                                <div class="container">
                                                    <div class="row align-items-center">

                                                        <ul id="top-social" class="justify-content-center justify-content-lg-end">
                                                            <li>
                                                                <a href="#" class="h-bg-facebook">
                                                                    <span class="ts-icon">
                                                                        <i class="fa-brands fa-facebook-f" style="font-size: 16px;"></i>
                                                                    </span>
                                                                    <span class="ts-text">
                                                                        Facebook
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="h-bg-linkedin">
                                                                    <span class="ts-icon">
                                                                        <i class="fa-brands fa-linkedin-in" style="font-size: 16px;"></i>
                                                                    </span>
                                                                    <span class="ts-text">
                                                                        Linkedin
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="h-bg-x-twitter">
                                                                    <span class="ts-icon">
                                                                        <i class="fa-brands fa-x-twitter" style="font-size: 16px;"></i>
                                                                    </span>
                                                                    <span class="ts-text">
                                                                        Twitter
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="h-bg-copy-link">
                                                                    <span class="ts-icon">
                                                                        <i class="fa-solid fa-link" style="font-size: 16px;"></i>
                                                                    </span>
                                                                    <span class="ts-text">
                                                                        Copy Link
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        </ul>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 team-desc press-btn mt-3">
                                    <a href="{{ route('press.release.single') }}" class="btn border-0 custom-btn-5">
                                        <span class="custom-btn-4">
                                             Read More
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 py-3">
                    <div class="row team blog team-list g-0 align-items-center custom-left-shadow-light all-ts overflow-hidden" style="border-radius: 10px;">
                        <div class="col-md-4 team-image col-sm-4 d-flex align-self-stretch">
                            <img src="https://source.unsplash.com/fIHozNWfcvs/800x450" alt="" style="height: 310px;">
                        </div>
                        <div class="col-md-8 col-sm-8 p-4">
                            <div class="team-desc text-start">
                                <div class="team-title pt-0 mb-3">
                                    <a href="{{ route('press.release.single') }}" class="text-black">
                                        <h2 class="text-break fw-700">dfsjshfdks dshfkdsh khfdshf hdsfkhdsf khfdshf hdsfkhdsf</h2>
                                    </a>
                                    <span class="fst-normal text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias amet consequuntur cupiditate dolor in maiores molestias odit quae suscipit tenetur. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid asperiores aut, earum eveniet incidunt ipsam maxime mollitia nulla provident voluptates.</span>
                                </div>
                                <p class="mb-3"></p>
                            </div>
                            <div class="row justify-content-between d-flex">
                                <div class="col-lg-6 col-md-6 col-sm-12 team-desc text-start">
                                    <div class="text-center text-md-start">
                                        <div class="d-flex justify-content-center justify-content-md-start">

                                            <div id="top-bar" class="transparent-topbar border-0 py-md-2">
                                                <div class="container">
                                                    <div class="row align-items-center">

                                                        <ul id="top-social" class="justify-content-center justify-content-lg-end">
                                                            <li>
                                                                <a href="#" class="h-bg-facebook">
                                                                    <span class="ts-icon">
                                                                        <i class="fa-brands fa-facebook-f" style="font-size: 16px;"></i>
                                                                    </span>
                                                                    <span class="ts-text">
                                                                        Facebook
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="h-bg-linkedin">
                                                                    <span class="ts-icon">
                                                                        <i class="fa-brands fa-linkedin-in" style="font-size: 16px;"></i>
                                                                    </span>
                                                                    <span class="ts-text">
                                                                        Linkedin
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="h-bg-x-twitter">
                                                                    <span class="ts-icon">
                                                                        <i class="fa-brands fa-x-twitter" style="font-size: 16px;"></i>
                                                                    </span>
                                                                    <span class="ts-text">
                                                                        Twitter
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="h-bg-copy-link">
                                                                    <span class="ts-icon">
                                                                        <i class="fa-solid fa-link" style="font-size: 16px;"></i>
                                                                    </span>
                                                                    <span class="ts-text">
                                                                        Copy Link
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        </ul>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 team-desc press-btn mt-3">
                                    <a href="{{ route('press.release.single') }}" class="btn border-0 custom-btn-5">
                                        <span class="custom-btn-4">
                                             Read More
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <style>
        .h-bg-copy-link{
            background-color: white !important;
            color: #F8C243 !important;
        }
        .h-bg-copy-link:hover{
            color: white !important;
            background-color: #F8C243 !important;
        }
        .h-bg-facebook{
            /*background-color: white !important;*/
            color: #F8C243 !important;
        }
        .h-bg-facebook:hover{
            color: white !important;
        }
        .h-bg-linkedin{
            /*background-color: white !important;*/
            color: #F8C243 !important;
        }
        .h-bg-linkedin:hover{
            color: white !important;
        }
        .h-bg-x-twitter{
            /*background-color: white !important;*/
            color: #F8C243 !important;
        }
        .h-bg-x-twitter:hover{
            color: white !important;
        }

    </style>

@endsection


