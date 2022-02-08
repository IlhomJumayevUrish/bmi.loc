<?php

use App\About;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SocialContactController;
use App\Http\Controllers\UserController;
use App\SocialContact;
use App\User;
use Illuminate\Support\Facades\Route;
Route::post('/login/admin/', [UserController::class,'admin_login'])->name('enter');
Route::get('/login/', [UserController::class,'login'])->name('login');

Route::group(
    [
        'middleware' => 'is_admin',
    ],
    function () {
        // Logout
        Route::get('logout/',[UserController::class,'logout'])->name('logout');
        // News CRUD
        Route::get('/', [NewsController::class,'index'])->name('news-index');
        Route::get('news/create/',[NewsController::class,'create'])->name('news-create');
        Route::post('news/store/', [NewsController::class,'store'])->name('news-store');
        Route::post('news/delete/{id}', [NewsController::class,'destroy'])->name('news-delete');
        Route::get('news/show/{id}',[NewsController::class,'show'])->name('news-show');
        Route::get('news/edit/{id}',[NewsController::class,'edit'])->name('news-edit');
        Route::post('news/update/{id}', [NewsController::class,'update'])->name('news-update');
        // Social contact CRUD
        Route::get('contacts/index/', [SocialContactController::class,'index'])->name('contact-index');
        Route::get('contacts/create/',[SocialContactController::class,'create'])->name('contact-create');
        Route::post('contacts/store/', [SocialContactController::class,'store'])->name('contact-store');
        Route::post('contacts/delete/{id}', [SocialContactController::class,'destroy'])->name('contact-delete');
        Route::get('contacts/show/{id}',[SocialContactController::class,'show'])->name('contact-show');
        Route::get('contacts/edit/{id}',[SocialContactController::class,'edit'])->name('contact-edit');
        Route::post('contacts/update/{id}', [SocialContactController::class,'update'])->name('contact-update');
        // Employee CRUD
        Route::get('employees/index/', [UserController::class,'index'])->name('employee-index');
        Route::get('employees/create/',[UserController::class,'create'])->name('employee-create');
        Route::post('employees/store/',[UserController::class,'store'])->name('employee-store');
        Route::post('employees/delete/{id}',[UserController::class,'destroy'])->name('employee-delete');
        Route::get('employees/edit/{id}',[UserController::class,'edit'])->name('employee-edit');
        Route::post('employees/update/{id}',[UserController::class,'update'])->name('employee-update');
        Route::get('employee/show/{id}',[UserController::class,'show'])->name('employee-show');
        // ountry CRUD
        Route::get('countries/index',[CountryController::class,'index'])->name('country-index');
        Route::get('countries/show/{id}',[CountryController::class,'show'])->name('show-index');
        // Region CRUD
        Route::get('regions/index',[RegionController::class,'index'])->name('region-index');
        Route::get('regions/show/{id}',[RegionController::class,'show'])->name('show-index');
        // District CRUD
        Route::get('districts/index',[DistrictController::class,'index'])->name('district-index');
        // Category CRUD
        Route::get('categories/index',[CategoryController::class,'index'])->name('category-index');
        // About RU
        Route::get('about/',[AboutController::class,'index'])->name('about-index');
        Route::post('about/update/',[AboutController::class,'update'])->name('about-update');

      
        Route::get('/dashboard/v1', function () {
            return view('pages/dashboard-v1');
        })->name('dashboardv2');
        Route::get('/dashboard/v2', function () {
            return view('pages/dashboard-v2');
        });
        Route::get('/email/inbox', function () {
            return view('pages/email-inbox');
        });
        Route::get('/email/compose', function () {
            return view('pages/email-compose');
        });
        Route::get('/email/detail', function () {
            return view('pages/email-detail');
        });
        Route::get('/widget', function () {
            return view('pages/widget');
        });
        Route::get('/ui/general', function () {
            return view('pages/ui-general');
        });
        Route::get('/ui/typography', function () {
            return view('pages/ui-typography');
        });
        Route::get('/ui/tabs-accordions', function () {
            return view('pages/ui-tabs-accordions');
        });
        Route::get('/ui/unlimited-nav-tabs', function () {
            return view('pages/ui-unlimited-nav-tabs');
        });
        Route::get('/ui/modal-notification', function () {
            return view('pages/ui-modal-notification');
        });
        Route::get('/ui/widget-boxes', function () {
            return view('pages/ui-widget-boxes');
        });

        Route::get('/ui/buttons', function () {
            return view('pages/ui-buttons');
        });
        Route::get('/ui/icons', function () {
            return view('pages/ui-icons');
        });
        Route::get('/ui/simple-line-icons', function () {
            return view('pages/ui-simple-line-icons');
        });
        Route::get('/ui/ionicons', function () {
            return view('pages/ui-ionicons');
        });
        Route::get('/ui/tree-view', function () {
            return view('pages/ui-tree-view');
        });
        Route::get('/ui/language-bar-icon', function () {
            return view('pages/ui-language-bar-icon');
        });
        Route::get('/ui/social-buttons', function () {
            return view('pages/ui-social-buttons');
        });
        Route::get('/ui/intro-js', function () {
            return view('pages/ui-intro-js');
        });
        Route::get('/bootstrap-4', function () {
            return view('pages/bootstrap-4');
        });
        Route::get('/form/elements', function () {
            return view('pages/form-elements');
        });
        Route::get('/form/slider-switcher', function () {
            return view('pages/form-slider-switcher');
        });
        Route::get('/form/validation', function () {
            return view('pages/form-validation');
        });
        Route::get('/form/wizards', function () {
            return view('pages/form-wizards');
        });
        Route::get('/form/wizards-validation', function () {
            return view('pages/form-wizards-validation');
        });
        Route::get('/form/wysiwyg', function () {
            return view('pages/form-wysiwyg');
        });
        Route::get('/form/x-editable', function () {
            return view('pages/form-x-editable');
        });
        Route::get('/form/multiple-file-upload', function () {
            return view('pages/form-multiple-file-upload');
        });
        Route::get('/form/summernote', function () {
            return view('pages/form-summernote');
        });
        Route::get('/form/dropzone', function () {
            return view('pages/form-dropzone');
        });
        Route::get('/table/basic', function () {
            return view('pages/table-basic');
        });
        Route::get('/table/manage/autofill', function () {
            return view('pages/table-manage-autofill');
        });
        Route::get('/table/manage/buttons', function () {
            return view('pages/table-manage-buttons');
        });
        Route::get('/table/manage/colreorder', function () {
            return view('pages/table-manage-colreorder');
        });
        Route::get('/table/manage/fixed-column', function () {
            return view('pages/table-manage-fixed-column');
        });
        Route::get('/table/manage/fixed-header', function () {
            return view('pages/table-manage-fixed-header');
        });
        Route::get('/table/manage/keytable', function () {
            return view('pages/table-manage-keytable');
        });
        Route::get('/table/manage/responsive', function () {
            return view('pages/table-manage-responsive');
        });
        Route::get('/table/manage/rowreorder', function () {
            return view('pages/table-manage-rowreorder');
        });
        Route::get('/table/manage/scroller', function () {
            return view('pages/table-manage-scroller');
        });
        Route::get('/table/manage/select', function () {
            return view('pages/table-manage-select');
        });
        Route::get('/table/manage/combine', function () {
            return view('pages/table-manage-combine');
        });
        Route::get('/email-template/system', function () {
            return view('pages/email-template-system');
        });
        Route::get('/email-template/newsletter', function () {
            return view('pages/email-template-newsletter');
        });
        Route::get('/chart/flot', function () {
            return view('pages/chart-flot');
        });
        Route::get('/chart/morris', function () {
            return view('pages/chart-morris');
        });
        Route::get('/chart/js', function () {
            return view('pages/chart-js');
        });
        Route::get('/chart/d3', function () {
            return view('pages/chart-d3');
        });
        Route::get('/chart/apex', function () {
            return view('pages/chart-apex');
        });
        Route::get('/calendar', function () {
            return view('pages/calendar');
        });
        Route::get('/map/vector', function () {
            return view('pages/map-vector');
        });
        Route::get('/map/google', function () {
            return view('pages/map-google');
        });
        Route::get('/gallery/v1', function () {
            return view('pages/gallery-v1');
        });
        Route::get('/gallery/v2', function () {
            return view('pages/gallery-v2');
        });
        Route::get('/page-option/page-blank', function () {
            return view('pages/page-blank');
        });
        Route::get('/page-option/page-with-footer', function () {
            return view('pages/page-with-footer');
        });
        Route::get('/page-option/page-without-sidebar', function () {
            return view('pages/page-without-sidebar');
        });
        Route::get('/page-option/page-with-right-sidebar', function () {
            return view('pages/page-with-right-sidebar');
        });
        Route::get('/page-option/page-with-minified-sidebar', function () {
            return view('pages/page-with-minified-sidebar');
        });
        Route::get('/page-option/page-with-two-sidebar', function () {
            return view('pages/page-with-two-sidebar');
        });
        Route::get('/page-option/page-full-height', function () {
            return view('pages/page-full-height');
        });
        Route::get('/page-option/page-with-wide-sidebar', function () {
            return view('pages/page-with-wide-sidebar');
        });
        Route::get('/page-option/page-with-light-sidebar', function () {
            return view('pages/page-with-light-sidebar');
        });
        Route::get('/page-option/page-with-mega-menu', function () {
            return view('pages/page-with-mega-menu');
        });
        Route::get('/page-option/page-with-top-menu', function () {
            return view('pages/page-with-top-menu');
        });
        Route::get('/page-option/page-with-boxed-layout', function () {
            return view('pages/page-with-boxed-layout');
        });
        Route::get('/page-option/page-with-mixed-menu', function () {
            return view('pages/page-with-mixed-menu');
        });
        Route::get('/page-option/boxed-layout-with-mixed-menu', function () {
            return view('pages/page-boxed-layout-with-mixed-menu');
        });
        Route::get('/page-option/page-with-transparent-sidebar', function () {
            return view('pages/page-with-transparent-sidebar');
        });
        Route::get('/page-option/page-with-search-sidebar', function () {
            return view('pages/page-with-search-sidebar');
        });
        Route::get('/extra/timeline', function () {
            return view('pages/extra-timeline');
        });
        Route::get('/extra/coming-soon', function () {
            return view('pages/extra-coming-soon');
        });
        Route::get('/extra/search-result', function () {
            return view('pages/extra-search-result');
        });
        Route::get('/extra/invoice', function () {
            return view('pages/extra-invoice');
        });
        Route::get('/extra/error-page', function () {
            return view('pages/extra-error-page')->name('page-404');
        });
        Route::get('/extra/profile', function () {
            return view('pages/extra-profile');
        });
        Route::get('/extra/scrum-board', function () {
            return view('pages/extra-scrum-board');
        });
        Route::get('/extra/cookie-acceptance-banner', function () {
            return view('pages/extra-cookie-acceptance-banner');
        });


        Route::get('/register/v3', function () {
            return view('pages/register-v3');
        });
        Route::get('/helper/css', function () {
            return view('pages/helper-css');
        });
    }
);
