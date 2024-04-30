@extends('admin.master')

@section('title')
    User Profile
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
                            <li class="breadcrumb-item active" aria-current="page"> Edit User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-muted">{{session('message')}}</p>
        <hr/>

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- ROW-1 OPEN -->
            <div class="row" id="user-profile">
                <div class="col-lg-12">
                    <div class="tab-content">

                        <div class="card">
                            <div class="card-body border-0">
                                <div class="form-horizontal">

                                    <div class="row">
                                        <p class="mb-4 text-center text-17">Edit User</p>
                                    </div>
                                    <div class="row mb-4">
                                        <form action="{{route('users.update', $user->id)}}" id="edit" method="POST">
                                            @csrf
                                            @method('patch')

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{ $user->name }}" required autofocus autocomplete="name" />
                                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Email</label>
                                                    <div class="input-group flex-nowrap">
                                                        <input type="text" class="form-control" name="email" id="emailInput" value="{{ $user->email }}" placeholder="Email" aria-describedby="addon-wrapping" required autofocus autocomplete="username" />
                                                        <span class="input-group-text" id="addon-wrapping">@webnstech.net</span>
                                                    </div>
                                                    <div id="emailError" class="text-danger"></div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label" for="number">Phone Number</label>
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="addon-wrapping-number">+88 019</span>
                                                        <input type="text" class="form-control" name="number" id="numberInput" value="{{ $user->number }}" placeholder="Phone Number" aria-label="number" aria-describedby="addon-wrapping-number" :value="{{ old('number') }}" required autofocus autocomplete="number" />
                                                    </div>
                                                    <div id="numberError" class="text-danger"></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Address</label>
                                                    <textarea type="text" class="form-control" name="address" placeholder="Enter Address" >{{ $user->address }}</textarea>
                                                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Employee ID</label>
                                                    <input type="text" class="form-control" name="officer_id" placeholder="Enter Employee ID" value="{{ $user->officer_id }}" required autofocus autocomplete="officer_id" />
                                                    <x-input-error :messages="$errors->get('officer_id')" class="mt-2" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Role</label>
                                                    <div class="form-group">
                                                        <select class="form-control select2 form-select" name="role" data-placeholder="Choose one" >
                                                            @if($user->role == 'super_admin')
                                                                <option value="{{ $user->role }}">Super Admin</option>
                                                            @elseif($user->role == 'admin')
                                                                <option value="{{ $user->role }}">Admin</option>
                                                            @elseif($user->role == 'hr')
                                                                <option value="{{ $user->role }}">HR</option>
                                                            @elseif($user->role == 'content_manager')
                                                                <option value="{{ $user->role }}">Content Manager</option>
                                                            @elseif($user->role == 'viewer')
                                                                <option value="{{ $user->role }}">Viewer</option>
                                                            @endif
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
                                                                <option value="{{ $department->id }}" {{$department->id ==  $user->department_id ? 'selected' : ''}} >{{ $department->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label">Designation</label>
                                                    <div class="form-group">
                                                        <select class="form-control select2 form-select" name="designation_id" id="designation" data-placeholder="Choose one designation" required>
                                                            @if ($user->designation)
                                                                <option value="{{ $user->designation->id }}">{{ $user->designation->name }}</option>
                                                            @else
                                                                <option value="">Select Designation</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <x-input-error :messages="$errors->get('designation_id')" class="mt-2" />
                                                </div>
                                            </div>

                                            <div class="col-md-12 text-center">
                                                <input type="submit" class="btn all-btn-same" value="update"/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- COL-END -->
            </div>
            <!-- ROW-1 CLOSED -->

        </div>
        <!-- End CONTAINER -->

    </section>

    <script>

        // Assuming you have a form with the ID "signup"
        document.getElementById('edit').addEventListener('submit', function (event) {

            // Validate Email
            var emailInput = document.getElementById('emailInput');
            var emailInputValue = emailInput.value;

            if (emailInputValue.includes('@webnstech.net')) {
                emailInputValue = emailInputValue.replace('@webnstech.net', ''); // Remove the domain
                emailInput.value = emailInputValue; // Set the modified value back to the input field
            }

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

            if (numberInputValue.startsWith('+88019')) {
                numberInputValue = numberInputValue.replace('+88019', ''); // Remove the prefix
                numberInput.value = numberInputValue; // Set the modified value back to the input field
            }

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

