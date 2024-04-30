@extends('admin.master')

@section('title')
    Edit Tournament Coach
@endsection

@section('content')

    <section class="py-5">

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-5">
            <div class="breadcrumb-title pe-3">
                <a href="{{ route('dashboard' ) }}">Dashboard</a>
            </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Coach</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-primary">{{session('message')}}</p>
        <hr>
        <!-- Create Blog Form-->
        <p class="mb-0 py-2 text-center fw-bold" style="color: #F8C243; font-size: 24px;">Edit Coach </p>

        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card">
                    {{--                    <div class="card-header py-3 bg-transparent">--}}
                    {{--                    </div>--}}
                    <div class="card-body">
                        <div class="border p-3 ">
                            <form class="row" method="post" action="{{route('admin.outsider.user.coach.update', $outside_user_coach->id)}}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="outside_user_id" id="outside_user_id" value="{{ $outside_user_coach->outside_user_id }}">

                                <div class="mb-3 row">
                                    <label for="name" class="col-sm-2 col-form-label">Coach Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $outside_user_coach->name }}" name="name" id="name" required />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-2 col-form-label">Coach Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" value="{{ $outside_user_coach->email }}" name="email" id="email" required />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="number" class="col-sm-2 col-form-label">Coach Number</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $outside_user_coach->number }}" name="number" id="number" required />
                                        <x-input-error :messages="$errors->get('number')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="designation" class="col-sm-2 col-form-label">Coach Designation</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="designation" id="designation" value="{{ $outside_user_coach->designation }}" required />
                                        <x-input-error :messages="$errors->get('designation')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="employ_id" class="col-sm-2 col-form-label">Coach Employ ID</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="employ_id" id="employ_id" value="{{ $outside_user_coach->employ_id }}" required />
                                        <x-input-error :messages="$errors->get('employ_id')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img src="{{ asset( $outside_user_coach->employ_id_image ) }}" alt="" style="height: 60px; width: auto;">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="employ_id_image" class="col-sm-2 col-form-label">Coach Employ ID Photo</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="employ_id_image" id="employ_id_image" value="{{ $outside_user_coach->employ_id_image }}"  />
                                        <x-input-error :messages="$errors->get('employ_id_image')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img src="{{ asset( $outside_user_coach->image ) }}" alt="" style="height: 60px; width: auto;">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="image" class="col-sm-2 col-form-label">Coach Photo</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="image" id="image" value="{{ $outside_user_coach->image }}"  />
                                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-12 text-center my-3">
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

