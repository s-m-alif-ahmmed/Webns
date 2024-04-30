@extends('webns.master')

@section('title')
    Services
@endsection

@section('content')
    {{--    Left Side Social Icon--}}
    <section class="left-social-icons">
        @include('webns.include.left-side-social-icon')
    </section>

    <section class="py-3">
        @include('webns.pages.services.include.hero-section')
        @include('webns.pages.services.include.heading')
        @include('webns.pages.services.include.services')
        @include('webns.pages.services.include.contact')
    </section>

@endsection
