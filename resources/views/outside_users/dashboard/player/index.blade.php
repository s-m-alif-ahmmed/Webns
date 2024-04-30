@extends('outside_users.dashboard.master')

@section('title')
    Manage Tournament Player
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
                        <li class="breadcrumb-item active" aria-current="page">Manage Player</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-primary">{{session('message')}}</p>
        <hr>
        @php
            $outside_user_id = Session::get('outside_user_id');
            $playerCount = \App\Models\OutsideUsers\OutsideUserPlayer::where('outside_user_id', $outside_user_id)->count();
        @endphp
        @if ($playerCount < 15)

        <!-- Create Blog Form-->
        <p class="mb-0 py-2 text-center fw-bold" style="color: #F8C243; font-size: 24px;">Add New Player </p>

        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card">
{{--                    <div class="card-header py-3 bg-transparent">--}}
{{--                    </div>--}}
                    <div class="card-body">
                        <div class="border p-3 ">
                            <form class="row" method="post" action="{{route('outsider.user.player.store', $outside_user->id)}}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="outside_user_id" id="outside_user_id" value="{{ $outside_user->id }}">

                                <div class="mb-3 row">
                                    <label for="name" class="col-sm-2 col-form-label">Player Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="" name="name" id="name" required />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-2 col-form-label">Player Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" value="" name="email" id="email" required />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="number" class="col-sm-2 col-form-label">Player Number</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="" name="number" id="number" required />
                                        <x-input-error :messages="$errors->get('number')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="designation" class="col-sm-2 col-form-label">Player Designation</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="designation" id="designation" required />
                                        <x-input-error :messages="$errors->get('designation')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="employ_id" class="col-sm-2 col-form-label">Player Employ ID</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="employ_id" id="employ_id" required />
                                        <x-input-error :messages="$errors->get('employ_id')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="employ_id_image" class="col-sm-2 col-form-label">Player Employ ID Photo</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="employ_id_image" id="employ_id_image" required />
                                        <x-input-error :messages="$errors->get('employ_id_image')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="image" class="col-sm-2 col-form-label">Player Photo</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="image" id="image" required />
                                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="player_type" class="col-sm-2 col-form-label">Player Type</label>
                                    <div class="col-sm-10 form-group">
                                        <select class="form-control select2 form-select" name="player_type" id="player_type" data-placeholder="Choose one player type" required>
                                            <option value="">Choose one job type</option>
                                            <option value="All Rounder">All Rounder</option>
                                            <option value="Batsman">Batsman</option>
                                            <option value="Bowler">Bowler</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('player_type')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-12 text-center my-3">
                                    <button class="btn btn-primary px-4" type="submit">Create</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         @endif

        <p class="mb-0 py-2 text-center fw-bold" style="color: #F8C243; font-size: 24px;">Manage Players </p>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom w-100" id="responsive-datatable" style="width:100%">
                        <thead>
                        <tr>
                            <th> SL </th>
                            <th> Company Name </th>
                            <th> Player Name </th>
                            <th> Player Employ ID </th>
                            <th> Player Photo </th>
                            <th> Player Status </th>
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($outside_user_players->where('outside_user_id', session('outside_user_id')) as $player)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td>
                                    {{ $player->outside_user->company_name }}
                                </td>
                                <td>
                                    {{$player->name}}
                                </td>
                                <td>
                                    {{$player->employ_id}}
                                </td>
                                <td>
                                    <img src="{{ asset( $player->image ) }}" alt="" style="height: 50px; width: auto;">
                                </td>
                                <td>
                                    {{$player->status}}
                                </td>
                                <td>
                                    <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Edit">
                                        <a href="{{route('outsider.user.player.edit', Crypt::encryptString($player->id))}}" class="text-warning mx-1"><i class="fa fa-edit"></i></a>
                                    </span>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
@endsection
