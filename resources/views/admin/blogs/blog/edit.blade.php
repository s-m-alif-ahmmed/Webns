@extends('admin.master')

@section('title')
    Edit Blog
@endsection

@section('content')

    <section class="py-5">

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">
                <a href="{{ route('admin-blog.index') }}">Blog</a>
            </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-primary">{{session('message')}}</p>

        <hr/>

        <!-- edit Blog Form-->
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0 text-center">Edit Blog </h5>
                    </div>
                    <div class="card-body">
                        <!-- ROW-1 OPEN -->
                        <div class="row pt-3" id="user-profile">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="border-top">
                                        <div class="wideget-user-tab">
                                            <div class="tab-menu-heading">
                                                <div class="tabs-menu1">
                                                    <ul class="nav">
                                                        @if($blog->language == 'English')
                                                            <li>
                                                                <a href="#english" id="englishTab" data-bs-toggle="tab">English</a>
                                                            </li>
                                                        @elseif($blog->language == 'বাংলা')
                                                            <li>
                                                                <a href="#bangla" id="banglaTab" data-bs-toggle="tab">বাংলা</a>
                                                            </li>
                                                        @endif
                                                        @if($blog->language == 'Both')
                                                            <li>
                                                                <a href="#english" id="englishTab" data-bs-toggle="tab">English</a>
                                                            </li>
                                                            <li>
                                                                <a href="#bangla" id="banglaTab" data-bs-toggle="tab">বাংলা</a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane" id="english">
                                        <!--Row -->
                                        <div class="row ">
                                            <div class="col-md-12">
                                                <div id="">
                                                    <form action="{{ route('admin-blog.update', Crypt::encryptString($blog->id) ) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PATCH')

                                                        <div id="form-one">
                                                            <div class="d-flex justify-content-between">
                                                                <div class="mx-auto">
                                                                    <h4 class="py-2">English Blog</h4>
                                                                    <hr />
                                                                </div>
                                                                <div class="text-right">
                                                                    <select class="form-select form-select px-3" name="language" style="width: 100px;">
                                                                        <option value="{{ $blog->language }}">{{ $blog->language }}</option>
                                                                        <option value="English" >English</option>
                                                                        <option value="Both" >Both</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />

                                                            <div class="col-12">
                                                                <label for="title" class="form-label"> Blog Title </label>
                                                                <input class="form-control" maxlength="100" type="text" name="title" id="title" value="{{ $blog->title }}" placeholder="Enter title" required />
                                                                <div class="justify-content-between d-flex my-1">
                                                                    <div class="">
                                                                        <span id="error-title"></span>
                                                                    </div>
                                                                    <div class="">
                                                                        <span id="char-count-title">60</span> /60 characters
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 form-group">
                                                                <label class="form-label"> Blog Category </label>
                                                                <select class="form-control select2 form-select" name="category_id" data-placeholder="Choose one category" required>
                                                                    <option value="" selected>Choose one category</option>
                                                                    @foreach($categories as $category)
                                                                        <option value="{{ $category->id }}" {{$category->id == $blog->category_id ? 'selected' : ''}}>{{ $category->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="col-12 form-group">
                                                                <label class="form-label">Blog Tags</label>
                                                                <select multiple class="form-control select2 form-select" id="tags" name="tags[]" aria-selected="Choose multiple tags" data-placeholder="Choose multiple tags" required>
                                                                    <option value="">Choose multiple tags</option>
                                                                    @foreach($tags as $tag)
                                                                        <option value="{{ $tag->id }}" @selected($blog->tags->contains($tag->id)) >{{ $tag->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="short_description" class="form-label"> Blog Short Description </label>
                                                                <textarea class="form-control" maxlength="150" name="short_description" id="short_description" placeholder="Enter short description" required >{{ $blog->short_description }}</textarea>
                                                                <div class="justify-content-between d-flex my-1">
                                                                    <div class="">
                                                                        <span id="error-short-description"></span>
                                                                    </div>
                                                                    <div class="">
                                                                        <span id="char-count-short-description">120</span> / 120 characters
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="summernote" class="form-label"> Blog Description </label>
                                                                <textarea class="form-control" name="description" id="editor" placeholder="Enter description" >{{ $blog->description }}</textarea>
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="image" class="form-label"> Featured Image </label>
                                                                <img class="my-2 rounded-3" src="{{ asset( $blog->image ) }}" alt="{{ $blog->alt }}" style="height: 100px; width: 120px;" />
                                                                <input class="form-control" type="file" name="image" id="image" value="{{ $blog->image }}" placeholder="Enter featured image" oninput="validateImageSize()"  />
                                                                <small id="imageSizeError" style="color: red;"></small>
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="alt" class="form-label"> Featured Image Alt Text </label>
                                                                <input class="form-control" type="text" name="alt" id="alt" value="{{ $blog->alt }}" placeholder="Enter featured image alt text " required />
                                                            </div>

                                                        </div>

                                                        <div id="form-two" >
                                                            <h4 class="text-center py-2">Meta Info</h4>
                                                            <div class="col-12">
                                                                <label for="meta_title" class="form-label"> Meta Title Image </label>
                                                                <input class="form-control" maxlength="100" type="text" name="meta_title" id="meta_title" value="{{ $blog->meta_title }}" placeholder="Enter meta title" required />
                                                                <div class="justify-content-between d-flex my-1">
                                                                    <div class="">
                                                                        <span id="error-meta-title"></span>
                                                                    </div>
                                                                    <div class="">
                                                                        <span id="char-count-meta-title">60</span> / 60 characters
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="meta_description" class="form-label"> Meta Description</label>
                                                                <textarea class="form-control" maxlength="200" name="meta_description" id="meta_description" placeholder="Enter meta description" required >{{ $blog->meta_description }}</textarea>
                                                                <div class="justify-content-between d-flex my-1">
                                                                    <div class="">
                                                                        <span id="error-meta-description"></span>
                                                                    </div>
                                                                    <div class="">
                                                                        <span id="char-count-meta-description">160</span> / 160 characters
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="status" class="form-label"> Blog Status</label>
                                                                <select class="form-select form-select" name="status" aria-label="Select blog status">
                                                                    <option value="{{ $blog->status }}">{{ $blog->status }}</option>
                                                                    <option value="Draft" >Draft</option>
                                                                    <option value="Publish">Publish</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 d-flex my-3 justify-content-between" >
                                                            <div class="" id="previous-one">
                                                                <button class="btn btn-primary px-4 text-start" id="previous-button-one" type="button">Previous</button>
                                                                <button class="btn btn-primary px-4 text-start" disabled id="previous-disable-one" type="button">Previous</button>
                                                            </div>
                                                            <div class="d-flex">
                                                                <div class="px-1" id="next-one">
                                                                    <button class="btn btn-primary px-4 text-end" id="next-button-english" type="button">Next</button>
                                                                    <button class="btn btn-primary px-4 text-end" id="next-disable-english" type="button" disabled>Next</button>
                                                                </div>
                                                                <div class="px-1" id="submit-one">
                                                                    <button class="btn btn-primary px-4 text-end" id="submit-button-one" type="submit">Submit</button>
                                                                    <button class="btn btn-primary px-4 text-end" id="submit-disable-one" disabled type="submit">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/Row-->
                                    </div>
                                    <div class="tab-pane" id="bangla">
                                        <!--Row -->
                                        <div class="row ">
                                            <div class="col-md-12">
                                                <div id="">
                                                    <form action="{{ route('admin-blog.update', Crypt::encryptString($blog->id) ) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PATCH')

                                                        <div id="form-three">
                                                            <div class="d-flex justify-content-between">
                                                                <div class="mx-auto">
                                                                    <h4 class="py-2"> বাংলা ব্লগ </h4>
                                                                    <hr />
                                                                </div>
                                                                <div class="text-right">
                                                                    <select class="form-select form-select px-3" name="language" style="width: 100px;">
                                                                        <option value="{{ $blog->language }}">{{ $blog->language }}</option>
                                                                        <option value="বাংলা">বাংলা</option>
                                                                        <option value="Both" >Both</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />

                                                            <div class="col-12">
                                                                <label for="bangla-title" class="form-label"> ব্লগ শিরোনাম </label>
                                                                <input class="form-control" maxlength="100" type="text" name="title" id="bangla-title" value="{{ $blog->title }}" placeholder="ব্লগ শিরোনাম লিখুন" required />
                                                                <div class="justify-content-between d-flex my-1">
                                                                    <div class="">
                                                                        <span id="error-bangla-title"></span>
                                                                    </div>
                                                                    <div class="">
                                                                        <span id="char-count-bangla-title">60</span> / 60 characters
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 form-group">
                                                                <label class="form-label"> ব্লগ ক্যাটেগরি</label>
                                                                <select class="form-control select2 form-select" name="category_id" data-placeholder="ব্লগ ক্যাটেগরি নির্বাচন করুন " required>
                                                                    <option value="" selected>ব্লগ ক্যাটেগরি নির্বাচন করুন </option>
                                                                    @foreach($categories as $category)
                                                                        <option value="{{ $category->id }}" {{$category->id == $blog->category_id ? 'selected' : ''}}>{{ $category->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="col-12 form-group">
                                                                <label class="form-label"> ব্লগ ট্যাগ</label>
                                                                <select multiple class="form-control select2 form-select" id="tags" name="tags[]" aria-selected="Choose multiple tags" data-placeholder="ব্লগ ট্যাগ নির্বাচন করুন " required>
                                                                    <option value="" >ব্লগ ট্যাগ নির্বাচন করুন </option>
                                                                    @foreach($tags as $tag)
                                                                        <option value="{{ $tag->id }}" @selected($blog->tags->contains($tag->id)) >{{ $tag->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="bangla_short_description" class="form-label"> ব্লগ সংক্ষিপ্ত বিবরণ </label>
                                                                <textarea class="form-control" maxlength="150" name="short_description" id="bangla_short_description" placeholder="ব্লগ সংক্ষিপ্ত বিবরণ লিখুন" required >{{ $blog->short_description }}</textarea>
                                                                <div class="justify-content-between d-flex my-1">
                                                                    <div class="">
                                                                        <span id="error-bangla-short-description"></span>
                                                                    </div>
                                                                    <div class="">
                                                                        <span id="char-count-bangla-short-description">120</span> / 120 characters
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="description" class="form-label"> ব্লগ বিবরণ </label>
                                                                <textarea class="form-control" name="description" id="editor1" placeholder="ব্লগ বিবরণ লিখুন" >{{ $blog->description }}</textarea>
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="image" class="form-label"> ফিচার্ড ছবি </label>
                                                                <img class="my-2 rounded-3" src="{{ asset( $blog->image ) }}" alt="{{ $blog->alt }}" style="height: 100px; width: 120px;" />
                                                                <input class="form-control" type="file" name="image" id="image-bangla" value="{{ $blog->image }}" placeholder="ফিচার্ড ছবি লিখুন" oninput="validateImageSizeBangla()" required />
                                                                <small id="imageSizeErrorBangla" style="color: red;"></small>
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="alt" class="form-label"> ফিচার্ড ছবি অল্ট টেক্সট </label>
                                                                <input class="form-control" type="text" name="alt" id="alt" value="{{ $blog->alt }}" placeholder="ফিচার্ড ছবি অল্ট টেক্সট লিখুন" required />
                                                            </div>

                                                        </div>

                                                        <div id="form-four" >
                                                            <h4 class="text-center py-2"> মেটা তথ্য</h4>
                                                            <div class="col-12">
                                                                <label for="bangla-meta-title" class="form-label"> মেটা শিরোনাম </label>
                                                                <input class="form-control" maxlength="100" type="text" name="meta_title" id="bangla-meta-title" value="{{ $blog->meta_title }}" placeholder="মেটা শিরোনাম লিখুন" required />
                                                                <div class="justify-content-between d-flex my-1">
                                                                    <div class="">
                                                                        <span id="error-bangla-meta-title"></span>
                                                                    </div>
                                                                    <div class="">
                                                                        <span id="char-count-bangla-meta-title">60</span> / 60 characters
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="bangla_meta_description" class="form-label"> মেটা বিবরণ</label>
                                                                <textarea class="form-control" maxlength="200" name="meta_description" id="bangla_meta_description" placeholder="মেটা বিবরণ লিখুন" required >{{ $blog->meta_description }}</textarea>
                                                                <div class="justify-content-between d-flex my-1">
                                                                    <div class="">
                                                                        <span id="error-bangla-meta-description"></span>
                                                                    </div>
                                                                    <div class="">
                                                                        <span id="char-count-bangla-meta-description">160</span> / 160 characters
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="status" class="form-label"> ব্লগ স্ট্যাটাস </label>
                                                                <select class="form-select form-select" name="status" aria-label="Select blog status">
                                                                    <option value="{{ $blog->status }}">{{ $blog->status }}</option>
                                                                    <option value="Draft" >Draft</option>
                                                                    <option value="Publish" >Publish</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 d-flex my-3 justify-content-between" >
                                                            <div class="" id="previous-two">
                                                                <button class="btn btn-primary px-4 text-start" id="previous-button-two" type="button">পূর্ববর্তী</button>
                                                                <button class="btn btn-primary px-4 text-start" disabled id="previous-disable-two" type="button">পূর্ববর্তী</button>
                                                            </div>
                                                            <div class="d-flex">
                                                                <div class="px-1" id="next-two">
                                                                    <button class="btn btn-primary px-4 text-end" id="next-button-bangla" type="button">পরবর্তী</button>
                                                                    <button class="btn btn-primary px-4 text-end" id="next-disable-bangla" type="button" disabled>পরবর্তী</button>
                                                                </div>
                                                                <div class="px-1" id="submit-two">
                                                                    <button class="btn btn-primary px-4 text-end" id="submit-button-two" type="submit"> জমা </button>
                                                                    <button class="btn btn-primary px-4 text-end" id="submit-disable-two" disabled type="submit"> জমা </button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/Row-->
                                    </div>
                                </div>
                            </div><!-- COL-END -->
                        </div>
                        <!-- ROW-1 CLOSED -->
                    </div>
                </div>
            </div>
        </div>

    </section>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.0/jquery.easing.js" type="text/javascript"></script>

@endsection
