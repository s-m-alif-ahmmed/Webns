@extends('webns.master')

@section('title')
    Gallery
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
                        <p class="fw-900 text-uppercase heading-down-style">View Our</p>
                        <p class="fw-900 top-contact text-capitalize heading-top-style">Gallery</p>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center p-0 m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}" style="color: var(--ash)!important; font-size: 14px; position: relative; z-index: 3;">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <span style="font-size: 14px; position: relative; z-index: 3;">
                                        Gallery
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
                <div class="col-md-12">
                    <div class="grid-filter-wrap bg-white justify-content-start">

                        <div id="dropdown-filter" class="border-0">

                            <nav class="navbar navbar-expand-lg bg-white">
                                <ul class="navbar-nav custom-filter border-default rounded-0" data-container="#dropdown-filter-content">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link btn btn-sm filter-btn" data-filter="*">Gallery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link btn btn-sm filter-btn" data-filter=".company">Company</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link btn btn-sm filter-btn" data-filter=".expo">Expo</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link btn btn-sm filter-btn" data-filter=".picnic">Picnic</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link btn btn-sm filter-btn" data-filter=".events">Events</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <!-- Portfolio Single Image-->
                    <div id="dropdown-filter-content" class="grid-container" data-lightbox="gallery" style="padding: 20px;">
                        <div class="gallery-item basis">
                            <a href="{{ asset('/') }}company/images/section/gallery/chhuya_agro_1.jpg" data-lightbox="gallery-item" class="col">
                                <img class="" src="{{ asset('/') }}company/images/section/gallery/Basis/basis_soft_expo_2023_webns_technology_ltd.jpg" alt="basis_soft_expo_2023_webns_technology_ltd" style="height: 250px; width: 350px;">
                            </a>
                        </div>
                        <div class="gallery-item birthday">
                            <a href="{{ asset('/') }}company/images/section/gallery/chhuya_agro_2.jpg" data-lightbox="gallery-item" class="col">
                                <img class="" src="{{ asset('/') }}company/images/section/gallery/Birthday/Birthday_Celebration_managing_director_webns_technology_ltd.jpg" alt="Birthday_Celebration_managing_director_webns_technology_ltd" style="height: 250px; width: 350px;">
                            </a>
                        </div>
                        <div class="gallery-item birthday">
                            <a href="{{ asset('/') }}company/images/section/gallery/Everest_pharma_1.jpg" data-lightbox="gallery-item" class="col">
                                <img class="" src="{{ asset('/') }}company/images/section/gallery/Birthday/Office_picnic_webns_technology_ltd.jpg" alt="Office_picnic_webns_technology_ltd" style="height: 250px; width: 350px;">
                            </a>
                        </div>
                        <div class="gallery-item birthday">
                            <a href="{{ asset('/') }}company/images/section/gallery/Everest_pharma_2.jpg" data-lightbox="gallery-item" class="col">
                                <img class="" src="{{ asset('/') }}company/images/section/gallery/Birthday/Office_picnic_01_webns_technology_ltd.jpg" alt="Office_picnic_01_webns_technology_ltd" style="height: 250px; width: 350px;">
                            </a>
                        </div>
                        <div class="gallery-item birthday">
                            <a href="{{ asset('/') }}company/images/section/gallery/ibn_sina.jpg" data-lightbox="gallery-item" class="col">
                                <img class="" src="{{ asset('/') }}company/images/section/gallery/Birthday/Office_picnic_03_webns_technology_ltd.jpg" alt="Office_picnic_03_webns_technology_ltd" style="height: 250px; width: 350px;">
                            </a>
                        </div>
                        <div class="gallery-item birthday">
                            <a href="{{ asset('/') }}company/images/section/gallery/ibn_sina_2.jpg" data-lightbox="gallery-item" class="col">
                                <img class="" src="{{ asset('/') }}company/images/section/gallery/Birthday/Office_picnic_04_webns_technology_ltd.jpg" alt="Office_picnic_04_webns_technology_ltd" style="height: 250px; width: 350px;">
                            </a>
                        </div>
                        <div class="gallery-item birthday">
                            <a href="{{ asset('/') }}company/images/section/gallery/Orion.jpg" data-lightbox="gallery-item" class="col">
                                <img class="" src="{{ asset('/') }}company/images/section/gallery/Birthday/Office_picnic_05_webns_technology_ltd.jpg" alt="Office_picnic_05_webns_technology_ltd" style="height: 250px; width: 350px;">
                            </a>
                        </div>
                        <div class="gallery-item birthday">
                            <a href="{{ asset('/') }}company/images/section/gallery/Popular.jpg" data-lightbox="gallery-item" class="col">
                                <img class="" src="{{ asset('/') }}company/images/section/gallery/Birthday/Office_picnic_06_webns_technology_ltd.jpg" alt="Office_picnic_06_webns_technology_ltd" style="height: 250px; width: 350px;">
                            </a>
                        </div>
                        <div class="gallery-item chhuya">
                            <a href="{{ asset('/') }}company/images/section/gallery/pharma_expo.jpg" data-lightbox="gallery-item" class="col">
                                <img class="" src="{{ asset('/') }}company/images/section/gallery/Chhuya/pharma_expo.jpg" alt="Image" style="height: 250px; width: 350px;">
                            </a>
                        </div>
                        <div class="gallery-item chhuya">
                            <a href="{{ asset('/') }}company/images/section/gallery/picnic.jpg" data-lightbox="gallery-item" class="col">
                                <img class="" src="{{ asset('/') }}company/images/section/gallery/Chhuya/picnic.jpg" alt="Image" style="height: 250px; width: 350px;">
                            </a>
                        </div>
                        <div class="gallery-item chhuya">
                            <a href="{{ asset('/') }}company/images/section/gallery/iftar_2024_5.jpg" data-lightbox="gallery-item" class="col">
                                <img class="" src="{{ asset('/') }}company/images/section/gallery/Chhuya/iftar_2024_5.jpg" alt="Image" style="height: 250px; width: 350px;">
                            </a>
                        </div>
                        <div class="gallery-item chhuya">
                            <a href="{{ asset('/') }}company/images/section/gallery/iftar_2024_5.jpg" data-lightbox="gallery-item" class="col">
                                <img class="" src="{{ asset('/') }}company/images/section/gallery/Chhuya/iftar_2024_5.jpg" alt="Image" style="height: 250px; width: 350px;">
                            </a>
                        </div>
                    </div>
                    <!-- single-image end -->
                </div>
            </div>

        </div>
    </section>

@endsection

