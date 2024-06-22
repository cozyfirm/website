<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Rest\PagesController;
use App\Http\Controllers\Admin\Users\UsersController;
use App\Http\Controllers\PublicPart\HomeController;
use App\Http\Controllers\PublicPart\PropertiesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicPart\AuthController;
use App\Http\Controllers\PublicPart\ContactUsController;

// Init route
//Route::get('/', function () {
//    return view('welcome');
//});


/**
 *  Public routes; Data visible to all visitors
 */

Route::prefix('')->group(function () {
    Route::get('/',                    [HomeController::class, 'home'])->name('public-part.home');

    /**
     *  Single pages; Public data
     */
    Route::prefix('/')->group(function (){
        Route::get('/about-us',                        [HomeController::class, 'aboutUs'])->name('public-part.pages.about-us');
        Route::get('/privacy-policy',                  [HomeController::class, 'privacyPolicy'])->name('public-part.pages.privacy-policy');
        Route::get('/terms-and-conditions',            [HomeController::class, 'termsAndConditions'])->name('public-part.pages.terms-and-conditions');
        Route::get('/cookies',                         [HomeController::class, 'cookies'])->name('public-part.pages.cookies');
    });

    /**
     * Auth
     */
    Route::prefix('/auth')->group(function (){
        Route::get('/',                                [AuthController::class, 'auth'])->name('public-part.auth');
        Route::post('/authenticate',                   [AuthController::class, 'authenticate'])->name('public-part.auth.authenticate');

        Route::get('/logout',                          [AuthController::class, 'logout'])->name('public-part.logout');
    });

    Route::prefix('/contact-us')->group(function (){
        Route::get('/',                                [ContactUsController::class, 'index'])->name('public.part.contact-us');
    });
});

/**
 *  Admin routes
 */

Route::prefix('system')->middleware(['auth-middleware'])->group(function () {
    Route::get('/dashboard',                                   [DashboardController::class, 'dashboard'])->name('system.dashboard');

    /* Users routes */
    Route::prefix('users')->group(function () {
        Route::get('/',                          [UsersController::class, 'index'])->name('system.users.index');
        Route::get ('/create',                   [UsersController::class, 'create'])->name('system.users.create');
        Route::post('/save',                     [UsersController::class, 'save'])->name('system.users.save');
        Route::get ('/preview/{username}',       [UsersController::class, 'preview'])->name('system.users.preview');
        Route::get ('/edit/{username}',          [UsersController::class, 'edit'])->name('system.users.edit');
        Route::post('/update',                   [UsersController::class, 'update'])->name('system.users.update');
        Route::get ('/delete/{username}',        [UsersController::class, 'delete'])->name('system.users.delete');
    });

    /* Single pages */
    Route::prefix('single-pages')->group(function () {
        Route::get('/',                          [PagesController::class, 'index'])->name('system.single-pages.index');
        Route::get ('/create',                   [PagesController::class, 'create'])->name('system.single-pages.create');
        Route::post('/save',                     [PagesController::class, 'save'])->name('system.single-pages.save');
        Route::get ('/preview/{id}',             [PagesController::class, 'preview'])->name('system.single-pages.preview');
        Route::get ('/edit/{id}',                [PagesController::class, 'edit'])->name('system.single-pages.edit');
        Route::post('/update',                   [PagesController::class, 'update'])->name('system.single-pages.update');
        Route::get ('/delete/{id}',              [PagesController::class, 'delete'])->name('system.single-pages.delete');

        Route::post('/update-image',             [PagesController::class, 'updateImage'])->name('system.single-pages.update-image');
    });
});
