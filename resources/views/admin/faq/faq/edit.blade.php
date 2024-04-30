@extends('admin.master')

@section('title')
    Edit FAQ
@endsection

@section('content')

    <section class="py-5">

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">
                <a href="{{ route('admin-faq.index') }}">FAQ</a>
            </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit FAQ</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-primary">{{session('message')}}</p>

        <hr/>

        <!-- edit FAQ Form-->
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">Edit FAQ </h5>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 ">
                            <form class="row g-3" method="post" action="{{route('admin-faq.update', Crypt::encryptString($faq->id) )}}" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />

                                <div class="col-12  form-group">
                                    <label for="faq_category_id" class="form-label"> FAQ Category </label>
                                    <select class="form-control select2 form-select" name="faq_category_id" data-placeholder="Choose FAQ Category" required>
                                        <option value="" selected>Choose one category</option>
                                        @foreach($faq_categories as $faq_category)
                                            <option value="{{ $faq_category->id }}" {{$faq_category->id == $faq->faq_category_id ? 'selected' : ''}}>{{ $faq_category->english }} ({{ $faq_category->bangla }})</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="question" class="form-label"> FAQ Question </label>
                                    <input class="form-control" type="text" name="question" id="question" placeholder="Enter faq question " value="{{$faq->question}}" required />
                                </div>

                                <div class="col-12">
                                    <label for="answer" class="form-label"> FAQ Answer </label>
                                    <input class="form-control" type="text" name="answer" id="answer" placeholder="Enter faq answer" value="{{$faq->answer}}" required />
                                </div>

                                <div class="col-12">
                                    <label for="single_image" class="form-label"> FAQ Single Image </label>
                                    <input class="form-control" type="file" name="single_image" id="single_image" placeholder="Choose faq single_image" value="{{$faq->single_image}}" />
                                    @if($faq->single_image)
                                        <img class="p-2" src="{{ asset( $faq->single_image ) }}" alt="" style="height: 100px;" width="auto;">
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label for="image" class="form-label"> FAQ Multiple Images </label>
                                    <input class="form-control" type="file" name="image[]" id="image" multiple placeholder="Choose faq image" value="{{$faq->image}}" />
                                    @if($faq_images->isNotEmpty())
                                        @foreach ($faq_images as $faq_image)
                                            <img class="p-2" src="{{ asset( $faq_image->image ) }}" alt="" style="height: 100px;" width="auto;">
                                        @endforeach
                                    @endif
                                </div>

                                <div class="col-12 text-center">
                                    <button class="btn all-btn-same px-4" type="submit">Create</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.0/jquery.easing.js" type="text/javascript"></script>

@endsection
