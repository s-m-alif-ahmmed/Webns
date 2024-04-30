@extends('webns.master')

@section('title')
    Events
@endsection

@section('content')

    {{--    Left Side Social Icon--}}
    <section class="left-social-icons">
        @include('webns.include.left-side-social-icon')
    </section>

    <section class="py-5">

        @include('webns.pages.events.include.events')

    </section>

@endsection


