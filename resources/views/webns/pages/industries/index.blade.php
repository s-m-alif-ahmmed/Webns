@extends('webns.master')

@section('title')
    Industries
@endsection

@section('content')
    {{--    Left Side Social Icon--}}
    <section class="left-social-icons">
        @include('webns.include.left-side-social-icon')
    </section>

    <section class="py-3">
        @include('webns.pages.industries.include.hero-section')
        @include('webns.pages.industries.include.heading')
        @include('webns.pages.industries.include.industries')
        @include('webns.pages.industries.include.contact')
    </section>

@endsection
