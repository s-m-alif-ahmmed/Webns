@extends('webns.master')

@section('title')
    All Products
@endsection

@section('content')

    {{--    Left Side Social Icon--}}
    <section class="left-social-icons">
        @include('webns.include.left-side-social-icon')
    </section>

    <section class="py-3">
        @include('webns.pages.all_product.include.hero-section')
        @include('webns.pages.all_product.include.heading')
        @include('webns.pages.all_product.include.products')
        @include('webns.pages.all_product.include.contact')
    </section>

@endsection
