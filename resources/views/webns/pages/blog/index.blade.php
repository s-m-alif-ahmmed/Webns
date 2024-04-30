@extends('webns.master')

@section('title')
    Blog
@endsection

@section('meta-info')
    <meta name="author" content="SemiColonWeb">
    <meta name="description" content="Get Canvas to build powerful websites easily with the Highly Customizable &amp; Best Selling Bootstrap Template, today.">
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
                        <p class="fw-900 top-contact text-capitalize heading-top-style">Blog</p>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center p-0 m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}" style="color: var(--ash)!important; font-size: 14px; position: relative; z-index: 3;">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <span style="font-size: 14px; position: relative; z-index: 3;">
                                         Blogs
                                    </span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row blog-orders">
                @if($blogs->isEmpty() || $blogs->every(function($blog) { return $blog->status != 'Publish'; }) )
                    <div class="col-md-10 mx-auto">
                        <div class="card shadow p-3">
                            <p class="text-center fs-2">No Blogs are Available Right Now</p>
                            <p class="text-center">Currently no Blogs are available.</p>
{{--                            <p class="text-center">Email: career@websntech.net</p>--}}
                        </div>
                    </div>
                @else
                <div class="col-md-8">
                    <div class="row">
                        <div class="blogs" id="blogs">
                            @foreach($blogs as $blog)
                                @php
                                    $category = $blog->category; // Assuming the category relationship is named 'category'
                                @endphp

                                @if($category && $category->status == 'active' && $blog->status == 'Publish')
                                    <div class="col-lg-12 py-3">
                                        <div class="row team blog team-list {{ $category->name }} g-0 align-items-center custom-left-shadow-light h-translatey-sm all-ts overflow-hidden" style="border-radius: 10px;">
                                            <div class="col-md-5 team-image col-sm-5 d-flex align-self-stretch">
                                                <img src="{{asset($blog->image)}}" alt="{{$blog->alt}}" style="height: 320px;">
                                            </div>
                                            <div class="col-md-7 col-sm-7 p-4">
                                                <div class="team-desc text-start">
                                                    <div class="team-title pt-0 mb-3">
                                                        <h4 class="text-break ">{{$blog->title}}</h4>
                                                        <span class="fst-normal">{{$blog->user->name}}</span>
                                                    </div>
                                                    <p class="mb-3">{{$blog->short_description}}</p>
                                                </div>
                                                <div class="justify-content-between d-flex">
                                                    <div class="team-desc text-start">
                                                        <a href="#" class="social-icon inline-block si-small rounded-circle text-light border-0 bg-facebook">
                                                            <i class="fa-brands fa-facebook-f"></i>
                                                            <i class="fa-brands fa-facebook-f"></i>
                                                        </a>
                                                        <a href="#" class="social-icon inline-block si-small rounded-circle text-light border-0 bg-x-twitter">
                                                            <i class="fa-brands fa-x-twitter"></i>
                                                            <i class="fa-brands fa-x-twitter"></i>
                                                        </a>
                                                        <a href="#" class="social-icon inline-block si-small rounded-circle text-light border-0 bg-google">
                                                            <i class="fa-brands fa-google"></i>
                                                            <i class="fa-brands fa-google"></i>
                                                        </a>
                                                    </div>
                                                    <div class="team-desc text-end mt-3">
                                                        <a href="{{ route('blog.single', $blog->slug) }}" class="btn custom-btn-5 border-0">
                                                            <span class="custom-btn-4">
                                                                 Read More
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                            <div class="pagination-simple col-md-12 pt-5">
                                {{ $blogs->links('pagination::bootstrap-5') }}
                            </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 py-3">
                            <div class="row team team-list g-0 align-items-center custom-left-shadow-light border h-translatey-sm all-ts overflow-hidden" style="border-radius: 10px;">
                                <h3 class="px-4 pt-3 pb-2 border-bottom fw-700" style="color: var(--ash);">Category</h3>
                                <ul class="blogFilter">
                                    <li class="activeFilter">
                                        <a href="#" class="fw-semibold px-4 py-2" data-filter="all">All</a>
                                    </li>
                                    @foreach($categories as $category)
                                        @if($category->status == 'active')
                                            <li class="">
                                                <a href="#" class="fw-semibold px-4 py-2" data-filter=".{{ $category->name }}">{{ $category->name }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @if($blogs->isEmpty() || $blogs->every(function($blog) { return $blog->popular_status != 'active'; }) )
                        @else
                            <div class="col-md-12 p-4">
                                <div class="row card py-2 border custom-left-shadow-light h-translatey-sm all-ts overflow-hidden" style="border-radius: 10px;">
                                    <h3 class="px-4 pt-3 pb-2 fw-700" style="color: var(--ash);">Popular Blogs</h3>
                                    @foreach($blogs as $poluperBlog)
                                        @if($poluperBlog->status == 'Publish')
{{--                                            @if($poluperBlog->popular_status == 'active')--}}
                                                <div class="d-flex py-2 border-top">
                                                    <div class="col-md-4">
                                                        <img src="{{asset($poluperBlog->image)}}" alt="{{$poluperBlog->alt}}" style="border-radius: 10px;">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="p-2">
                                                            <a href="{{ route('blog.single', $poluperBlog->slug) }}" style="color: black;">
                                                                <h5>{{ $poluperBlog->title }}</h5>
                                                            </a>
                                                            <p class="text-muted">{{ $poluperBlog->category->name }}</p>
                                                        </div>
                                                    </div>
                                                </div>
{{--                                            @endif--}}
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
                @endif
            </div>
        </div>

    </section>

    <script>
        jQuery(document).ready(function(){
            var $blogItems = jQuery('#blogs .blog');
            if( window.location.hash != '' ) {
                var getBlogFilterHash = window.location.hash;
                var hashBlogFilter = getBlogFilterHash.split('#');
                if( $blogItems.hasClass( hashBlogFilter[1] ) ) {
                    jQuery('.blogFilter li').removeClass('activeFilter');
                    jQuery( '[data-filter=".'+ hashBlogFilter[1] +'"]' ).parent('li').addClass('activeFilter');
                    var hashBlogSelector = '.' + hashBlogFilter[1];
                    $blogItems.css('display', 'none');
                    if( hashBlogSelector != 'all' ) {
                        jQuery( hashBlogSelector ).fadeIn(500);
                    } else {
                        $blogItems.fadeIn(500);
                    }
                }
            }

            jQuery('.blogFilter a').on( 'click', function(){
                jQuery('.blogFilter li').removeClass('activeFilter');
                jQuery(this).parent('li').addClass('activeFilter');
                var blogSelector = jQuery(this).attr('data-filter');
                $blogItems.css('display', 'none');
                if( blogSelector != 'all' ) {
                    jQuery( blogSelector ).fadeIn(500);
                } else {
                    $blogItems.fadeIn(500);
                }
                return false;
            });
        });
    </script>

@endsection
