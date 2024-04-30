<?php

use App\Models\OutsideUsers\OutsideUser;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilePhotoController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\Webns\HomeController;
use App\Http\Controllers\Admin\Users\DepartmentController;
use App\Http\Controllers\Admin\Users\DesignationController;
use App\Http\Controllers\Admin\Users\PermissionController;
use App\Http\Controllers\Admin\Users\DropdownController;
use App\Http\Controllers\Admin\Blogs\BlogController;
use App\Http\Controllers\Admin\Blogs\TagController;
use App\Http\Controllers\Admin\Blogs\CategoryController;
use App\Http\Controllers\Admin\FAQ\FaqCategoryController;
use App\Http\Controllers\Admin\FAQ\FaqController;
use App\Http\Controllers\Webns\Faq\HomeFaqController;
use App\Http\Controllers\Webns\Blog\HomeBlogController;
use App\Http\Controllers\Admin\Career\CareerDepartmentController;
use App\Http\Controllers\Admin\Career\CareerDesignationController;
use App\Http\Controllers\Admin\Career\CareerJobPostController;
use App\Http\Controllers\Webns\Career\HomeCareerController;
use App\Http\Controllers\Admin\Career\CareerJobApplicationController;
use App\Http\Controllers\Admin\Contact\ContactMessageController;
use App\Http\Controllers\Admin\DemoRequest\DemoRequestController;
use App\Http\Controllers\Admin\SubscribeEmail\SubscribeEmailController;
use App\Http\Controllers\OutsideUsers\Users\OutsideUsersController;
use App\Http\Controllers\OutsideUsers\Users\OutsideUserDashboardController;
use App\Http\Controllers\OutsideUsers\Users\OutsideUserPlayerController;
use App\Http\Controllers\OutsideUsers\Users\OutsideUserCoachController;
use App\Http\Controllers\Webns\Product\HomeProductController;
use App\Http\Controllers\Webns\Service\HomeServiceController;
use App\Http\Controllers\Webns\ToolsAndPlatform\HomeToolsAndPlatformController;
use App\Http\Controllers\Webns\Industries\HomeIndustriesController;
use App\Http\Controllers\Admin\Support\SupportMessageController;


//Main Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/about/team/detail', [HomeController::class, 'aboutSingleTeam'])->name('home.about.team.single');

//Contact
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact-message', [ContactMessageController::class, 'store'])->name('contact.store');

//Demo Request
Route::get('/demo-request', [HomeController::class, 'demoRequest'])->name('demo.request');
Route::post('/demo-request-message', [DemoRequestController::class, 'store'])->name('demo.request.store');

//Subscribe Email
Route::post('/subscribe-email', [SubscribeEmailController::class, 'store'])->name('subscribe.email.store');

//Others Pages
Route::get('/terms-of-use', [HomeController::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/cookies-policy', [HomeController::class, 'cookies'])->name('cookies');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/press-release', [HomeController::class, 'pressRelease'])->name('press.release');
Route::get('/press-release/detail', [HomeController::class, 'pressReleaseSingle'])->name('press.release.single');
Route::get('/events', [HomeController::class, 'events'])->name('events');
Route::get('/events/detail', [HomeController::class, 'eventsDetail'])->name('events.detail');
Route::get('/events/cricket-form', [HomeController::class, 'eventsCricketForm'])->name('events.cricket.form');
Route::get('/support-form', [HomeController::class, 'support'])->name('home.support');

//Home Career Page
Route::get('/career', [HomeCareerController::class, 'career'])->name('career');
Route::get('/career/detail/{slug_job_title}', [HomeCareerController::class, 'jobPostDetail'])->name('career.detail');
Route::get('/career/job/application/{slug_job_title}', [CareerJobApplicationController::class, 'create'])->name('career.job.application');
Route::post('/career/job/application', [CareerJobApplicationController::class, 'store'])->name('career.job.application.store');

//Home All Product Page
Route::get('/all-product', [HomeProductController::class, 'index'])->name('home.product');
Route::get('/product/detail', [HomeProductController::class, 'productSingle'])->name('home.product.single');

//Home Service Page
Route::get('/service', [HomeServiceController::class, 'index'])->name('home.service');
Route::get('/service/detail', [HomeServiceController::class, 'serviceSingle'])->name('home.service.single');

//Home Tools & Platform Page
Route::get('/tools-and-platform', [HomeToolsAndPlatformController::class, 'index'])->name('home.tools');
Route::get('/tools-and-platform/detail', [HomeToolsAndPlatformController::class, 'toolsSingle'])->name('home.tools.single');

//Home Industries Page
Route::get('/industries', [HomeIndustriesController::class, 'index'])->name('home.industries');
Route::get('/industries/detail', [HomeIndustriesController::class, 'industriesSingle'])->name('home.industries.single');

//Home Blog Page
Route::get('/blog', [HomeBlogController::class, 'blog'])->name('home.blog');
Route::get('/blog/detail/{slug_title}', [HomeBlogController::class, 'blogSingle'])->name('blog.single');

//Home Faq Pages
Route::get('/faq', [HomeFaqController::class, 'faq'])->name('faq');
Route::get('/faq/search/result', [HomeFaqController::class, 'FaqSearchResult'])->name('faq.search.result');

//Error
Route::get('/error-404',[HomeController::class,'error'])->name('error');

//Outside Users
Route::get('/company/login',[OutsideUsersController::class,'login'])->name('outsider.login');
Route::post('/company/login',[OutsideUsersController::class,'loginCheck'])->name('outsider.login');
Route::get('/company/register',[OutsideUsersController::class,'register'])->name('outsider.register');
Route::post('/company/register',[OutsideUsersController::class,'store'])->name('outsider.user.store');


Route::middleware(['outsideUser'])->group(function (){

    Route::post('/company/logout',[OutsideUsersController::class,'logout'])->name('outsider.user.logout');
    Route::get('/company/user/edit/{id}',[OutsideUsersController::class,'edit'])->name('outsider.user.edit');
    Route::post('/company/user/update/{id}',[OutsideUsersController::class,'update'])->name('outsider.user.update');

    Route::get('/company/dashboard/{id}',[OutsideUserDashboardController::class,'dashboard'])->name('outsider.user.dashboard');

//    Player
    Route::get('/company/player/create',[OutsideUserPlayerController::class,'create'])->name('outsider.user.player.create');
    Route::post('/company/player/store/{id}',[OutsideUserPlayerController::class,'store'])->name('outsider.user.player.store');
    Route::get('/company/player/edit/{id}',[OutsideUserPlayerController::class,'edit'])->name('outsider.user.player.edit');
    Route::post('/company/player/update/{id}',[OutsideUserPlayerController::class,'update'])->name('outsider.user.player.update');

//    Coach
    Route::get('/company/coach/create',[OutsideUserCoachController::class,'create'])->name('outsider.user.coach.create');
    Route::post('/company/coach/store/{id}',[OutsideUserCoachController::class,'store'])->name('outsider.user.coach.store');
    Route::get('/company/coach/edit/{id}',[OutsideUserCoachController::class,'edit'])->name('outsider.user.coach.edit');
    Route::post('/company/coach/update/{id}',[OutsideUserCoachController::class,'update'])->name('outsider.user.coach.update');

});

Route::middleware(['userBan'])->group(function () {

    Route::middleware(['auth', 'verified'])->group(function () {

        //    Admin Middleware
        Route::middleware(['super_admin','admin','hr','content_manager','viewer'])->group(function () {

            Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

            //   Users
            Route::get('/users',[UserController::class,'users'])->name('users');
            Route::get('/users/manual-registration',[UserController::class,'usersRegistration'])->name('users.registration');
            Route::get('/users/profile/{id}',[UserController::class,'profile'])->name('user.profile');
            Route::get('/users/profile/edit/{id}',[UserController::class,'profileEdit'])->name('profile.user.edit');
            Route::get('/user/change-password/{id}',[UserController::class,'password'])->name('users.password');
            Route::patch('/user/change-password/{id}',[UserController::class,'passwordChange'])->name('users.password.update');
            Route::get('/user/edit/{id}',[UserController::class,'edit'])->name('users.edit');
            Route::patch('/user/update/{id}',[UserController::class,'update'])->name('users.update');
            Route::get('/user/detail/{id}',[UserController::class,'usersDetail'])->name('users.detail');
            Route::delete('/delete/user/{id}', [UserController::class, 'deleteUser'])->name('delete.user');
            Route::get('/change-role/{id}',[UserController::class,'changeRole'])->name('change.role');
            Route::get('/change-ban-status/{id}',[UserController::class,'changeBanStatus'])->name('change.ban.status');

//            Outside Users
            Route::get('/admin/company/user',[OutsideUsersController::class,'index'])->name('outsider.user.index');
            Route::get('/admin/company/user/detail/{id}',[OutsideUsersController::class,'show'])->name('outsider.user.show');
            Route::get('/admin/company/user/edit/{id}',[OutsideUsersController::class,'adminEdit'])->name('outsider.user.admin.edit');
            Route::post('/admin/company/user/update/{id}',[OutsideUsersController::class,'adminUpdate'])->name('outsider.user.admin.update');
            Route::get('/admin/company/change-ban-status/{id}',[OutsideUsersController::class,'adminChangeBanStatus'])->name('outsider.change.ban.status');
            Route::get('/admin/company/change-approve-status/{id}',[OutsideUsersController::class,'adminChangeApproveStatus'])->name('outsider.change.approve.status');
            Route::post('/admin/company/user/delete/{id}',[OutsideUsersController::class,'delete'])->name('outsider.user.delete');

//            Outside Player
            Route::get('/admin/company/player/edit/{id}',[OutsideUserPlayerController::class,'adminEdit'])->name('admin.outsider.user.player.edit');
            Route::post('/admin/company/player/update/{id}',[OutsideUserPlayerController::class,'adminUpdate'])->name('admin.outsider.user.player.update');
            Route::get('/admin/company/player/detail/{id}',[OutsideUserPlayerController::class,'show'])->name('admin.outsider.user.player.show');
            Route::get('/admin/company/player/status/{id}',[OutsideUserPlayerController::class,'status'])->name('admin.outsider.user.player.status');
            Route::post('/admin/company/player/delete/{id}',[OutsideUserPlayerController::class,'destroy'])->name('admin.outsider.user.player.delete');

//            Outside Coach
            Route::get('/admin/company/coach/edit{id}',[OutsideUserCoachController::class,'adminEdit'])->name('admin.outsider.user.coach.edit');
            Route::post('/admin/company/coach/update/{id}',[OutsideUserCoachController::class,'adminUpdate'])->name('admin.outsider.user.coach.update');
            Route::get('/admin/company/coach/detail/{id}',[OutsideUserCoachController::class,'show'])->name('admin.outsider.user.coach.show');
            Route::get('/admin/company/coach/status/{id}',[OutsideUserCoachController::class,'status'])->name('admin.outsider.user.coach.status');
            Route::post('/admin/company/coach/delete/{id}',[OutsideUserCoachController::class,'destroy'])->name('admin.outsider.user.coach.delete');

//             Department
            Route::resource('/department',DepartmentController::class);
            Route::get('/department/change-status/{id}',[DepartmentController::class,'changeStatusDepartment'])->name('status.department');

            //             Designation
            Route::resource('/designation',DesignationController::class);
            Route::get('/designation/change-status/{id}',[DesignationController::class,'changeStatusDesignation'])->name('status.designation');

            //  Permission
            Route::resource('/user/permission',PermissionController::class);

//            Dropdown
            Route::get('/getDesignationsByDepartment', [DropdownController::class, 'getDesignationsByDepartment']);

//            Blog Categories
            Route::resource('/blog/category', CategoryController::class);
            Route::get('/blog/category/status/{id}',[CategoryController::class,'changeCategoryStatus'])->name('change.status.category');

//            Blog Tags
            Route::resource('/blog/tag', TagController::class);
            Route::get('/blog/tag/status/{id}',[TagController::class,'changeTagStatus'])->name('change.status.tag');

//             Blogs
            Route::resource('/admin-blog', BlogController::class);
            Route::get('/blog/preview/{id}', [BlogController::class,'preview'])->name('blog.preview');
            Route::get('/blog/status/{id}',[BlogController::class,'changeBlogStatus'])->name('change.status.blog');
            Route::get('/change-popular-blog-status/{id}',[BlogController::class,'changePopularBlogStatus'])->name('change.status.popular.blog');

//            FAQ Category
            Route::resource('/faq-category', FaqCategoryController::class);
            Route::get('/faq-category/status/{id}',[FaqCategoryController::class,'changeFaqCategoryStatus'])->name('change.status.faq.category');

//            FAQ
            Route::resource('/admin-faq', FaqController::class);
            Route::get('/faq/status/{id}',[FaqController::class,'changeFaqStatus'])->name('change.status.faq');

//            Career Designation
            Route::resource('/admin/career-department', CareerDepartmentController::class);

//            Career Designation
            Route::resource('/admin/career-designation', CareerDesignationController::class);

//            Career Designation
            Route::resource('/admin/career-job', CareerJobPostController::class);
            Route::get('/admin/career-job/status/{id}',[CareerJobPostController::class,'changeJobPostStatus'])->name('change.status.job');
            Route::get('/admin/career-job/preview/{id}',[CareerJobPostController::class,'jobPreview'])->name('career-job.preview');

//           Career Dropdown
            Route::get('/getCareerDesignationsByDepartment', [CareerJobPostController::class, 'getCareerDesignationsByDepartment']);
            Route::get('/getPrefixIdByDesignation', [CareerJobPostController::class, 'getPrefixIdByDesignation']);

//            Career Job Applications
            Route::get('/admin/career/job/application', [CareerJobApplicationController::class, 'index'])->name('career-job-application.index');
            Route::get('/admin/career-job-application/checked/{id}',[CareerJobApplicationController::class,'changeStatusJobApplicationChecked'])->name('change.status.job.application.checked');
            Route::get('/admin/career-job-application/shortlisted/{id}',[CareerJobApplicationController::class,'changeStatusJobApplicationShortlisted'])->name('change.status.job.application.shortlisted');
            Route::get('/admin/career-job-application/interview_call/{id}',[CareerJobApplicationController::class,'changeStatusJobApplicationInterviewCall'])->name('change.status.job.application.interview-call');
            Route::get('/admin/career-job-application/rejected/{id}',[CareerJobApplicationController::class,'changeStatusJobApplicationRejected'])->name('change.status.job.application.rejected');
            Route::get('/admin/career-job-application/hired/{id}',[CareerJobApplicationController::class,'changeStatusJobApplicationHired'])->name('change.status.job.application.hired');
            Route::get('/admin/career/job/application/{id}', [CareerJobApplicationController::class, 'show'])->name('career-job-application.show');
            Route::post('/admin/career/job/application/{id}', [CareerJobApplicationController::class, 'destroy'])->name('career-job-application.destroy');

//            Contact message
            Route::get('/admin/contact-message', [ContactMessageController::class, 'index'])->name('contact-message.index');
            Route::get('/admin/contact/message/{id}', [ContactMessageController::class, 'show'])->name('contact-message.show');
            Route::post('/admin/contact/message/{id}', [ContactMessageController::class, 'update'])->name('contact-message.update');
            Route::get('/admin/contact-message/{id}', [ContactMessageController::class, 'changeContactMessageStatus'])->name('contact-message.change.status');
            Route::post('/admin/contact-message/{id}', [ContactMessageController::class, 'destroy'])->name('contact-message.destroy');

//            Demo Request
            Route::get('/admin/demo-request', [DemoRequestController::class, 'index'])->name('demo-request.index');
            Route::get('/admin/demo/request/{id}', [DemoRequestController::class, 'show'])->name('demo-request.show');
            Route::post('/admin/demo/request/{id}', [DemoRequestController::class, 'update'])->name('demo-request.update');
            Route::get('/admin/demo-request/{id}', [DemoRequestController::class, 'changeDemoRequestStatus'])->name('demo-request.change.status');
            Route::post('/admin/demo-request/{id}', [DemoRequestController::class, 'destroy'])->name('demo-request.destroy');

//            Subscribe Email
            Route::get('/admin/subscribe-email', [SubscribeEmailController::class, 'index'])->name('subscribe.email.index');
            Route::post('/admin/subscribe-email/{id}', [SubscribeEmailController::class, 'destroy'])->name('subscribe.email.destroy');


//            FAQ Category
            Route::resource('/admin/support', SupportMessageController::class);
            Route::get('/admin/support/status/{id}',[SupportMessageController::class,'changeSupportStatus'])->name('change.status.support');


        });

    });


    Route::middleware('auth')->group(function () {

        //    Profile Show

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        //    Profile Photo manage

        Route::resource('/photo', ProfilePhotoController::class);
        Route::get('/photo/{id}', [ProfilePhotoController::class, 'show'])->name('profile.show');

    });

});



require __DIR__.'/auth.php';
