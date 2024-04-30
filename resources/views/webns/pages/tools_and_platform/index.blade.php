@extends('webns.master')

@section('title')
    Tools & Platform
@endsection

@section('content')

    {{--    Left Side Social Icon--}}
    <section class="left-social-icons">
        @include('webns.include.left-side-social-icon')
    </section>

    <section class="py-3">
        @include('webns.pages.tools_and_platform.include.hero-section')
        @include('webns.pages.tools_and_platform.include.heading')
        @include('webns.pages.tools_and_platform.include.tools_and_platform')
        @include('webns.pages.tools_and_platform.include.contact')
    </section>

@endsection
