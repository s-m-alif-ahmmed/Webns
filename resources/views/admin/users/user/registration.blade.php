@extends('admin.master')

@section('title')
    Create User
@endsection

@section('content')

    <section class="py-5">
        <!--breadcrumb-->
        <div class="d-flex justify-content-between">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3"><a href="{{ route('users') }}">Users</a></div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"> Create New User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-muted">{{session('message')}}</p>
        <hr/>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="justify-content-center border-bottom">
                            <div class="col-md-12 py-3">
                                <h2 class="text-center">Create New User</h2>
                            </div>
                        </div>

                        <form method="POST" id="signup" action="{{ route('register.store') }}">
                            @csrf

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Full Name" :value="old('name')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <div class="input-group flex-nowrap">
                                            <input type="text" class="form-control" name="email" id="emailInput" placeholder="Email" aria-describedby="addon-wrapping" required autofocus autocomplete="username" />
                                            <span class="input-group-text" id="addon-wrapping">@webnstech.net</span>
                                        </div>
                                        <div id="emailError" class="text-danger"></div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="number">Phone Number</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping-number">+88 019</span>
                                            <input type="text" class="form-control" name="number" id="numberInput" placeholder="Phone Number" aria-label="number" aria-describedby="addon-wrapping-number" value="{{ old('number') }}" required autofocus autocomplete="number" />
                                        </div>
                                        <div id="numberError" class="text-danger"></div>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label">Address</label>
                                        <textarea type="text" class="form-control" name="address" placeholder="Enter Address" ></textarea>
                                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Employee ID</label>
                                        <input type="text" class="form-control" name="officer_id" placeholder="Enter Employee ID" :value="old('officer_id')" required autofocus autocomplete="officer_id" />
                                        <x-input-error :messages="$errors->get('officer_id')" class="mt-2" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Role</label>
                                        <div class="form-group">
                                            <select class="form-control select2 form-select" name="role" data-placeholder="Choose one" >
                                                <option label="Choose one"></option>
                                                <option value="super_admin">Super Admin</option>
                                                <option value="admin">Admin</option>
                                                <option value="hr">HR & Admin</option>
                                                <option value="content_manager">Content Manager</option>
                                                <option value="viewer">Viewer</option>
                                            </select>
                                        </div>
                                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Department</label>
                                        <div class="form-group">
                                            <select class="form-control select2 form-select" name="department_id" id="department" data-placeholder="Choose one department" required>
                                                <option label="Choose one department"></option>
                                                @foreach($departments as $department)
                                                    <option value="{{ $department->id }}" {{$department->designation_id == $department->id ? 'selected' : ''}} >{{ $department->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Designation</label>
                                        <div class="form-group">
                                            <select class="form-control select2 form-select" name="designation_id" id="designation" data-placeholder="Choose one designation" required>
                                                <option value="">Select Designation</option>
                                            </select>
                                        </div>
                                        <x-input-error :messages="$errors->get('designation_id')" class="mt-2" />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required autocomplete="new-password" />
                                        <small id="lowercase-message" class="text-danger d-block"></small>
                                        <small id="uppercase-message" class="text-danger d-block"></small>
                                        <small id="digit-message" class="text-danger d-block"></small>
                                        <small id="special-char-message" class="text-danger d-block"></small>
                                        <small id="length-message" class="text-danger d-block"></small>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" />
                                        <small id="match-message" class="text-danger d-block"></small>
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center text-center my-4">
                                <button class="btn all-btn-same">Create</button>
                                {{--                                <x-primary-button class="ms-4 rounded-3 bg-warning text-white" id="submit-button">--}}
                                {{--                                    {{ __('Create') }}--}}
                                {{--                                </x-primary-button>--}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>

        // Assuming you have a form with the ID "signup"
        document.getElementById('signup').addEventListener('submit', function (event) {

            // Validate Email
            var emailInput = document.getElementById('emailInput');
            var emailInputValue = emailInput.value;

            if (emailInputValue.includes('@')) {
                document.getElementById('emailError').innerText = "Email cannot contain '@' symbol";
                event.preventDefault(); // Prevent form submission
            } else if (emailInputValue.length < 3 || emailInputValue.length > 30) {
                document.getElementById('emailError').innerText = "Email must be between 3 and 30 characters";
                event.preventDefault(); // Prevent form submission
            } else {
                document.getElementById('emailError').innerText = "";
            }

            // Concatenate the input value with the domain
            var finalEmail = emailInputValue + '@webnstech.net';

            // Set the concatenated value back to the input field
            emailInput.value = finalEmail;


            // Validate Number
            var numberInput = document.getElementById('numberInput');
            var numberInputValue = numberInput.value;

            if (!validatePhoneNumber(numberInputValue)) {
                document.getElementById('numberError').innerText = "Invalid phone number format";
                event.preventDefault(); // Prevent form submission
            } else {
                document.getElementById('numberError').innerText = "";
            }

            // Concatenate the input value with the domain
            var finalNumber = '+88019' + numberInputValue;

            // Set the concatenated value back to the input field
            numberInput.value = finalNumber;
        });

        document.getElementById('emailInput').addEventListener('input', function (event) {
            var emailInputValue = event.target.value;

            if (emailInputValue.includes('@')) {
                document.getElementById('emailError').innerText = "Email cannot contain '@' symbol";
            } else if (emailInputValue.length < 3 || emailInputValue.length > 30) {
                document.getElementById('emailError').innerText = "Email must be between 3 and 30 characters";
            } else {
                document.getElementById('emailError').innerText = "";
            }
        });

        document.getElementById('numberInput').addEventListener('input', function (event) {
            var numberInputValue = event.target.value;
            var isValid = validatePhoneNumber(numberInputValue);

            if (!isValid) {
                document.getElementById('numberError').innerText = "Invalid phone number format";
            } else {
                document.getElementById('numberError').innerText = "";
            }
        });

        function validateEmail(email) {
            var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        function validatePhoneNumber(number) {
            var re = /^[0-9]{8}$/; // Assuming 8 digits for the phone number
            return re.test(number);
        }
    </script>

@endsection

