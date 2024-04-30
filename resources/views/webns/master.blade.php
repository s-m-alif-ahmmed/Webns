<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Google Search Console-->
    <meta name="google-site-verification" content="7nBsThKNsdRm4-rZ6hGmLZf08YqN76HdWaiXboSD_BY" />

    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-EPF6YPBJX8"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-EPF6YPBJX8');
</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PXV88M5H');</script>
<!-- End Google Tag Manager -->

{{--Meta Infos--}}
    @yield('meta-info')

{{--    CSS Links--}}
    @include('webns.include.css')

    <!-- Document Title
    ============================================= -->
    <title>@yield('title')</title>

</head>

<body class="stretched" data-menu-breakpoint="1200">


<style>
    body.loading {
        overflow: hidden;
    }

    #global-loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #FFFFFF; /* Change background color if needed */
        z-index: 9999999;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .spinner {
        width: 80px;
        height: 80px;
        display: grid;
        border: 4.5px solid #0000;
        border-radius: 50%;
        border-color: #ffffff #fba000;
        animation: spinner-e04l1k 1s infinite linear;
    }

    .spinner::before,
    .spinner::after {
        content: "";
        grid-area: 1/1;
        margin: 2.2px;
        border: inherit;
        border-radius: 50%;
    }

    .spinner::before {
        border-color: #ffffff #ffb400;
        animation: inherit;
        animation-duration: 0.5s;
        animation-direction: reverse;
    }

    .spinner::after {
        margin: 8.9px;
    }

    @keyframes spinner-e04l1k {
        100% {
            transform: rotate(1turn);
        }
    }
</style>

<!-- GLOBAL-LOADER -->
<div id="global-loader">
    <div class="spinner">
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        // Check if the page is the home page
        if (window.location.pathname === '/' || window.location.pathname === '/index.html') {
            // Hide the preloader after 5 seconds on the home page
            setTimeout(function(){
                document.getElementById('global-loader').style.display = 'none';
                document.body.classList.remove('loading'); // Re-enable scrolling
            }, 3000); // 3000 milliseconds = 5 seconds

            // Disable scrolling while preloader is displayed
            document.body.classList.add('loading');
        } else {
            // If it's not the home page, immediately hide the preloader
            document.getElementById('global-loader').style.display = 'none';
        }
    });
</script>


<!-- Document Wrapper
============================================= -->
<div id="wrapper">

    <!-- Header
    ============================================= -->
    @include('webns.include.header')
    <!-- #header end -->

{{--    Main section--}}
    @yield('content')
{{--    End Main Section--}}

    <!-- Footer
    ============================================= -->
    @include('webns.include.footer')
    <!-- #footer end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
@include('webns.include.top')

<!-- JavaScripts
============================================= -->
@include('webns.include.js')


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PXV88M5H"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

</body>
</html>
