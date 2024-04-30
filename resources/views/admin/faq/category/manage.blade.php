@extends('admin.master')

@section('title')
    FAQ Categories
@endsection

@section('content')

    <section class="py-5">
        <!--breadcrumb-->
        <div class="d-flex justify-content-between">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage FAQ Categories</li>
                        </ol>
                    </nav>
                </div>
            </div>
{{--            @php--}}
{{--                $permissionData = json_decode(Auth::user()->permission, true);--}}
{{--            @endphp--}}
{{--            @if($permissionData && isset($permissionData['blogs_all']['blog_categories']['category_create']) && $permissionData['blogs_all']['blog_categories']['category_create'] == 'category_create')--}}
                <div class="">
                    <a class="btn all-btn-same rounded-3" href="{{ route('faq-category.create') }}">Add FAQ Category</a>
                </div>
{{--            @endif--}}
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-muted">{{session('message')}}</p>

        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom w-100" id="file-datatable" style="width:100%">
                        <thead>
                        <tr>
                            <th> SL </th>
{{--                            @php--}}
{{--                                $permissionData = json_decode(Auth::user()->permission, true);--}}
{{--                            @endphp--}}
{{--                            @if($permissionData && isset($permissionData['blogs_all']['blog_categories']['category_number']) && $permissionData['blogs_all']['blog_categories']['category_number'] == 'category_number')--}}
                                <th> Category ID </th>
{{--                            @endif--}}
                            <th> FAQ Category English </th>
                            <th> FAQ Category Bangla </th>
{{--                            @if($permissionData && isset($permissionData['blogs_all']['blog_categories']['category_status']) && $permissionData['blogs_all']['blog_categories']['category_status'] == 'category_status')--}}
                                <th> Category Status </th>
{{--                            @endif--}}
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($faq_categories as $faq_category)
                            <tr>
                                <td>{{$loop->iteration}}</td>
{{--                                @php--}}
{{--                                    $permissionData = json_decode(Auth::user()->permission, true);--}}
{{--                                @endphp--}}
{{--                                @if($permissionData && isset($permissionData['blogs_all']['blog_categories']['category_number']) && $permissionData['blogs_all']['blog_categories']['category_number'] == 'category_number')--}}
                                    <td>{{$faq_category->id}}</td>
{{--                                @endif--}}
                                <td>{{$faq_category->english}}</td>
                                <td>{{$faq_category->bangla}}</td>
                                <td>
{{--                                    @php--}}
{{--                                        $permissionData = json_decode(Auth::user()->permission, true);--}}
{{--                                    @endphp--}}
{{--                                    @if($permissionData && isset($permissionData['blogs_all']['blog_categories']['category_status']) && $permissionData['blogs_all']['blog_categories']['category_status'] == 'category_status')--}}
                                        @if($faq_category->status == 'active')
                                            <a href="{{ route('change.status.faq.category', $faq_category->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-success')" class="btn btn-success">Active</a>
                                        @else($faq_category->status == 'inActive')
                                            <a href="{{ route('change.status.faq.category', $faq_category->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">InActive</a>
                                        @endif
{{--                                    @endif--}}
                                </td>
                                <td>
                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
{{--                                        @php--}}
{{--                                            $permissionData = json_decode(Auth::user()->permission, true);--}}
{{--                                        @endphp--}}
{{--                                        @if($permissionData && isset($permissionData['blogs_all']['blog_categories']['category_detail']) && $permissionData['blogs_all']['blog_categories']['category_detail'] == 'category_detail')--}}
                                            <span class="d-inline-block ms-2" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="View">
                                                <a href="{{route('faq-category.show', Crypt::encryptString($faq_category->id))}}" class="text-primary mx-1"><i class="fa fa-eye"></i></a>
                                            </span>
{{--                                        @endif--}}
{{--                                        @if($permissionData && isset($permissionData['blogs_all']['blog_categories']['category_edit']) && $permissionData['blogs_all']['blog_categories']['category_edit'] == 'category_edit')--}}
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Edit">
                                                <a href="{{route('faq-category.edit', Crypt::encryptString($faq_category->id))}}" class="text-warning mx-1"><i class="fa fa-edit"></i></a>
                                            </span>
{{--                                        @endif--}}
{{--                                        @if($permissionData && isset($permissionData['blogs_all']['blog_categories']['category_delete']) && $permissionData['blogs_all']['blog_categories']['category_delete'] == 'category_delete')--}}
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Delete">
                                                <form action="{{ route('faq-category.destroy', $faq_category->id )}}" method="post" id="deleteForm{{ $faq_category->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-danger border-0" type="button" onclick="return deleteAction('{{ $faq_category->id }}', 'Are you sure to delete this category?', 'btn-danger')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </span>
{{--                                        @endif--}}
                                    </div>
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
