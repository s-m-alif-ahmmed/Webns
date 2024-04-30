@extends('webns.master')

@section('title')
    Press Release Detail
@endsection

@section('content')

    {{--    Left Side Social Icon--}}
    <section class="left-social-icons">
        @include('webns.include.left-side-social-icon')
    </section>

    <section class="py-3">

        <div class="container-fluid pb-3 mb-2">
            <div class="row">
                <div class="col-md-12 p-0 text-center">
                    <div class="top-text" style="height: 100px; position: relative; overflow: hidden;">
                        <p class="fw-900 text-uppercase heading-down-style">Press Release</p>
                        <p class="fw-900 top-contact text-capitalize heading-top-style">Detail</p>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center p-0 m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}" style="color: var(--ash)!important; font-size: 14px; position: relative; z-index: 3;">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('press.release') }}" style="color: var(--ash)!important; font-size: 14px; position: relative; z-index: 3;">Press Release</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <span style="font-size: 14px; position: relative; z-index: 3;">
                                         Detail
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
                <div class="col-md-12 text-center">
                    <img class="border custom-left-shadow-light" src="{{ asset('/') }}company/images/section/section-images/18824957.jpg" alt="" style="height: 400px; width: auto; border-radius: 10px;" />
                </div>
            </div>
            <div class="row py-5">
                <div class="col-md-12">
                    <h1 class="fw-900 text-center" style="font-size: 36px;">Press Release Name</h1>
                </div>
                <div class="col-md-10 mx-auto pt-3">
                    <p class="text-justify  fw-500" style="line-height: 34px;">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. At consectetur deleniti dignissimos est laudantium, mollitia nisi odio repellendus, sapiente sint, ullam unde. Debitis exercitationem in nesciunt numquam omnis possimus quis sapiente. Ab alias amet animi consectetur dolore ducimus earum esse exercitationem ipsum itaque minima molestias mollitia necessitatibus neque nobis numquam quod reiciendis, repellat repudiandae rerum sequi suscipit tempora totam unde voluptas! Ad amet aspernatur itae voluptas voluptatem voluptatibus voluptatum. Accusantium, alias excepturi iste itaque iure nemo quae repellat. Aliquam consectetur cumque dicta dolorem enim inventore ipsam labore laborum nemo odio, provident quas quasi qui quidem, quisquam repellat reprehenderit repudiandae vitae? Enim excepturi incidunt laudantium necessitatibus porro sed sequi soluta tempora. Accusamus ad adipisci alias amet at, culpa debitis dolore.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <p class="text-center fw-700" style="font-size: 36px;">
                        Why Choose our press release?
                    </p>
                    <div class="row">
                        <div class="col-md-4 p-3">
                            <div class="card p-4">
                                <i class="fa-regular fa-calendar-days" style="color: var(--yellow); font-size: 72px;"></i>
                                <p class="pt-3 fw-700" style="font-size: 22px;">We Best</p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, omnis!
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 p-3">
                            <div class="card p-4">
                                <i class="fa-regular fa-calendar-days" style="color: var(--yellow); font-size: 72px;"></i>
                                <p class="pt-3 fw-700" style="font-size: 22px;">We Best</p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, omnis!
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 p-3">
                            <div class="card p-4">
                                <i class="fa-regular fa-calendar-days" style="color: var(--yellow); font-size: 72px;"></i>
                                <p class="pt-3 fw-700" style="font-size: 22px;">We Best</p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, omnis!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row py-5 my-3">
                <div class="col-md-6 p-5">
                    <p class="text-center fw-700" style="font-size: 36px;">
                        What we have in our press release?
                    </p>
                    <p class="text-center">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur atque consequuntur ducimus, est et quis sequi soluta totam unde vero? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad assumenda culpa cupiditate distinctio eveniet exercitationem ipsum iure molestiae perferendis perspiciatis!
                    </p>
                </div>
                <div class="col-md-6">
                    <img class="border custom-left-shadow-light" src="{{ asset('/') }}company/images/section/section-images/18824957.jpg" alt="" style="height: 350px; width: auto; border-radius: 10px;" />
                </div>
            </div>
            <div class="row py-5 my-3">
                <div class="col-md-6">
                    <img class="border custom-left-shadow-light" src="{{ asset('/') }}company/images/section/section-images/18824957.jpg" alt="" style="height: 350px; width: auto; border-radius: 10px;" />
                </div>
                <div class="col-md-6 p-5">
                    <p class="text-center fw-700" style="font-size: 36px;">
                        How easy to use our press release?
                    </p>
                    <p class="text-center">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur atque consequuntur ducimus, est et quis sequi soluta totam unde vero? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad assumenda culpa cupiditate distinctio eveniet exercitationem ipsum iure molestiae perferendis perspiciatis!
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid p-0" style="height: 200px; width: auto; overflow: hidden;" >
            <div class="row">
                <div class="col-md-12 contact-section">
                    {{--            <img src="{{asset('/')}}company/images/section/section-images/contact-back.png" alt="">--}}
                    <img src="{{asset('/')}}company/images/section/section-images/contact-back-1.png" alt="">
                    <div class="text-center contact-text position-relative pt-4">
                        <p class="fw-900 text-white" style="font-size: 36px; margin: 0; padding: 0;">"Let's Talk"</p>
                        <p class="text-white fw-700" style="font-size: 20px;">To know more about the software and get demo</p>
                        <a href="{{ route('contact') }}" class="btn border-0 custom-btn-5" style="font-size: 24px;">
                            <i class="fa-solid fa-angles-right text-white" style="font-size: 16px;"></i>
                            <span class="fw-700 custom-btn-contact" style="padding-left: 15px;">
                                Click Here
                            </span>
                            <i class="fa-solid fa-angles-left text-white" style="font-size: 16px; padding-left: 6px;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

