@extends('webns.master')

@section('title')
    FAQ
@endsection

@section('content')

    {{--    Left Side Social Icon--}}
    <section class="left-social-icons">
        @include('webns.include.left-side-social-icon')
    </section>

    <section id="content">
        <div class="content-wrap">

            <div class="container-fluid pb-3 mb-2">
                <div class="row">
                    <div class="col-md-12 p-0 text-center">
                        <div class="top-text" style="height: 100px; position: relative; overflow: hidden;">
                            <p class="fw-900 text-uppercase heading-down-style">FAQ</p>
                            <p class="fw-900 top-contact text-capitalize heading-top-style">Frequently Asked Questions</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 justify-content-end">
                        <div class="row">
                            <div class="py-3">
                                <!-- Search -->
                                <p class="text-success text-muted text-center">{{session('message')}}</p>
                                <form action="{{ route('faq.search.result') }}" method="GET">
                                    @csrf
                                    <div class="Hotbg float-end " style="">
                                        <input type="text" name="faq_search" value="{{ Request::get('faq_search') }}" class="Hotbg-txt" placeholder="Search FAQ">
                                        <button type="submit" class="Hotbg-btn btn rounded-circle">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                                <!-- #search end -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">

                        <!-- FAQs - Filter -->
                        <ul class="grid-filter flex-column align-items-start customjs shadow-sm rounded-2">

                            <li class="activeFilter rounded-2">
                                <a href="#" class="fw-semibold border-top" data-filter="all">All</a>
                            </li>
                            @foreach($faq_categories as $category)
                                @if($category->status == 'active')
                                    <li><a href="#" class="fw-semibold border-top" data-filter=".{{ $category->english }}">{{ $category->english }}</a></li>
                                @endif
                            @endforeach

                        </ul>

                    </div>

                    <div class="col-lg-9 ps-0">

                        <!-- FAQs - Filter Content
                        ============================================= -->
                        <div id="faqs" class="faqs ">
                            @foreach($searchFaqs as $faq)
                                @php
                                    $faqCategory = $faq->faq_category; // Assuming the category relationship is named 'category'
                                @endphp
                                @if($faqCategory && $faqCategory->status == 'active' && $faq->status == 'active')

                                <div class="toggle faq pb-3 pt-2 px-3 mb-3 {{ $faqCategory->english }} back-gradient-ash rounded-2">
                                    <div class="toggle-header">
                                        <div class="toggle-title ps-1" style="color: #4b4949;">
                                            {{$faq->question}}
                                        </div>
                                        <div class="toggle-icon">
                                            <i class="toggle-closed text-black fa-solid fa-chevron-down"></i>
                                            <i class="toggle-open text-black fa-solid fa-chevron-up"></i>
                                        </div>
                                    </div>
                                    <div class="toggle-content card text-justify text-black px-4 m-2" style="background-color: rgb(251,160,0)" >
                                        <p>
                                            {{ $faq->answer }}
                                        </p>
                                        @if($faq->single_image)
                                            <div class="container">
                                                <div class="row d-flex" data-lightbox="gallery">
                                                    <div class="col-md-12 col-sm-12">
                                                        <a href="{{ asset($faq->single_image) }}" data-lightbox="gallery-item">
                                                            <img class="p-1" src="{{ asset($faq->single_image) }}" alt="Gallery Thumb 1" style="height: 100px; width: auto; border-radius: 15px;">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="container">
                                            <div class="row d-flex" data-lightbox="gallery">
                                                @foreach($faq->faq_images as $faq_image)
                                                    <div class="col-md-4 col-sm-6">
                                                        <a href="{{ asset($faq_image->image) }}" data-lightbox="gallery-item">
                                                            <img class="p-1" src="{{ asset($faq_image->image) }}" alt="Gallery Thumb 1" style="height: 100px; width: auto; border-radius: 15px;">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endif
                            @endforeach

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="container-fluid  mb-3 px-0 mx-0 mt-0" style="height: 200px; width: auto; overflow: hidden;" >
            <div class="row">
                <div class="col-md-12 contact-section">
                    <img src="{{asset('/')}}company/images/section/section-images/contact-back-1.png" alt="">
                    <div class="text-center contact-text position-relative pt-4">
                        <h2 class="fw-700 text-white">"Still have a question? "</h2>
                        <p class="text-white col-md-7 mx-auto" style="font-size: 18px;">
                            If you can not find the answers of your questions in our FAQ, you can always Contact Us . We will get back to you shortly!
                        </p>
                        <a href="{{ route('contact') }}" class="btn border-0 custom-btn-4 fs-6">
                    <span class="custom-btn-2">
                        <span class="fw-bolder">
                            Click Here
                            <i class="fa-solid fa-angles-left" style="font-size: 12px;"></i>
                        </span>
                    </span>

                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <script>
        jQuery(document).ready(function(){
            var $faqItems = jQuery('#faqs .faq');
            if( window.location.hash != '' ) {
                var getFaqFilterHash = window.location.hash;
                var hashFaqFilter = getFaqFilterHash.split('#');
                if( $faqItems.hasClass( hashFaqFilter[1] ) ) {
                    jQuery('.grid-filter li').removeClass('activeFilter');
                    jQuery( '[data-filter=".'+ hashFaqFilter[1] +'"]' ).parent('li').addClass('activeFilter');
                    var hashFaqSelector = '.' + hashFaqFilter[1];
                    $faqItems.css('display', 'none');
                    if( hashFaqSelector != 'all' ) {
                        jQuery( hashFaqSelector ).fadeIn(500);
                    } else {
                        $faqItems.fadeIn(500);
                    }
                }
            }

            jQuery('.grid-filter a').on( 'click', function(){
                jQuery('.grid-filter li').removeClass('activeFilter');
                jQuery(this).parent('li').addClass('activeFilter');
                var faqSelector = jQuery(this).attr('data-filter');
                $faqItems.css('display', 'none');
                if( faqSelector != 'all' ) {
                    jQuery( faqSelector ).fadeIn(500);
                } else {
                    $faqItems.fadeIn(500);
                }
                return false;
            });

        });
    </script>

@endsection
