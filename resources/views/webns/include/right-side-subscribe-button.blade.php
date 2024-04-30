<section id="subscribe-little-box" class="mt-5">
    <div>

        <div class="border-0">
            <div class="right-ul">
                <div class="sub-box">
                    <div class="sub-box-icon" >
                        <i class="fa-solid fa-chevron-left" style="margin: 0;"></i>
                    </div>
                    <div class="fw-bolder">
                        <p type="button" style="transform: rotate(270deg); font-size: 14px; margin: 0 0 0 -12px; color: white;">Subscribe</p>
                    </div>
                </div>
            </div>
        </div>

{{--        <style>--}}
{{--            .test-gradient{--}}
{{--                font-size: 72px;--}}
{{--                background: #F8C243;--}}
{{--                background: linear-gradient(to right, #F8C243 0%, #FBAF32 100%);--}}
{{--                -webkit-background-clip: text;--}}
{{--                -webkit-text-fill-color: transparent;--}}
{{--            }--}}
{{--        </style>--}}

    </div>
</section>
<section id="subscribe-box" class="mt-5 me-3" >
    <div>
        <div class="border-0">
            <div class="right-ul">
                <div class="bg-white box-control">
                    <div class="lets-box">
                        <p class="card bg-warning text-white inline-block position-relative px-5 py-1" style="transform: rotate(270deg); margin: 0; white-space: nowrap;">Let's subscribe</p>
                    </div>

                    <div class="px-4" style="z-index: 3;">
                        <div class="pt-2 pb-0 mb-0 text-end">
                            <button type="button" class="btn-close shadow-none border-0" id="subscribe-box-canle" data-bs-dismiss="modal" aria-label="Close" style="font-size: 14px; margin-right: -15px; color: #F8C243 !important;"></button>
                        </div>
                        <video class="mx-auto d-block top-sub-video" autoplay loop muted playsinline>
                            <source src="{{ asset('/') }}company/images/right-side-subscription/webns_newsletter_icon_animation.mp4" type="video/mp4">
                        </video>
                        <p class="px-3 pt-2 pb-2" style="font-size: 14px;">Subscribe to get our exciting updates and be the part of WEBNS lifestyle!</p>
                        <form action="{{ route('subscribe.email.store') }}" method="POST" class="mb-0">
                            @csrf

                            <div class="mx-auto text-center">
                                <input type="email" name="email" class="form-control focus-ring focus-ring-warning" style="height: 30px;" placeholder="Enter Email" value="{{ old('email') }}" required />
                                <x-input-error :messages="$errors->get('email')" class="py-1 w-100" style="font-size: 12px;" />
                                <button class="btn btn-sm btn-warning text-white my-2 pb-1" style="border-radius: 5px;" type="submit">Subscribe</button>
                            </div>

                            <style>
                                input::placeholder{
                                    text-align: center;
                                    font-size: 14px;
                                }
                            </style>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.0/jquery.easing.js" type="text/javascript"></script>
