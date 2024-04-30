@extends('admin.master')

@section('title')
    User Profile
@endsection

@section('content')

    <section class="py-5">

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
                                        <p class="mb-4 text-center text-17">Personal Info</p>
                                    </div>
                                    <div class="row">
                                        <p class="text-success text-center">{{session('message')}}</p>
                                    </div>
                                    <div class="row mb-4">

                                            <div class="col-md-12 d-flex justify-content-center text-center">
                                                @if(Auth::user()->photo)
                                                    <div class="image-profile" style="border-radius: 50%; overflow: hidden; height: 150px; width: 150px;">
                                                        <img class="mx-auto d-block" src="{{ asset(Auth::user()->photo) }}" alt="Employee" style="max-height: 150px; max-width: 150px;" />
                                                        <div class="edit-button bg-gray w-100 h-50 pt-3" id="profileImage" onclick="openImageEditor()">
                                                            <i class="fa fa-2x fa-edit text-white"></i>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="image-profile" style="border-radius: 50%; overflow: hidden; height: 150px; width: 150px;">
                                                        <img class="mx-auto d-block" src="{{ asset('/') }}admin/images/users/blank_image.jpg" alt="Employee" style="max-height: 150px; max-width: 150px;" />
                                                        <div class="edit-button bg-gray w-100 h-50 pt-3" id="profileImage" onclick="openImageEditor()">
                                                            <i class="fa fa-2x fa-edit text-white"></i>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- The modal -->

                                            <div id="imageEditorModal" class="modal">
                                                <div class="modal-dialog modal-dialog-centered" style="margin-top: 50px; height: 500px!important; width: 500px!important;">
                                                    <div class="modal-content" >

                                                        <form action="{{ route('photo.update', Auth::user()->id) }}" id="imageForm" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('patch')

                                                            <input type="hidden" name="name" value="{{ Auth::user()->name ?? '' }}">
                                                            <input type="hidden" name="email" value="{{ Auth::user()->email ?? '' }}">
                                                            <input type="hidden" name="role" value="{{ Auth::user()->role ?? '' }}">
                                                            <input type="hidden" name="officer_id" value="{{ Auth::user()->officer_id ?? '' }}">
                                                            <input type="hidden" name="department_id" value="{{ Auth::user()->department_id ?? '' }}">
                                                            <input type="hidden" name="designation_id" value="{{ Auth::user()->designation_id ?? '' }}">
                                                            <input type="hidden" name="number" value="{{ Auth::user()->number ?? '' }}">
                                                            <input type="hidden" name="address" value="{{ Auth::user()->address ?? '' }}">
                                                            <div class="row">
                                                                <div class="d-flex">
                                                                    <div class="col-md-6 my-auto px-2">
                                                                        <div id="imagePreviewContainer" class="text-center py-3">
                                                                            @if(Auth::user()->photo)
                                                                                <img id="viewImage" src="{{asset(Auth::user()->photo)}}" alt="viewImage" class="px-2" style="max-height: 200px; max-width: 200px;">
                                                                            @else
                                                                                <img id="viewImage" class="rounded-circle" src="{{ asset('/') }}admin/images/users/blank_image.jpg" alt="Employee" style="height: 100px; width: 100px;" id="profileImage" onclick="openImageEditor()">
                                                                            @endif
                                                                            <img id="previewImage" class="px-2" alt="Preview" style="max-height: 200px; max-width: 200px;">
                                                                            <input type="file" class="py-2" id="imageInput" name="photo" onchange="previewImage()">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 my-auto">
                                                                    <span class="close text-center" onclick="closeImageEditor()">
                                                                        <span class="btn btn-success ">Close</span>
                                                                    </span>
                                                                        <div class="text-center mt-2 pe-0">
                                                                            <input type="submit" onclick="submitForm()" class="btn btn-primary" value="Change" />
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                        @if(Auth::user()->photo)
                                                            <div class="text-center mt-2">
                                                                <form action="{{ route('photo.destroy', Auth::user()->id) }}" id="deleteForm{{ Auth::user()->id }}" method="post" enctype="multipart/form-data" >
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger" onclick="return deleteAction('{{ Auth::user()->id }}', 'Are you sure to remove this photo?', 'btn-danger')">Remove</button>
                                                                </form>
                                                            </div>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="container">
                                            <form action="{{route('users.update', Auth::user()->id)}}" id="edit" method="POST">

                                                @csrf
                                                @method('patch')

                                                <div class="row">
                                                    @php
                                                        $permissionData = json_decode(Auth::user()->permission, true);
                                                    @endphp
                                                    <div class="col-md-12">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{ Auth::user()->name }}" required autofocus autocomplete="name" />
                                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                    </div>
                                                    @if($permissionData && isset($permissionData['user_profile']['profile_email']) && $permissionData['user_profile']['profile_email'] == 'profile_email')
                                                        <div class="col-md-6">
                                                            <label class="form-label">Email</label>
                                                            <div class="input-group flex-nowrap">
                                                                <input type="text" class="form-control" name="email" id="emailInput" value="{{ Auth::user()->email }}" placeholder="Email" aria-describedby="addon-wrapping" required autofocus autocomplete="username" />
                                                                <span class="input-group-text" id="addon-wrapping">@webnstech.net</span>
                                                            </div>
                                                            <div id="emailError" class="text-danger"></div>
                                                        </div>
                                                    @else
                                                        <div class="col-md-6">
                                                            <label class="form-label">Email</label>
                                                            <div class="input-group flex-nowrap">
                                                                <input type="text" class="form-control" name="email" id="emailInput" value="{{ Auth::user()->email }}" placeholder="Email" aria-describedby="addon-wrapping" required autofocus autocomplete="username" readonly/>
                                                                <span class="input-group-text" id="addon-wrapping">@webnstech.net</span>
                                                            </div>
                                                            <div id="emailError" class="text-danger"></div>
                                                        </div>
                                                    @endif
                                                    @if($permissionData && isset($permissionData['user_profile']['profile_phone']) && $permissionData['user_profile']['profile_phone'] == 'profile_phone')
                                                        <div class="col-md-6">
                                                            <label class="form-label" for="number">Phone Number</label>
                                                            <div class="input-group flex-nowrap">
                                                                <span class="input-group-text" id="addon-wrapping-number">+88 019</span>
                                                                <input type="text" class="form-control" name="number" id="numberInput" value="{{ Auth::user()->number }}" placeholder="Phone Number" aria-label="number" aria-describedby="addon-wrapping-number" :value="{{ old('number') }}" autofocus autocomplete="number" />
                                                            </div>
                                                            <div id="numberError" class="text-danger"></div>
                                                        </div>
                                                    @else
                                                        <div class="col-md-6">
                                                            <label class="form-label" for="number">Phone Number</label>
                                                            <div class="input-group flex-nowrap">
                                                                <span class="input-group-text" id="addon-wrapping-number">+88 019</span>
                                                                <input type="text" class="form-control" name="number" id="numberInput" value="{{ Auth::user()->number }}" placeholder="Phone Number" aria-label="number" aria-describedby="addon-wrapping-number" :value="{{ old('number') }}" readonly autofocus autocomplete="number" />
                                                            </div>
                                                            <div id="numberError" class="text-danger"></div>
                                                        </div>
                                                    @endif
                                                    <div class="col-md-12">
                                                        <label class="form-label">Address</label>
                                                        <textarea type="text" class="form-control" name="address" placeholder="Enter Address" >{{ Auth::user()->address }}</textarea>
                                                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                                    </div>
                                                    @if($permissionData && isset($permissionData['user_profile']['profile_number']) && $permissionData['user_profile']['profile_number'] == 'profile_number')
                                                        <div class="col-md-6">
                                                            <label class="form-label">Employee ID</label>
                                                            <input type="text" class="form-control" name="officer_id" placeholder="Enter Employee ID" value="{{ Auth::user()->officer_id }}" autofocus autocomplete="officer_id" />
                                                            <x-input-error :messages="$errors->get('officer_id')" class="mt-2" />
                                                        </div>
                                                    @else
                                                        <div class="col-md-6">
                                                            <label class="form-label">Employee ID</label>
                                                            <input type="text" class="form-control" name="officer_id" placeholder="Enter Employee ID" value="{{ Auth::user()->officer_id }}" readonly autofocus autocomplete="officer_id" />
                                                            <x-input-error :messages="$errors->get('officer_id')" class="mt-2" />
                                                        </div>
                                                    @endif
                                                    @if($permissionData && isset($permissionData['user_profile']['profile_role']) && $permissionData['user_profile']['profile_role'] == 'profile_role')
                                                        <div class="col-md-6">
                                                            <label class="form-label">Role</label>
                                                            <div class="form-group">
                                                                <select class="form-control select2 form-select" name="role" data-placeholder="Choose one Role" >
                                                                    @if($user->role == 'super_admin')
                                                                        <option value="{{ Auth::user()->role }}">Super Admin</option>
                                                                    @elseif($user->role == 'admin')
                                                                        <option value="{{ Auth::user()->role }}">Admin</option>
                                                                    @elseif($user->role == 'hr')
                                                                        <option value="{{ Auth::user()->role }}">HR</option>
                                                                    @elseif($user->role == 'content_manager')
                                                                        <option value="{{ Auth::user()->role }}">Content Manager</option>
                                                                    @elseif($user->role == 'viewer')
                                                                        <option value="{{ Auth::user()->role }}">Viewer</option>
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
                                                    @else
                                                        <div class="col-md-6">
                                                            <label class="form-label">Role</label>
                                                            <input type="text" class="form-control" name="role" placeholder="Enter Role" value="{{ Auth::user()->role }}" readonly autofocus autocomplete="role" />
                                                        </div>
                                                    @endif
                                                    @if($permissionData && isset($permissionData['user_profile']['profile_department_designation']) && $permissionData['user_profile']['profile_department_designation'] == 'profile_department_designation')
                                                        <div class="col-md-6">
                                                            <label class="form-label">Department</label>
                                                            <div class="form-group">
                                                                <select class="form-control select2 form-select" name="department_id" id="department" data-placeholder="Choose one department" required>
                                                                    <option label="Choose one department"></option>
                                                                    @foreach($departments as $department)
                                                                        <option value="{{ $department->id }}" {{$department->id ==  Auth::user()->department->id ? 'selected' : ''}} >{{ $department->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="form-label">Designation</label>
                                                            <div class="form-group">
                                                                <select class="form-control select2 form-select" name="designation_id" id="designation" data-placeholder="Choose one designation" required>
                                                                    <option value="{{ Auth::user()->designation_id }}">{{ Auth::user()->designation->name }}</option>
                                                                </select>
                                                            </div>
                                                            <x-input-error :messages="$errors->get('designation_id')" class="mt-2" />
                                                        </div>
                                                    @else
                                                        <div class="col-md-6">
                                                            <label class="form-label">Department</label>
                                                            <input type="text" class="form-control" name="department_id" placeholder="Enter Department" value="{{ Auth::user()->department->name }}" readonly autofocus autocomplete="department_id" />
                                                            <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Designation</label>
                                                            <input type="text" class="form-control" name="designation_id" placeholder="Enter designation" value="{{ Auth::user()->designation->name }}" readonly autofocus autocomplete="designation_id" />
                                                            <x-input-error :messages="$errors->get('designation_id')" class="mt-2" />
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="col-md-12 text-center my-3">
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

    <style>
        /* Style for the modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            width: 80%;
            border: 1px solid #888;
            overflow-y: auto;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>


    <script>
        // Initialize the preview as hidden
        document.getElementById('previewImage').style.display = 'none';

        // Open the modal
        function openImageEditor() {
            document.getElementById('imageEditorModal').style.display = 'block';
        }

        // Close the modal
        function closeImageEditor() {

            var preview = document.getElementById('previewImage');
            var fileInput = document.getElementById('imageInput');

            // Reset the file input and hide the preview
            fileInput.value = null;
            preview.src = '';
            preview.style.display = 'none';

            document.getElementById('imageEditorModal').style.display = 'none';
        }

        // Preview the selected image
        function previewImage() {
            var preview = document.getElementById('previewImage');
            var view = document.getElementById('viewImage');
            var fileInput = document.getElementById('imageInput');
            var file = fileInput.files[0];

            if (file) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block'; // Show the preview when an image is selected
                    view.style.display = 'none'; // Show the preview when an image is selected
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none'; // Hide the preview when no image is selected
            }
        }

        // Trigger the preview when the file input changes
        document.getElementById('imageInput').addEventListener('change', previewImage);

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


