@extends('webns.master')

@section('title')
    WEBNS Technology Ltd.
@endsection

@section('meta-info')
    <meta name="author" content="S M Alif Ahmmed">
    <meta name="description" content="Get Canvas to build powerful websites easily with the Highly Customizable &amp; Best Selling Bootstrap Template, today.">
@endsection

@section('content')

    {{--    Left Side Social Icon--}}
    <section class="left-social-icons">
        @include('webns.include.left-side-social-icon')
    </section>

    {{--   Right Side Subscribe button--}}
    <section>
        @include('webns.include.right-side-subscribe-button')
    </section>


    {{-- Hero section animation --}}
    <section class="">
        @include('webns.pages.home.include.hero-section')
    </section>

    <!-- product logo carousel-->
    <section class="pb-2" style="background-color: #FFFFFF;">
        @include('webns.pages.home.include.product-logos')
    </section>
    <!-- carousel slider end -->

    {{-- Features --}}
    <section id="content" class="my-5">
        @include('webns.pages.home.include.features')
    </section>
    {{-- Features end --}}

    {{-- Addition Products --}}
    <section id="content" class="px-5 py-3">
        @include('webns.pages.home.include.more-products')
    </section>
    {{-- Addition Products end --}}

    {{-- services --}}
    <section id="content">
        @include('webns.pages.home.include.services')
    </section>
    {{-- services end --}}

{{--    platform Indepent--}}
    <section class="py-5">
        @include('webns.pages.home.include.platform-independent')
    </section>
    {{--    platform Indepent end--}}

    {{-- Company About --}}
    <section id="content" style="background-color: #ffffff">
        @include('webns.pages.home.include.company-about')
    </section>
    {{-- Company About end--}}

    {{--Demo Process Flow--}}
    <section class="py-5">
        @include('webns.pages.home.include.demo-process-flow')
    </section>
    {{--Demo Process Flow end--}}

    {{--Client Companies Logos--}}
    <section class="py-3">
        @include('webns.pages.home.include.client-logos')
    </section>
    {{--Client Companies Logos end--}}

    {{--    Testimonials--}}
{{--    <section class="py-5">--}}
{{--        @include('webns.pages.home.include.client-testimonials')--}}
{{--    </section>--}}
    {{--    Testimonials end--}}

    {{--    Contact Us--}}
    <section class="pt-3 pb-0">
        @include('webns.pages.home.include.contact-us')
    </section>
    {{--Contact Us End--}}


@endsection
