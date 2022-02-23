<?php

use App\About;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SocialContactController;
use App\Http\Controllers\SrviceController;
use App\Http\Controllers\UserController;
use App\SocialContact;
use App\User;
use Illuminate\Support\Facades\Route;


Route::get('index/',[Controller::class,'index'])->name('index');


Route::post('/login/admin/', [UserController::class,'admin_login'])->name('enter');
Route::get('/login/', [UserController::class,'login'])->name('login');



Route::group(
    [
        'prefix' => 'admin',
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
        Route::get('social/contacts/index/', [SocialContactController::class,'index'])->name('contact-index');
        Route::get('social/contacts/create/',[SocialContactController::class,'create'])->name('contact-create');
        Route::post('csocial/ontacts/store/', [SocialContactController::class,'store'])->name('contact-store');
        Route::post('social/contacts/delete/{id}', [SocialContactController::class,'destroy'])->name('contact-delete');
        Route::get('social/contacts/show/{id}',[SocialContactController::class,'show'])->name('contact-show');
        Route::get('social/contacts/edit/{id}',[SocialContactController::class,'edit'])->name('contact-edit');
        Route::post('social/contacts/update/{id}', [SocialContactController::class,'update'])->name('contact-update');
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
        Route::get('about/edit/',[AboutController::class,'edit'])->name('about-edit');
        Route::post('about/update/',[AboutController::class,'update'])->name('about-update');
        // Contact CRUD
        Route::get('user/contact/index/',[ContactController::class,'index'])->name('contact-user-index');
        Route::get('user/contact/add/',[ContactController::class,'create'])->name('contact-user-create');
        Route::post('user/contact/store/',[ContactController::class,'store'])->name('contact-user-store');
        Route::post('user/contact/delete/{id}', [ContactController::class,'destroy'])->name('contact-user-delete');
        Route::get('user/contact/edit/{id}', [ContactController::class,'edit'])->name('contact-user-edit');
        Route::post('user/contact/update/{id}', [ContactController::class,'update'])->name('contact-user-update');
         // Partners  CRUD
        Route::get('partners/index',[PartnerController::class,'index'])->name('partner-index');
        Route::get('partners/add',[PartnerController::class,'add'])->name('partner-add');
        Route::post('partners/store',[PartnerController::class,'store'])->name('partner-store');
        Route::get('partners/edit/{id}',[PartnerController::class,'edit'])->name('partner-edit');
        Route::post('partners/update/{id}',[PartnerController::class,'update'])->name('partner-update');
        Route::post('partners/delete/{id}',[PartnerController::class,'destroy'])->name('partner-delete');
        // Product CRUD
        Route::get('product/index/',[ProductController::class,'index'])->name('product-index');
        Route::get('product/create/',[ProductController::class,'create'])->name('product-create');
        Route::post('product/store/',[ProductController::class,'store'])->name('product-store');
        Route::post('product/delete/{id}/',[ProductController::class,'destroy'])->name('product-delete');
        Route::get('product/edit/{id}/',[ProductController::class,'edit'])->name('product-edit');
        Route::post('product/update/{id}/',[ProductController::class,'update'])->name('product-update');
        // Service CRUD
        Route::get('service/index',[SrviceController::class,'index'])->name('service-index');
        Route::get('service/create',[SrviceController::class,'create'])->name('service-create');
        Route::post('service/delete/{id}/',[SrviceController::class,'destroy'])->name('service-delete');
        Route::post('service/store',[SrviceController::class,'store'])->name('service-store');
        Route::get('service/edit/{id}/', [SrviceController::class, 'edit'])->name('service-edit');
        Route::post('service/update/{id}/', [SrviceController::class, 'update'])->name('service-update');
        // Admin Update
    
        Route::get('profile/', [UserController::class, 'profile'])->name('profile');
        Route::post('profile/update/{id}', [UserController::class, 'profileUpdate'])->name('profile-update');
        //  Category CRUD
        Route::get('catecories/index',[CategoryController::class,'index'])->name('category-index');
        Route::post('catecories/store',[CategoryController::class,'store'])->name('category-store');
        Route::post('catecories/update/{id}',[CategoryController::class,'update'])->name('category-update');
        Route::post('catecories/delete/{id}',[CategoryController::class,'destroy'])->name('category-delete');
        // Countries CRUD
        Route::get('countries/index',[CountryController::class,'all'])->name('country-index');
        Route::post('countries/store',[CountryController::class,'store'])->name('country-store');
        Route::post('countries/update/{id}',[CountryController::class,'update'])->name('country-update');
        // Regions CRUD  
        Route::get('regions/index', [RegionController::class, 'all'])->name('region-index');
        Route::post('regions/store', [RegionController::class, 'store'])->name('region-store');
        Route::post('regions/delete/{id}', [RegionController::class, 'destroy'])->name('region-delete');
        Route::post('regions/update/{id}', [RegionController::class, 'update'])->name('region-update');
        // Districts CRUD
        Route::get('districts/index', [DistrictController::class, 'index'])->name('district-index');
        Route::post('districts/store', [DistrictController::class, 'store'])->name('district-store');
        Route::post('districts/update/{id}', [DistrictController::class, 'update'])->name('district-update');
        Route::post('districts/delete/{id}', [DistrictController::class, 'destroy'])->name('district-delete');

    }
);
