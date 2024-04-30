@extends('webns.master')

@section('title')
    Company Login
@endsection

@section('content')

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card p-5">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" style="color: #ff0000 !important" :status="session('message')" />

                        <form method="POST" action="{{ route('outsider.login') }}">
                            @csrf

                            <div class="">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="manager_email" id="manager_email" placeholder="name@example.com" :value="old('manager_email')" required autofocus autocomplete="username" />
                                    <label for="manager_email">Email address</label>
                                </div>
                                <x-input-error :messages="$errors->get('manager_email')" class="mt-2" />
                            </div>

                            <div class="">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required autocomplete="current-password" />
                                    <label for="password">Password</label>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                            </div>

                            <!-- Remember Me -->
                            {{--        <div class="block mt-4">--}}
                            {{--            <label for="remember_me" class="inline-flex items-center">--}}
                            {{--                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember_token">--}}
                            {{--                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
                            {{--            </label>--}}
                            {{--        </div>--}}

                            <div class="d-flex justify-content-between items-center justify-end mt-4">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif

                                <div class="">
                                    <button type="submit" class="btn btn-primary rounded-0">Log In</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

