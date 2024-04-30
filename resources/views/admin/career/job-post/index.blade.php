@extends('admin.master')

@section('title')
    Add Job Post
@endsection

@section('content')

    <section class="py-5">

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-5">
            <div class="breadcrumb-title pe-3">
                <a href="{{ route('career-job.index') }}">Manage Job Posts</a>
            </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add New Job Post</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-primary">{{session('message')}}</p>
        <hr>
        <!-- Create Blog Form-->
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">Add New Job Post </h5>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 ">
                            <form class="row" method="post" action="{{route('career-job.store')}}">
                                @csrf
                                @method('post')

                                <div class="mb-3 row">
                                    <label for="career_department_id" class="col-sm-2 col-form-label">Department</label>
                                    <div class="col-sm-10 form-group">
                                        <select class="form-control select2 form-select" name="career_department_id" id="career_department" data-placeholder="Choose one category" required>
                                            <option value="" selected>Choose one category</option>
                                            @foreach($career_departments as $department)
                                                <option value="{{ $department->id }}" {{$department->career_job_post_id == $department->id ? 'selected' : ''}} >{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('career_department_id')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="career_designation_id" class="col-sm-2 col-form-label">Designation</label>
                                    <div class="col-sm-10 form-group">
                                        <select class="form-control select2 form-select" name="career_designation_id" id="career_designation" data-placeholder="Choose one designation" required>
                                            <option value="">Select Designation</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('career_designation_id')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="prefix_id" class="col-sm-2 col-form-label">Job ID</label>
                                    <div class="col-sm-10 form-group">
                                        <input type="text" class="form-control" value="" name="prefix_id" id="prefix_id" readonly/>
                                        <x-input-error :messages="$errors->get('prefix_id')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="job_title" class="col-sm-2 col-form-label">Job Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="job_title" id="job_title">
                                        <x-input-error :messages="$errors->get('job_title')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="job_type" class="col-sm-2 col-form-label">Job Type</label>
                                    <div class="col-sm-10 form-group">
                                        <select class="form-control select2 form-select" name="job_type" id="job_type" data-placeholder="Choose one job type" required>
                                            <option value="">Choose one job type</option>
                                            <option value="Full Time">Full Time</option>
                                            <option value="Part Time">Part Time</option>
                                            <option value="Contractual">Contractual</option>
                                            <option value="Remote">Remote</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('job_type')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="vacancy" class="col-sm-2 col-form-label">No of Vacancy</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="vacancy" id="vacancy">
                                        <x-input-error :messages="$errors->get('vacancy')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="experience" class="col-sm-2 col-form-label">Years of Experience</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="experience" id="experience">
                                        <x-input-error :messages="$errors->get('experience')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="location" class="col-sm-2 col-form-label">Job Locations</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="location" id="location">
                                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="salary" class="col-sm-2 col-form-label">Salary Range</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="salary" id="salary">
                                        <x-input-error :messages="$errors->get('salary')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="job_description" class="col-sm-2 col-form-label">Job Post Details</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="job_description" id="editor" placeholder="Enter description" ></textarea>
                                        <x-input-error :messages="$errors->get('job_description')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="deadline" class="col-sm-2 col-form-label">Application Deadline</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="deadline" placeholder="MM/DD/YYYY" type="date">
                                        <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="status" class="col-sm-2 col-form-label">Job Post Status</label>
                                    <div class="col-sm-10">
                                        <input class="form-check-input m-2" type="checkbox" value="Draft" name="status" id="status">
                                        <label class="form-check-label ms-5 ps-1 pt-1" for="status">
                                            Draft
                                        </label>
                                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-12 text-center my-3">
                                    <button class="btn all-btn-same px-4" type="submit">Create</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
