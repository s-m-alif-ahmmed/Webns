@extends('admin.master')

@section('title')
    Edit Company Details
@endsection

@section('content')

    <section class="py-5">

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-5">
            <div class="breadcrumb-title pe-3">
                <a href="{{ route('designation.index') }}">Company</a>
            </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Company</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-primary">{{session('message')}}</p>

        <hr>
        <!-- Create Designation Form-->
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">Edit Company </h5>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 ">
                            <form class="row" method="POST" action="{{route('outsider.user.admin.update', $outside_user->id)}}" enctype="multipart/form-data">
                                @csrf

                                <input class="form-control" type="hidden" name="terms" id="terms" value="{{ $outside_user->terms }}" />

                                <div class="col-12 form-group">
                                    <label class="form-label"> Company Name </label>
                                    <select class="form-control pt-2 shadow-none contact-input"  name="company_name" id="company_name" aria-label="Default select example" required style="color: rgba(105,105,105,0.8)!important;">
                                        <option value="{{ $outside_user->company_name }}"> {{ $outside_user->company_name }} </option>
                                        <option value="WEBNS Technology Ltd.">WEBNS Technology Ltd.</option>
                                        <option value="WEBNS Teclogy Ltd.">WEBNS Teology Ltd.</option>
                                        <option value="WEBNS Techy Ltd.">WEBNS Techlogy Ltd.</option>
                                        <option value="WEBNS logy Ltd.">WEBNS Techy Ltd.</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="company_logo" class="form-label"> Company Logo </label>
                                    <img class="p-1" src="{{ asset( $outside_user->company_logo) }}" alt="" style="height: 60px; width: auto;">
                                    <input class="form-control" type="file" name="company_logo" id="company_logo" value="{{ $outside_user->company_logo }}" />
                                    <x-input-error :messages="$errors->get('company_logo')" class="mt-2" />
                                </div>

                                <div class="col-12">
                                    <label for="company_email" class="form-label"> Company Email </label>
                                    <input class="form-control" type="email" name="company_email" id="company_email" placeholder="Enter company email" value="{{ $outside_user->company_email }}" required />
                                    <x-input-error :messages="$errors->get('company_email')" class="mt-2" />
                                </div>

                                <div class="col-12">
                                    <label for="company_number" class="form-label"> Company Number </label>
                                    <input class="form-control" type="text" name="company_number" id="company_number" placeholder="Enter company number" value="{{ $outside_user->company_number }}" required />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="col-12">
                                    <label for="company_address" class="form-label"> Company Address</label>
                                    <input class="form-control" type="text" name="company_address" id="company_address" placeholder="Enter company address" value="{{ $outside_user->company_address }}" required />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="col-12">
                                    <label for="team_manager_name" class="form-label"> Manager Name</label>
                                    <input class="form-control" type="text" name="team_manager_name" id="team_manager_name" placeholder="Enter team manager name" value="{{ $outside_user->team_manager_name }}" required />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="col-12">
                                    <label for="manager_designation" class="form-label"> Manager Designation</label>
                                    <input class="form-control" type="text" name="manager_designation" id="manager_designation" placeholder="Enter manager designation" value="{{ $outside_user->manager_designation }}" required />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="col-12">
                                    <label for="manager_email" class="form-label"> Manager Email</label>
                                    <input class="form-control" type="email" name="manager_email" id="manager_email" placeholder="Enter manager email " value="{{ $outside_user->manager_email }}" required />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="col-12">
                                    <label for="manager_number" class="form-label"> Manager Number</label>
                                    <input class="form-control" type="text" name="manager_number" id="manager_number" placeholder="Enter manager number " value="{{ $outside_user->manager_number }}" required />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="col-12">
                                    <label for="manager_employ_id" class="form-label"> Manager Employ ID</label>
                                    <input class="form-control" type="text" name="manager_employ_id" id="manager_employ_id" placeholder="Enter manager employ id " value="{{ $outside_user->manager_employ_id  }}" required />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="col-12">
                                    <label for="name" class="form-label"> Manager Employ ID Image</label>
                                    <img class="p-1" src="{{ asset( $outside_user->manager_employ_id_image) }}" alt="" style="height: 60px; width: auto;">
                                    <input class="form-control" type="file" name="manager_employ_id_image" id="manager_employ_id_image" value="{{ $outside_user->manager_employ_id_image  }}" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="col-12">
                                    <label for="name" class="form-label"> Manager Photo </label>
                                    @if($outside_user->manager_photo)
                                        <img class="p-1" src="{{ asset( $outside_user->manager_photo) }}" alt="" style="height: 60px; width: auto;">
                                    @endif
                                    <input class="form-control" type="file" name="manager_photo" id="manager_photo" value="{{ $outside_user->manager_photo  }}" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="col-12">
                                    <label for="password" class="form-label"> Password </label>
                                    <input class="form-control" type="password" name="password" id="password" placeholder="Enter designation name" value=""  />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
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


