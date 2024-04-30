<!-- Header -->
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
<nav id="nav" class="nav scrolled">
    <i class="uil uil-bars navOpenBtn"></i>
    {{--    Logo--}}
    <div id="logo" class="me-lg-0 my-1">
        <a href="{{ route('home') }}" class="logo">
            <img class="img-fluid" srcset="{{ asset('/') }}company/images/header/logo_animation_header.gif, {{ asset('/') }}company/images/header/logo_animation_header.gif 2x" src="{{ asset('/') }}company/images/header/logo_animation_header.gif" alt="Webns Logo">
        </a>
    </div>
    <!-- #logo end -->

    <ul class="nav-links">
        <i class="uil uil-times navCloseBtn text-white"></i>
        <li>
            <a href="{{ route('home') }}">
                <i class="fa-solid fa-house home-icon" style="font-size: 16px;"></i>
            </a>
        </li>
        <li>
            <a class="menu-bottom-hover fw-500" href="{{ route('home.product') }}">
                All Products
            </a>
        </li>
{{--        <li>--}}
{{--            <a class="menu-bottom-hover fw-500" href="{{ route('home.service') }}">--}}
{{--                Services--}}
{{--            </a>--}}
{{--        </li>--}}
        <li>
            <a class="menu-bottom-hover fw-500" href="{{ route('home.tools') }}">
                Tools & Platform
            </a>
        </li>
{{--        <li>--}}
{{--            <a class="menu-bottom-hover fw-500" href="{{ route('home.industries') }}">--}}
{{--                Industries--}}
{{--            </a>--}}
{{--        </li>--}}
        <li>
            <a class="menu-bottom-hover fw-500" href="{{ route('about') }}">
                About
            </a>
        </li>
        <li>
            <a class="menu-bottom-hover fw-500" href="{{ route('contact') }}">
                Contact
            </a>
        </li>
        <li>
            <a class="menu-bottom-hover fw-500" href="{{ route('career') }}">
                Career
            </a>
        </li>
        <li class="" style="margin-top: -6px;">
            <a href="{{ route('demo.request') }}" class="btn get-demo-btn border-0 text-white fw-bold">Get Demo</a>
        </li>
        <li class="menu-copyright">
            <p class="text-black" style="font-size: 12px;">
                Copyrights Reserved.
            </p>
        </li>
    </ul>

    <i class="uil uil-search search-icon" id="searchIcon"></i>
    <div class="search-box">
        <form class="d-flex" action="">
            <input type="text" placeholder="Search here..." />
            <button type="submit" class="border-0 bg-transparent">
                <i class="uil uil-search search-icon"></i>
            </button>

        </form>
    </div>
</nav>
<!-- #header end -->

<style>

</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // jQuery code to handle scroll and update header height
    // $(document).ready(function () {
    //     // Initial scroll position check
    //     checkScroll();
    //
    //     // Scroll event listener
    //     $(window).scroll(function () {
    //         checkScroll();
    //     });
    //
    //     // var scrollTimeout;
    //     // $(window).scroll(function () {
    //     //     clearTimeout(scrollTimeout);
    //     //     scrollTimeout = setTimeout(checkScroll, 10); // Adjust debounce interval as needed
    //     // });
    //
    //     function checkScroll() {
    //         var scrollDistance = $(window).scrollTop();
    //
    //         // Change header height when scrolling down
    //         if (scrollDistance >= 520) {
    //             $('nav').addClass('scrolled');
    //         } else {
    //             $('nav').removeClass('scrolled');
    //         }
    //     }
    // });

    window.addEventListener('scroll', function() {
        var header = document.getElementById('nav');
        if (window.scrollY > 500) {
            header.style.height = '60px';
        } else {
            header.style.height = '75px';
        }
    });

    // Set initial height to 75px when the page loads
    window.addEventListener('load', function() {
        var header = document.getElementById('nav');
        header.style.height = '75px';
    });

    const nav = document.querySelector(".nav"),
        searchIcon = document.querySelector("#searchIcon"),
        searchBox = document.querySelector(".search-box"),
        navOpenBtn = document.querySelector(".navOpenBtn"),
        navCloseBtn = document.querySelector(".navCloseBtn");

    searchIcon.addEventListener("click", () => {
        nav.classList.toggle("openSearch");
        nav.classList.remove("openNav"); // Close navigation menu when opening search input
        // if (nav.classList.contains("openSearch")) {
        //     searchIcon.classList.replace("uil-search", "uil-times");
        // } else {
        //     searchIcon.classList.replace("uil-times", "uil-search");
        // }
    });

    navOpenBtn.addEventListener("click", () => {
        nav.classList.add("openNav");
        nav.classList.remove("openSearch");
        searchIcon.classList.replace("uil-times", "uil-search");
    });

    navCloseBtn.addEventListener("click", () => {
        nav.classList.remove("openNav");
    });

    document.addEventListener("click", function(event) {
        const isClickInsideNav = nav.contains(event.target);
        if (!isClickInsideNav) {
            nav.classList.remove("openSearch");
            // searchIcon.classList.replace("uil-times", "uil-search",);
        }
    });

</script>
