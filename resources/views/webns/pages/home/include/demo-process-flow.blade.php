{{--<div class="container" style="overflow: hidden;">--}}

{{--    <div class="row feature-box-border-horizontal border-hover-animate col-mb-50 justify-content-center my-5">--}}

{{--        <div class="col-md-3 feature-box fbox-light fbox-center fbox-effect">--}}
{{--            <div class="fbox-icon bg-white mb-4">--}}
{{--                <i class="fa-solid fa-house demo-icon"></i>--}}
{{--            </div>--}}
{{--            <div class="fbox-content">--}}
{{--                <h3 class="text-transform-none text-larger mb-4">Make a Phone Call</h3>--}}
{{--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, quae rerum--}}
{{--                    dolores.</p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-md-3 feature-box fbox-light fbox-center fbox-effect">--}}
{{--            <div class="fbox-icon bg-white mb-4">--}}
{{--                <i class="fa-solid fa-house demo-icon"></i>--}}
{{--            </div>--}}
{{--            <div class="fbox-content">--}}
{{--                <h3 class="text-transform-none text-larger mb-4">Schadule a Meeting</h3>--}}
{{--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, quae rerum--}}
{{--                    dolores.</p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-md-3 feature-box fbox-light fbox-center fbox-effect">--}}
{{--            <div class="fbox-icon bg-white mb-4">--}}
{{--                <i class="fa-solid fa-house demo-icon"></i>--}}
{{--            </div>--}}
{{--            <div class="fbox-content">--}}
{{--                <h3 class="text-transform-none text-larger mb-4">Requirement Indentify</h3>--}}
{{--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, quae rerum--}}
{{--                    dolores.</p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-md-3 feature-box fbox-light fbox-center fbox-effect noborder">--}}
{{--            <div class="fbox-icon bg-white mb-4">--}}
{{--                <i class="fa-solid fa-house demo-icon"></i>--}}
{{--            </div>--}}
{{--            <div class="fbox-content">--}}
{{--                <h3 class="text-transform-none text-larger mb-4">Work Order Confirmation</h3>--}}
{{--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, quae rerum--}}
{{--                    dolores .</p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-md-11 text-end ">--}}
{{--            <a href="#" class="btn btn-warning">Request a Demo--}}
{{--                <i class="uil uil-angle-right-b me-0"></i>--}}
{{--            </a>--}}
{{--        </div>--}}

{{--    </div>--}}

{{--</div>--}}


<div id="demo-p-f" class="container">
    <div class="row">
        <div class="col-md-7 pt-3 order-md-1">
            <div class="text-center">
                <img src="{{asset('/')}}company/images/section/icons-img/Schedule-demo-icon-01.png" alt="image" style="height: 100px; width: auto;">
            </div>
            <div class="text-center">
                <h2 class="fw-700 pt-3" style="font-size: 28px;">
                    Schedule a Live Demo
                </h2>
                <p class="fw-400 col-md-7 mx-auto demo-p" style="font-size: 17px;">
                    Discover the user-friendly platform of WEBNS Technology Ltd through a complimentary practical demonstration.
                </p>
                <a href="{{ route('demo.request') }}" class="btn border-0 custom-btn-5">
                    <span class="custom-btn-4 back-gradient-yellow fw-bold text-white">
                        Request a Demo
                        <i class="fa-solid fa-angles-right" style="font-size: 12px;"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-md-5 order-md-2">
            <video id="slide-video" class="d-block w-100 demo-video h-100 shadow" style="border-radius: 10px;" preload="auto" loop autoplay muted playsinline controls>
                <source src='{{ asset('/') }}company/video/home-page/Schedule_a_demo_software.mp4' type='video/mp4'>
            </video>
        </div>
    </div>
</div>
