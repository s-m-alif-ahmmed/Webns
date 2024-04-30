@extends('admin.master')

@section('title')
    FAQ
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
                            <li class="breadcrumb-item active" aria-current="page">Manage FAQs</li>
                        </ol>
                    </nav>
                </div>
            </div>
{{--            @php--}}
{{--                $permissionData = json_decode(Auth::user()->permission, true);--}}
{{--            @endphp--}}
{{--            @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_create']) && $permissionData['blogs_all']['blogs']['blog_create'] == 'blog_create')--}}
                <div class="">
                    <a class="btn all-btn-same rounded-3" href="{{ route('admin-faq.create') }}">Add FAQ</a>
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
{{--                            @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_number']) && $permissionData['blogs_all']['blogs']['blog_number'] == 'blog_number')--}}
                                <th> FAQ ID </th>
{{--                            @endif--}}
                            <th> FAQ Question </th>
{{--                            @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_status']) && $permissionData['blogs_all']['blogs']['blog_status'] == 'blog_status')--}}
                                <th> FAQ Status </th>
{{--                            @endif--}}
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($faqs as $faq)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
{{--                                @php--}}
{{--                                    $permissionData = json_decode(Auth::user()->permission, true);--}}
{{--                                @endphp--}}
{{--                                @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_number']) && $permissionData['blogs_all']['blogs']['blog_number'] == 'blog_number')--}}
                                    <td>
                                        {{$faq->id}}
                                    </td>
{{--                                @endif--}}
                                <td>
                                    {{$faq->question}}
                                </td>
{{--                                @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_status']) && $permissionData['blogs_all']['blogs']['blog_status'] == 'blog_status')--}}
                                    <td>
                                        @if($faq->status == 'active')
                                            <a href="{{ route('change.status.faq', $faq->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-success')" class="btn btn-success">Active</a>
                                        @else($faq->status == 'inActive')
                                            <a href="{{ route('change.status.faq', $faq->id) }}" onclick="return StatusAction(event, 'Are you sure to change the status?', 'btn-danger')" class="btn btn-danger">InActive</a>
                                        @endif
                                    </td>
{{--                                @endif--}}
                                <td>
                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
{{--                                        @php--}}
{{--                                            $permissionData = json_decode(Auth::user()->permission, true);--}}
{{--                                        @endphp--}}
{{--                                        @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_detail']) && $permissionData['blogs_all']['blogs']['blog_detail'] == 'blog_detail')--}}
                                            <span class="d-inline-block ms-2" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="View">
                                                <a href="{{route('admin-faq.show', Crypt::encryptString($faq->id))}}" class="text-primary mx-1"><i class="fa fa-eye"></i></a>
                                            </span>
{{--                                        @endif--}}
{{--                                        @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_edit']) && $permissionData['blogs_all']['blogs']['blog_edit'] == 'blog_edit')--}}
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Edit">
                                                <a href="{{route('admin-faq.edit', Crypt::encryptString($faq->id))}}" class="text-warning mx-1"><i class="fa fa-edit"></i></a>
                                            </span>
{{--                                        @endif--}}
{{--                                        @if($permissionData && isset($permissionData['blogs_all']['blogs']['blog_delete']) && $permissionData['blogs_all']['blogs']['blog_delete'] == 'blog_delete')--}}
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" data-bs-content="Delete">
                                                <form action="{{ route('admin-faq.destroy', $faq->id )}}" method="post" enctype="multipart/form-data" id="deleteForm{{ $faq->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-danger border-0" type="submit" onclick="return deleteAction('{{ $faq->id }}', 'Are you sure to delete this blog?', 'btn-danger')">
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
