@extends('webns.master')

@section('title')
    Blog Detail
@endsection

@section('meta-info')
{{--    @if($blog)--}}
{{--        <meta name="author" content="{{ $blog->user->name }}">--}}
        <meta name="title" content="{{ $blog->meta_title }}">
        <meta name="description" content="{{ $blog->meta_description }}">
{{--    @endif--}}
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
                        <p class="fw-900 text-uppercase heading-down-style">Read Some</p>
                        <p class="fw-900 top-contact text-capitalize heading-top-style">Blog Detail</p>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center p-0 m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: var(--ash)!important; font-size: 14px; position: relative; z-index: 3;">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('home.blog') }}" style="color: var(--ash)!important; font-size: 14px; position: relative; z-index: 3;">Blogs</a></li>
                                <li class="breadcrumb-item active">
                                    <span style="font-size: 14px; position: relative; z-index: 3;">
                                        Blog Detail
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
                <div class="col-md-8">
                    <div class="row">
                            @if($blog->status == 'Publish')
                                <div class="col-lg-12 py-3">
                                    <div class="card p-4 border custom-left-shadow-light h-translatey-sm all-ts overflow-hidden" style="border-radius: 10px;">
                                        <h3 class="pt-3">{{ $blog->title }}</h3>
                                        <span class="d-flex">
                                            <hr style="width: 15px; margin-top: 13px !important;" />
                                            <p class="ps-2">{{ $blog->category->name }}</p>
                                        </span>
                                        <img class="py-3" src="{{ asset( $blog->image) }}" alt="{{ $blog->alt }}" style="height: 400px; width: auto;" />
                                        <span class="py-3">
                                            {!! $blog->description !!}
                                        </span>
                                    </div>
                                </div>
                            @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 px-4 py-3">
                            <div class="row card py-2 border custom-left-shadow-light h-translatey-sm all-ts overflow-hidden" style="border-radius: 10px;">
                                <h3 class="px-4 pt-3 pb-2 fw-700" style="color: var(--ash);">Popular Blogs</h3>
                                @foreach($blogs as $popularBlog)
                                    @if($popularBlog->status == 'Publish')
                                        @if($popularBlog->popular_status == 'active')
                                            <div class="d-flex py-2 border-top">
                                                <div class="col-md-4">
                                                    <img src="{{asset($popularBlog->image)}}" alt="{{$popularBlog->alt}}" style="border-radius: 10px;">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="p-2">
                                                        <a href="{{ route('blog.single', $popularBlog->slug) }}" style="color: black;">
                                                            <h5>{{ $popularBlog->title }}</h5>
                                                        </a>
                                                        <p class="text-muted">{{ $popularBlog->category->name }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
