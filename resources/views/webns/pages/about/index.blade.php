@extends('webns.master')

@section('title')
    About
@endsection

@section('content')

    {{--    Left Side Social Icon--}}
    <section class="left-social-icons">
        @include('webns.include.left-side-social-icon')
    </section>

    {{--  About Us--}}
    <section>
        @include('webns.pages.about.include.about-us')
    </section>

    {{--  team--}}
    <section>
        @include('webns.pages.about.include.team')
    </section>

    {{--  Achivements--}}
{{--    <section>--}}
{{--        @include('webns.pages.about.include.achivements')--}}
{{--    </section>--}}

@endsection

