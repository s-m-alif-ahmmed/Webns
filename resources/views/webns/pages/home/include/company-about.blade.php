<div class="container who-we-are">
    <div class="row align-items-center justify-content-between">

        <div class="col-md-6 video-box-full order-md-1">
            <video id="slide-video" class="d-block video-box h-100 shadow" preload="auto" loop autoplay playsinline muted>
                <source src='{{ asset('/') }}company/video/home-page/who_we_are _with_sound.mp4' type='video/mp4'>
            </video>
        </div>

        <div class="col-md-6 px-5 text-justify order-md-2" style="margin-top: -50px;">
            <h3 style="font-size: 28px;" class="fw-bold who-we-are-btn">Who We Are</h3>
            <p class="who-we-are-text" style="font-size: 17px;">
                WEBNS Technology, established in 2005, is a pioneering ERP software provider in Bangladesh, offering tailored solutions for various sectors. With a focus on innovation and client satisfaction, we deliver reliable and efficient business solutions, including automated manufacturing, financial management, HRMS and more.
            </p>
            <div class="who-we-are-btn">
                <a href="{{ route('about') }}" class="btn mt-3 border-0 custom-btn-5">
                <span class="back-gradient-yellow text-white fw-bold py-2 px-3" style="border-radius: 5px;">
                    Learn More
                </span>
                </a>
            </div>
        </div>
    </div>
</div>

