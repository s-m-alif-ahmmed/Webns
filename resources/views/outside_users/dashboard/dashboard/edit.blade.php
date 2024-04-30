@extends('outside_users.dashboard.master')

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
                                        <p class="mb-4 text-center text-17">Manager Info</p>
                                    </div>
                                    <div class="row">
                                        <p class="text-success text-center">{{session('message')}}</p>
                                    </div>
                                    <div class="row mb-4">

                                            <div class="col-md-12 d-flex justify-content-center text-center">
                                                @if($outside_user->manager_photo)
                                                    <div class="image-profile" style="border-radius: 50%; overflow: hidden; height: 150px; width: 150px;">
                                                        <img class="mx-auto d-block" src="{{ asset($outside_user->manager_photo) }}" alt="Manager" style="max-height: 150px; max-width: 150px;" />
                                                        <div class="edit-button bg-gray w-100 h-50 pt-3" id="profileImage" onclick="openImageEditor()">
                                                            <i class="fa fa-2x fa-edit text-white"></i>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="image-profile" style="border-radius: 50%; overflow: hidden; height: 150px; width: 150px;">
                                                        <img class="mx-auto d-block" src="{{ asset('/') }}admin/images/users/blank_image.jpg" alt="Manager" style="max-height: 150px; max-width: 150px;" />
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

                                                        <form action="{{ route('outsider.user.update', $outside_user->id) }}" id="imageForm" method="POST" enctype="multipart/form-data">
                                                            @csrf

                                                            <input type="hidden" name="company_name" value="{{ $outside_user->company_name ?? '' }}">
                                                            <input type="hidden" name="company_logo" value="{{ $outside_user->company_logo ?? '' }}">
                                                            <input type="hidden" name="company_email" value="{{ $outside_user->company_email ?? '' }}">
                                                            <input type="hidden" name="company_number" value="{{ $outside_user->company_number ?? '' }}">
                                                            <input type="hidden" name="company_address" value="{{ $outside_user->company_address ?? '' }}">
                                                            <input type="hidden" name="team_manager_name" value="{{ $outside_user->team_manager_name ?? '' }}">
                                                            <input type="hidden" name="manager_designation" value="{{ $outside_user->manager_designation ?? '' }}">
                                                            <input type="hidden" name="manager_email" value="{{ $outside_user->manager_email ?? '' }}">
                                                            <input type="hidden" name="manager_number" value="{{ $outside_user->manager_number ?? '' }}">
                                                            <input type="hidden" name="manager_employ_id" value="{{ $outside_user->manager_employ_id ?? '' }}">
                                                            <input type="hidden" name="manager_employ_id_image" value="{{ $outside_user->manager_employ_id_image ?? '' }}">
                                                            <input type="hidden" name="password" value="{{ $outside_user->password ?? '' }}">
                                                            <input type="hidden" name="terms" value="{{ $outside_user->terms ?? '' }}">
                                                            <div class="row">
                                                                <div class="d-flex">
                                                                    <div class="col-md-6 my-auto px-2">
                                                                        <div id="imagePreviewContainer" class="text-center py-3">
                                                                            @if($outside_user->manager_photo)
                                                                                <img id="viewImage" src="{{asset($outside_user->manager_photo)}}" alt="viewImage" class="px-2" style="max-height: 200px; max-width: 200px;">
                                                                            @else
                                                                                <img id="viewImage" class="rounded-circle" src="{{ asset('/') }}admin/images/users/blank_image.jpg" alt="Employee" style="height: 100px; width: 100px;" id="profileImage" onclick="openImageEditor()">
                                                                            @endif
                                                                            <img id="previewImage" class="px-2" alt="Preview" style="max-height: 200px; max-width: 200px;">
                                                                            <input type="file" class="py-2" id="imageInput" name="manager_photo" onchange="previewImage()">
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

{{--                                                        @if($outside_user->manager_photo)--}}
{{--                                                            <div class="text-center mt-2">--}}
{{--                                                                <form action="{{ route('photo.destroy', Auth::user()->id) }}" id="deleteForm{{ Auth::user()->id }}" method="post" enctype="multipart/form-data" >--}}
{{--                                                                    @csrf--}}
{{--                                                                    --}}
{{--                                                                    <button type="submit" class="btn btn-danger" onclick="return deleteAction('{{ Auth::user()->id }}', 'Are you sure to remove this photo?', 'btn-danger')">Remove</button>--}}
{{--                                                                </form>--}}
{{--                                                            </div>--}}
{{--                                                        @endif--}}

                                                    </div>
                                                </div>
                                            </div>

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
    </script>


@endsection


