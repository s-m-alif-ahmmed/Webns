<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ route('dashboard') }}">
                <img src="{{asset('/')}}admin/images/brand/webns_logo.png" class="header-brand-img desktop-logo w-100" alt="logo" style="height: 50px;">
                <img src="{{asset('/')}}admin/images/brand/favicon.png" class="header-brand-img toggle-logo w-100 py-2" alt="logo" style="height: 50px;">
                <img src="{{asset('/')}}admin/images/brand/favicon.png" class="header-brand-img light-logo w-100 py-2" alt="logo" style="height: 50px;">
                <img src="{{asset('/')}}admin/images/brand/webns_logo.png" class="header-brand-img light-logo1 w-100" alt="logo" style="height: 50px;">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg>
            </div>
            <ul class="side-menu">
                <li>
                    <h3>Menu</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('dashboard') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                            <path d="M19.9794922,7.9521484l-6-5.2666016c-1.1339111-0.9902344-2.8250732-0.9902344-3.9589844,0l-6,5.2666016C3.3717041,8.5219116,2.9998169,9.3435669,3,10.2069702V19c0.0018311,1.6561279,1.3438721,2.9981689,3,3h2.5h7c0.0001831,0,0.0003662,0,0.0006104,0H18c1.6561279-0.0018311,2.9981689-1.3438721,3-3v-8.7930298C21.0001831,9.3435669,20.6282959,8.5219116,19.9794922,7.9521484z M15,21H9v-6c0.0014038-1.1040039,0.8959961-1.9985962,2-2h2c1.1040039,0.0014038,1.9985962,0.8959961,2,2V21z M20,19c-0.0014038,1.1040039-0.8959961,1.9985962-2,2h-2v-6c-0.0018311-1.6561279-1.3438721-2.9981689-3-3h-2c-1.6561279,0.0018311-2.9981689,1.3438721-3,3v6H6c-1.1040039-0.0014038-1.9985962-0.8959961-2-2v-8.7930298C3.9997559,9.6313477,4.2478027,9.0836182,4.6806641,8.7041016l6-5.2666016C11.0455933,3.1174927,11.5146484,2.9414673,12,2.9423828c0.4853516-0.0009155,0.9544067,0.1751099,1.3193359,0.4951172l6,5.2665405C19.7521973,9.0835571,20.0002441,9.6313477,20,10.2069702V19z"/>
                        </svg>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>
                @php
                    $permissionData = json_decode(Auth::user()->permission, true);
                @endphp
                @if($permissionData && isset($permissionData['users_all']))
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="16" width="20" viewBox="0 0 640 512">
                                <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/>
                            </svg>
                            <span class="side-menu__label">Users</span>
                            <i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="side-menu-label1">
                                <a href="javascript:void(0)">Users</a>
                            </li>
                            @if($permissionData && isset($permissionData['users_all']['team_all']['team_manage']) && $permissionData['users_all']['team_all']['team_manage'] == 'team_manage')
                                <li>
                                    <a href="{{ route('outsider.user.index') }}" class="slide-item">Manage Team</a>
                                </li>
                            @endif
                            @if($permissionData && isset($permissionData['users_all']['employ_all']['employ_manage']) && $permissionData['users_all']['employ_all']['employ_manage'] == 'employ_manage')
                                <li>
                                    <a href="{{ route('users') }}" class="slide-item">Manage Users</a>
                                </li>
                            @endif
                            @if($permissionData && isset($permissionData['users_all']['user_department']['department_manage']) && $permissionData['users_all']['user_department']['department_manage'] == 'department_manage')
                                <li>
                                    <a href="{{ route('department.index') }}" class="slide-item">Manage Department</a>
                                </li>
                            @endif
                            @if($permissionData && isset($permissionData['users_all']['user_designation']['designation_manage']) && $permissionData['users_all']['user_designation']['designation_manage'] == 'designation_manage')
                                <li>
                                    <a href="{{ route('designation.index') }}" class="slide-item">Manage Designation</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if($permissionData && isset($permissionData['blogs_all']))
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="16" width="16" viewBox="0 0 512 512">
                            <path d="M192 32c0 17.7 14.3 32 32 32c123.7 0 224 100.3 224 224c0 17.7 14.3 32 32 32s32-14.3 32-32C512 128.9 383.1 0 224 0c-17.7 0-32 14.3-32 32zm0 96c0 17.7 14.3 32 32 32c70.7 0 128 57.3 128 128c0 17.7 14.3 32 32 32s32-14.3 32-32c0-106-86-192-192-192c-17.7 0-32 14.3-32 32zM96 144c0-26.5-21.5-48-48-48S0 117.5 0 144V368c0 79.5 64.5 144 144 144s144-64.5 144-144s-64.5-144-144-144H128v96h16c26.5 0 48 21.5 48 48s-21.5 48-48 48s-48-21.5-48-48V144z"/>
                        </svg>
                        <span class="side-menu__label">Blog</span>
                        <i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1">
                            <a href="javascript:void(0)">Blog</a>
                        </li>
                        @if($permissionData && isset($permissionData['blogs_all']['blogs']['manage_blog']) && $permissionData['blogs_all']['blogs']['manage_blog'] == 'manage_blog')
                        <li>
                            <a href="{{ route('admin-blog.index') }}" class="slide-item">Manage Blogs</a>
                        </li>
                        @endif
                        @if($permissionData && isset($permissionData['blogs_all']['blog_categories']['manage_category']) && $permissionData['blogs_all']['blog_categories']['manage_category'] == 'manage_category')
                        <li>
                            <a href="{{ route('category.index') }}" class="slide-item">Manage Categories</a>
                        </li>
                        @endif
                        @if($permissionData && isset($permissionData['blogs_all']['blog_tags']['manage_tag']) && $permissionData['blogs_all']['blog_tags']['manage_tag'] == 'manage_tag')
                        <li>
                            <a href="{{ route('tag.index') }}" class="slide-item">Manage Tags</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif
                @if($permissionData && isset($permissionData['career_all']))
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="16" width="20" viewBox="0 0 640 512">
                            <path d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3V245.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V389.2C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112h32c24 0 46.2 7.5 64.4 20.3zM448 416V394.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176h32c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2V416c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3V261.7c-10 11.3-16 26.1-16 42.3zm144-42.3v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2V448c0 17.7-14.3 32-32 32H288c-17.7 0-32-14.3-32-32V405.2c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112h32c61.9 0 112 50.1 112 112z"/>
                        </svg>
                        <span class="side-menu__label">Career</span>
                        <i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1">
                            <a href="javascript:void(0)">Career</a>
                        </li>
                        @if($permissionData && isset($permissionData['career_all']['career_department']['department_manage']) && $permissionData['career_all']['career_department']['department_manage'] == 'department_manage')
                        <li>
                            <a href="{{ route('career-department.index') }}" class="slide-item"> Departments & Designations </a>
                        </li>
                        @endif
                        @if($permissionData && isset($permissionData['career_all']['job_post_all']['job_post_manage']) && $permissionData['career_all']['job_post_all']['job_post_manage'] == 'job_post_manage')
                        <li>
                            <a href="{{ route('career-job.index') }}" class="slide-item"> Manage Job Posts </a>
                        </li>
                        @endif
                        @if($permissionData && isset($permissionData['career_all']['job_application_all']['job_application_manage']) && $permissionData['career_all']['job_application_all']['job_application_manage'] == 'job_application_manage')
                        <li>
                            <a href="{{ route('career-job-application.index') }}" class="slide-item"> Manage Job Applications </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif
                @if($permissionData && isset($permissionData['event_all']))
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="16" width="14" viewBox="0 0 448 512">
                            <path d="M128 0c13.3 0 24 10.7 24 24V64H296V24c0-13.3 10.7-24 24-24s24 10.7 24 24V64h40c35.3 0 64 28.7 64 64v16 48V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V192 144 128C0 92.7 28.7 64 64 64h40V24c0-13.3 10.7-24 24-24zM400 192H48V448c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V192zM329 297L217 409c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47 95-95c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/>
                        </svg>
                        <span class="side-menu__label">Event</span>
                        <i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1">
                            <a href="javascript:void(0)">Event</a>
                        </li>
                        <li>
{{--                            <a href="icons.html" class="slide-item">Font Awesome</a>--}}
                        </li>
                    </ul>
                </li>
                @endif
                @if($permissionData && isset($permissionData['faq_all']))
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="16" width="10" viewBox="0 0 320 512">
                            <path d="M80 160c0-35.3 28.7-64 64-64h32c35.3 0 64 28.7 64 64v3.6c0 21.8-11.1 42.1-29.4 53.8l-42.2 27.1c-25.2 16.2-40.4 44.1-40.4 74V320c0 17.7 14.3 32 32 32s32-14.3 32-32v-1.4c0-8.2 4.2-15.8 11-20.2l42.2-27.1c36.6-23.6 58.8-64.1 58.8-107.7V160c0-70.7-57.3-128-128-128H144C73.3 32 16 89.3 16 160c0 17.7 14.3 32 32 32s32-14.3 32-32zm80 320a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/>
                        </svg>
                        <span class="side-menu__label">FAQ</span>
                        <i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li>
                            <a href="{{ route('admin-faq.index') }}" class="slide-item" >Manage FAQ</a>
                        </li>
                        <li>
                            <a href="{{ route('faq-category.index') }}" class="slide-item">Manage Category</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($permissionData && isset($permissionData['press_release_all']))
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="16" width="16" viewBox="0 0 512 512">
                            <path d="M168 80c-13.3 0-24 10.7-24 24V408c0 8.4-1.4 16.5-4.1 24H440c13.3 0 24-10.7 24-24V104c0-13.3-10.7-24-24-24H168zM72 480c-39.8 0-72-32.2-72-72V112C0 98.7 10.7 88 24 88s24 10.7 24 24V408c0 13.3 10.7 24 24 24s24-10.7 24-24V104c0-39.8 32.2-72 72-72H440c39.8 0 72 32.2 72 72V408c0 39.8-32.2 72-72 72H72zM176 136c0-13.3 10.7-24 24-24h96c13.3 0 24 10.7 24 24v80c0 13.3-10.7 24-24 24H200c-13.3 0-24-10.7-24-24V136zm200-24h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H376c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H376c-13.3 0-24-10.7-24-24s10.7-24 24-24zM200 272H408c13.3 0 24 10.7 24 24s-10.7 24-24 24H200c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80H408c13.3 0 24 10.7 24 24s-10.7 24-24 24H200c-13.3 0-24-10.7-24-24s10.7-24 24-24z"/>
                        </svg>
                        <span class="side-menu__label">Press Release</span>
                        <i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1">
                            <a href="javascript:void(0)">Press Release</a>
                        </li>
                        <li class="sub-slide">
{{--                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="#"><span--}}
{{--                                    class="sub-side-menu__label">Submenu-2</span><i--}}
{{--                                    class="sub-angle fa fa-angle-right"></i>--}}
{{--                            </a>--}}
{{--                            <ul class="sub-slide-menu">--}}
{{--                                <li class="sub-slide2">--}}
{{--                                    <a class="sub-side-menu__item2" href="#" data-bs-toggle="sub-slide2">--}}
{{--                                        <span class="sub-side-menu__label2">Submenu-2.3</span>--}}
{{--                                        <i class="sub-angle2 fa fa-angle-right"></i>--}}
{{--                                    </a>--}}
{{--                                    <ul class="sub-slide-menu2">--}}
{{--                                        <li><a href="#" class="sub-slide-item2">Submenu-2.3.1</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
                        </li>
                    </ul>
                </li>
                @endif
                @if($permissionData && isset($permissionData['settings_all']))
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="16" width="16" viewBox="0 0 512 512">
                            <path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z"/>
                        </svg>
                        <span class="side-menu__label">Settings</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
{{--                        <li class="side-menu-label1">--}}
{{--                            <a href="javascript:void(0)">Settings</a>--}}
{{--                        </li>--}}
{{--                        <li class="sub-slide">--}}
{{--                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="#">--}}
{{--                                <span class="sub-side-menu__label">File Manager</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </li>
                @endif
                @if($permissionData && isset($permissionData['queries_all']))
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"  enable-background="new 0 0 24 24" viewBox="0 0 576 512">
                            <path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384v38.6C310.1 219.5 256 287.4 256 368c0 59.1 29.1 111.3 73.7 143.3c-3.2 .5-6.4 .7-9.7 .7H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zm48 96a144 144 0 1 1 0 288 144 144 0 1 1 0-288zm0 240a24 24 0 1 0 0-48 24 24 0 1 0 0 48zM368 321.6V328c0 8.8 7.2 16 16 16s16-7.2 16-16v-6.4c0-5.3 4.3-9.6 9.6-9.6h40.5c7.7 0 13.9 6.2 13.9 13.9c0 5.2-2.9 9.9-7.4 12.3l-32 16.8c-5.3 2.8-8.6 8.2-8.6 14.2V384c0 8.8 7.2 16 16 16s16-7.2 16-16v-5.1l23.5-12.3c15.1-7.9 24.5-23.6 24.5-40.6c0-25.4-20.6-45.9-45.9-45.9H409.6c-23 0-41.6 18.6-41.6 41.6z"/>
                        </svg>
                        <span class="side-menu__label">Queries</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Pages</a></li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="{{ route('contact-message.index') }}">
                                <span class="sub-side-menu__label">Contact Massages</span>
                            </a>
                        </li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="{{ route('demo-request.index') }}">
                                <span class="sub-side-menu__label">Demo Request Massages</span>
                            </a>
                        </li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="{{ route('subscribe.email.index') }}">
                                <span class="sub-side-menu__label">Subscription</span>
                            </a>
                        </li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="{{ route('support.index') }}">
                                <span class="sub-side-menu__label">Support Message</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($permissionData && isset($permissionData['pages_all']))
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"  enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                            <path d="M19.8535156,8.1464844l-6-6C13.7597656,2.0526733,13.6326294,2,13.5,2H7C5.3438721,2.0018311,4.0018311,3.3438721,4,5v14c0.0018311,1.6561279,1.3438721,2.9981689,3,3h10c1.6561279-0.0018311,2.9981689-1.3438721,3-3V8.5C20,8.3673706,19.9473267,8.2402344,19.8535156,8.1464844z M14,3.7069702L18.2930298,8H14V3.7069702z M19,19c-0.0014038,1.1040039-0.8959961,1.9985962-2,2H7c-1.1040039-0.0014038-1.9985962-0.8959961-2-2V5c0.0014038-1.1040039,0.8959961-1.9985962,2-2h6v5.5c0,0.0001831,0,0.0003662,0,0.0005493C13.0001831,8.7765503,13.223999,9.0001831,13.5,9H19V19z"/>
                        </svg>
                        <span class="side-menu__label">Pages</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
{{--                        <li class="side-menu-label1"><a href="javascript:void(0)">Pages</a></li>--}}
{{--                        <li class="sub-slide">--}}
{{--                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="#"><span--}}
{{--                                    class="sub-side-menu__label">Error Pages</span><i--}}
{{--                                    class="sub-angle fa fa-angle-right"></i></a>--}}
{{--                            <ul class="sub-slide-menu">--}}
{{--                                <li>--}}
{{--                                    <a class="sub-slide-item" href="error404.html">404 Error</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
                    </ul>
                </li>
                @endif
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                                                           width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg>
            </div>
        </div>
    </div>
</div>
