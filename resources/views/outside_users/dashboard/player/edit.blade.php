@extends('outside_users.dashboard.master')

@section('title')
    Edit Player
@endsection

@section('content')

    <section class="py-5">

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-5">
            <div class="breadcrumb-title pe-3">
                <a href="{{ route('outsider.user.dashboard', $outside_user->id) }}">Dashboard</a>
            </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Player</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-primary">{{session('message')}}</p>
        <hr>
        <!-- Create Blog Form-->
        <p class="mb-0 py-2 text-center fw-bold" style="color: #F8C243; font-size: 24px;">Edit Player </p>

        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 ">
                            <form class="row" method="post" action="{{route('outsider.user.player.update', $outside_user_player->id)}}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="outside_user_id" id="outside_user_id" value="{{ $outside_user_player->outside_user_id }}">

                                <div class="mb-3 row">
                                    <label for="name" class="col-sm-2 col-form-label">Player Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{$outside_user_player->name}}" name="name" id="name" required />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-2 col-form-label">Player Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" value="{{$outside_user_player->email}}" name="email" id="email" required />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="number" class="col-sm-2 col-form-label">Player Number</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{$outside_user_player->number}}" name="number" id="number" required />
                                        <x-input-error :messages="$errors->get('number')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="designation" class="col-sm-2 col-form-label">Player Designation</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{$outside_user_player->designation}}" name="designation" id="designation" required />
                                        <x-input-error :messages="$errors->get('designation')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="employ_id" class="col-sm-2 col-form-label">Player Employ ID</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{$outside_user_player->employ_id}}" name="employ_id" id="employ_id" required />
                                        <x-input-error :messages="$errors->get('employ_id')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="employ_id_image" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img src="{{ asset( $outside_user_player->employ_id_image ) }}" alt="" style="height: 60px; width: auto;">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="employ_id_image" class="col-sm-2 col-form-label">Player Employ ID Photo</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" value="{{$outside_user_player->employ_id_image}}" name="employ_id_image" id="employ_id_image"  />
                                        <x-input-error :messages="$errors->get('employ_id_image')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="image" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img src="{{ asset( $outside_user_player->image ) }}" alt="" style="height: 60px; width: auto;">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="image" class="col-sm-2 col-form-label">Player Photo</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" value="{{$outside_user_player->image}}" name="image" id="image"  />
                                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="player_type" class="col-sm-2 col-form-label">Player Type</label>
                                    <div class="col-sm-10 form-group">
                                        <select class="form-control select2 form-select" name="player_type" id="player_type" data-placeholder="Choose one player type" required>
                                            <option value="{{ $outside_user_player->player_type }}">{{ $outside_user_player->player_type }}</option>
                                            <option value="All Rounder">All Rounder</option>
                                            <option value="Batsman">Batsman</option>
                                            <option value="Bowler">Bowler</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('player_type')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-12 text-center my-3">
                                    <button class="btn btn-primary px-4" type="submit">Update</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
