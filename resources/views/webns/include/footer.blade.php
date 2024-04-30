<!-- Footer-->
<footer class="bg-white border-width-1 border-f5 block-footer-1"  style="overflow: hidden;">

    <div class="container ">

        <!-- Footer Widgets -->
        <div class="footer-widgets-wrap py-3">

            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12">

                    <div class="widget footer-logo">
                        <a href="{{ route('home') }}">
                            <img src="{{asset('/')}}company/images/footer/images/webns-logo.png" alt="Image" class="footer-logo " height="65">
                        </a>
                    </div>
                    <div class="lh-2 footer-contact">
                        <p class="fs-6">
                            <div class="fw-bolder" style="font-size: 28px;">Contact Us</div>
                            Contact: +88 01988-000800-01
                            <br>
                            Address:
                            Level-07, 152/2A-2, Rowshan Tower, Panthapath, Dhaka-1205.
                        </p>
                    </div>

                </div>

                <div class="col-lg-9 col-md-12 col-sm-12">

                    <div class="row gutter-50">

                        <div class="col-lg-3 col-md-6 col-sm-12">

                            <div class="widget footer-menu-one">

                                <p class="text-transform-none fw-bolder" style="font-size: 16px;">Quick Links</p>

                                <ul class="navbar-nav" style="font-size: 14px; line-height: 0.8;">
                                    <li class="nav-item d-flex">
                                        <img src="{{ asset('/') }}company/images/footer/icons/logo-copy-ASH.png" alt="" class="mt-1 me-1" style="height: 18px; width: 18px;">
                                        <a href="{{ route('career') }}" class="nav-link" >Career</a>
                                    </li>

                                    <li class="nav-item d-flex">
                                        <img src="{{ asset('/') }}company/images/footer/icons/logo-copy-ASH.png" alt="" class="mt-1 me-1" style="height: 18px; width: 18px;">
                                        <a href="{{ route('home.blog') }}" class="nav-link" >Blog</a>
                                    </li>
{{--                                    <li class="nav-item d-flex">--}}
{{--                                        <img src="{{ asset('/') }}company/images/footer/icons/logo-copy-ASH.png" alt="" class="mt-1 me-1" style="height: 18px; width: 18px;">--}}
{{--                                        <a href="{{ route('press.release') }}" class="nav-link" >Press Release</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item d-flex">--}}
{{--                                        <img src="{{ asset('/') }}company/images/footer/icons/logo-copy-ASH.png" alt="" class="mt-1 me-1" style="height: 18px; width: 18px;">--}}
{{--                                        <a href="#" class="nav-link" >Software Training</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item d-flex">--}}
{{--                                        <img src="{{ asset('/') }}company/images/footer/icons/logo-copy-ASH.png" alt="" class="mt-1 me-1" style="height: 18px; width: 18px;">--}}
{{--                                        <a href="{{ route('events') }}" class="nav-link" >Events</a>--}}
{{--                                    </li>--}}
                                    <li class="nav-item d-flex">
                                        <img src="{{ asset('/') }}company/images/footer/icons/logo-copy-ASH.png" alt="" class="mt-1 me-1" style="height: 18px; width: 18px;">
                                        <a href="{{ route('gallery') }}" class="nav-link" >Gallery</a>
                                    </li>

                                </ul>

                            </div>

                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12">

                            <div class="widget footer-menu-two">

                                <p class="text-transform-none fw-bolder" style="font-size: 16px;">Related</p>

                                <ul class="navbar-nav" style="font-size: 14px; line-height: 0.8;">
                                    <li class="nav-item d-flex">
                                        <img src="{{ asset('/') }}company/images/footer/icons/logo-copy-yellow.png" alt="" class="mt-1 me-1" style="height: 18px; width: 18px;">
                                        <a href="{{ route('home.support') }}" class="nav-link" >Support</a>
                                    </li>
{{--                                    <li class="nav-item d-flex">--}}
{{--                                        <img src="{{ asset('/') }}company/images/footer/icons/logo-copy-yellow.png" alt="" class="mt-1 me-1" style="height: 18px; width: 18px;">--}}
{{--                                        <a href="{{ route('faq') }}" class="nav-link" >FAQ</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item d-flex">--}}
{{--                                        <img src="{{ asset('/') }}company/images/footer/icons/logo-copy-yellow.png" alt="" class="mt-1 me-1" style="height: 18px; width: 18px;">--}}
{{--                                        <a href="#" class="nav-link" >Customer Stories</a>--}}
{{--                                    </li>--}}
                                    <li class="nav-item d-flex">
                                        <img src="{{ asset('/') }}company/images/footer/icons/logo-copy-yellow.png" alt="" class="mt-1 me-1" style="height: 18px; width: 18px;">
                                        <a href="#" class="nav-link" >Sitemap</a>
                                    </li>

{{--                                    @php--}}
{{--                                        $outside_user = Session::has('outside_user_id') ? \App\Models\OutsideUsers\OutsideUser::find(Session::get('outside_user_id')) : null;--}}
{{--                                    @endphp--}}

{{--                                    @if($outside_user === null)--}}
{{--                                        <li class="nav-item d-flex">--}}
{{--                                            <img src="{{ asset('/') }}company/images/footer/icons/logo-copy-yellow.png" alt="" class="mt-1 me-1" style="height: 18px; width: 18px;">--}}
{{--                                            <a href="{{ route('outsider.login') }}" class="nav-link" > User Login</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item d-flex">--}}
{{--                                            <img src="{{ asset('/') }}company/images/footer/icons/logo-copy-yellow.png" alt="" class="mt-1 me-1" style="height: 18px; width: 18px;">--}}
{{--                                            <a href="{{ route('outsider.register') }}" class="nav-link" > User Registration</a>--}}
{{--                                        </li>--}}
{{--                                    @else--}}
{{--                                        @if(Session::has('outside_user_id'))--}}
{{--                                            <li class="nav-item d-flex">--}}
{{--                                                <img src="{{ asset('/') }}company/images/footer/icons/logo-copy-yellow.png" alt="" class="mt-1 me-1" style="height: 18px; width: 18px;">--}}
{{--                                                <a href="{{ route('outsider.user.dashboard', ['id' => $outside_user->id]) }}" class="nav-link" > User Dashboard</a>--}}
{{--                                            </li>--}}
{{--                                        @else--}}
{{--                                            <li class="nav-item d-flex">--}}
{{--                                                <img src="{{ asset('/') }}company/images/footer/icons/logo-copy-yellow.png" alt="" class="mt-1 me-1" style="height: 18px; width: 18px;">--}}
{{--                                                <a href="{{ route('outsider.login') }}" class="nav-link" > User Login</a>--}}
{{--                                            </li>--}}
{{--                                            <li class="nav-item d-flex">--}}
{{--                                                <img src="{{ asset('/') }}company/images/footer/icons/logo-copy-yellow.png" alt="" class="mt-1 me-1" style="height: 18px; width: 18px;">--}}
{{--                                                <a href="{{ route('outsider.register') }}" class="nav-link" > User Registration</a>--}}
{{--                                            </li>--}}
{{--                                        @endif--}}
{{--                                    @endif--}}

                                </ul>

                            </div>

                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="footer-subscribe">
                                <p class="fw-bolder" style="font-size: 16px;">Subscribe</p>
                                <p class="fw-400" style="font-size: 14px;"><strong>Subscribe</strong> to our newsletter for essential news, exclusive offers, and insider insights!</p>
                                <form class="subscription" action="{{ route('subscribe.email.store') }}" method="post">
                                    @csrf
                                    @method('POST')

                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <i class="fa-regular fa-envelope"></i>
                                        </span>
                                        <input type="email" id="email" name="email" class="form-control focus-ring focus-ring-warning" placeholder="Enter Email" value="{{ old('email') }}" required>
                                        <span class="input-group-text btn p-0 m-0" style="background-color: var(--yellow);">
                                            <button class="btn text-white border-0" type="submit" style="background-color: var(--yellow);">Subscribe</button>
                                        </span>
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-decoration-none" />
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <!-- .footer-widgets-wrap end -->

    </div>

    <!-- Copyrights -->
    <div id="" class="bg-light">
        <hr>
        <div class="container py-2">

            <div class="row">

                <div class="col-md-4 order-md-1 text-center text-md-start">
                    <div class="d-flex justify-content-center justify-content-md-start">

                        <div id="top-bar" class="transparent-topbar border-0 py-md-2">
                            <div class="container">
                                <div class="row align-items-center">

                                    <ul id="top-social" class="justify-content-center justify-content-lg-end">
                                            <li>
                                                <a href="https://www.linkedin.com/company/webns-tech/mycompany/" target="_blank" class="h-bg-linkedin">
                                                    <span class="ts-icon">
                                                        <i class="fa-brands fa-linkedin-in"></i>
                                                    </span>
                                                    <span class="ts-text h-bg-linkedin">
                                                        Linkedin
                                                    </span>
                                                </a>
                                            </li>

                                        <style>
                                            footer #top-social .ts-icon i{
                                                color: #F8C243;
                                            }
                                            footer #top-social a:hover i{
                                                color: #FFFFFF;
                                            }
                                        </style>

                                            <li>
                                                <a href="https://www.facebook.com/WebnsTech" target="_blank" class="h-bg-facebook">
                                                    <span class="ts-icon">
                                                        <i class="fa-brands fa-facebook-f"></i>
                                                    </span>
                                                    <span class="ts-text">
                                                        Facebook
                                                    </span>
                                                </a>
                                            </li>
{{--                                            <li>--}}
{{--                                                <a href="#" target="_blank" class="h-bg-instagram">--}}
{{--                                                    <span class="ts-icon">--}}
{{--                                                        <i class="fa-brands fa-instagram"></i>--}}
{{--                                                    </span>--}}
{{--                                                    <span class="ts-text">--}}
{{--                                                        Instagram--}}
{{--                                                    </span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
                                            <li>
                                                <a href="https://twitter.com/WEBNSTechnology" target="_blank" class="h-bg-x-twitter">
                                                    <span class="ts-icon">
                                                        <i class="fa-brands fa-x-twitter"></i>
                                                    </span>
                                                    <span class="ts-text">
                                                        Twitter
                                                    </span>
                                                </a>
                                            </li>
{{--                                            <li>--}}
{{--                                                <a href="#" target="_blank" class="h-bg-reddit">--}}
{{--                                                    <span class="ts-icon">--}}
{{--                                                        <i class="fa-brands fa-reddit"></i>--}}
{{--                                                    </span>--}}
{{--                                                    <span class="ts-text">--}}
{{--                                                        Reddit--}}
{{--                                                    </span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#" target="_blank" class="h-bg-quora">--}}
{{--                                                    <span class="ts-icon">--}}
{{--                                                        <i class="fa-brands fa-quora"></i>--}}
{{--                                                    </span>--}}
{{--                                                    <span class="ts-text">--}}
{{--                                                        Quora--}}
{{--                                                    </span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}

{{--                                        <li>--}}
{{--                                            <a href="#" target="_blank" class="h-bg-youtube">--}}
{{--                                                <span class="ts-icon">--}}
{{--                                                    <i class="fa-brands fa-youtube" style="font-size: 18px;"></i>--}}
{{--                                                </span>--}}
{{--                                                <span class="ts-text">--}}
{{--                                                    Youtube--}}
{{--                                                </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}

                                        <style>
                                            footer .h-bg-youtube:hover .ts-icon{
                                                background-color: #ff0000;
                                            }
                                            footer .h-bg-youtube:hover .ts-text{
                                                background-color: #ff0000 !important;
                                                color: white;
                                            }

                                        </style>

                                        </ul>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-4 order-md-2 text-center footer-copyright text-md-center">
                    &copy; 2023 All Rights Reserved by <br> Webns Technology Ltd.
                </div>

                <div class="col-md-4 order-md-3" style="font-size: 16px;">
                    <div class="footer-term bottom-footer-terms">
                        <div class="">
                            <a href="{{ route('terms') }}" class="text-decoration-none text-black">Terms & Conditions</a> <span class="fw-700" style="color: #F8C243;"><i class="fa-solid fa-minus"></i></span> <a href="{{ route('privacy') }}" class="text-decoration-none text-black">Privacy Policy</a>
                        </div>
                        <div class="">
                            <span class="fw-700 ms-1" style="color: #F8C243;"><i class="fa-solid fa-minus"></i></span> <a href="{{ route('cookies') }}" class="text-decoration-none text-black">Cookie Policy</a>
                        </div>
                    </div>
                </div>

                <style>
                    @media screen and (max-width: 576px) {
                        .order-md-1 {
                            order: 2 !important; /* Change order for small screens */
                        }
                        .order-md-2 {
                            order: 3 !important; /* Change order for small screens */
                        }

                        .order-md-3 {
                            order: 1 !important; /* Change order for small screens */
                        }
                    }
                </style>

            </div>

        </div>
    </div>
    <!-- #copyrights end -->
</footer>
<!-- #footer end -->
