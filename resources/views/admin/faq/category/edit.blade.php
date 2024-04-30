@extends('admin.master')

@section('title')
    Edit FAQ Category
@endsection

@section('content')

    <section class="py-5">

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">
                <a href="{{ route('faq-category.index') }}">FAQ Category</a>
            </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit FAQ Category</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-primary">{{session('message')}}</p>

        <hr>
        <!-- Create Category Form-->
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">Edit FAQ Category</h5>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 ">
                            <form class="row g-3" method="post" action="{{route('faq-category.update', Crypt::encryptString($faq_category->id) )}}">
                                @csrf
                                @method('patch')

                                <div class="col-12">
                                    <label for="english" class="form-label"> FAQ Category English Name </label>
                                    <input class="form-control" type="text" name="english" id="english" value="{{$faq_category->english}}" placeholder="Enter faq category name" required />
                                </div>

                                <div class="col-12">
                                    <label for="bangla" class="form-label"> FAQ Category Bangla Name </label>
                                    <input class="form-control" type="text" name="bangla" id="bangla" value="{{$faq_category->bangla}}" placeholder="Enter faq category name" required />
                                </div>

                                <div class="col-12 text-center">
                                    <button class="btn all-btn-same px-4" type="submit">Update</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
