<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Other\API\APIController;
use App\Http\Controllers\Admin\Rest\Blog\BlogCategoriesController;
use App\Http\Controllers\Admin\Rest\Blog\BlogController;
use App\Http\Controllers\Admin\Rest\Blog\BlogImagesController;
use App\Http\Controllers\Admin\Rest\Blog\BlogTextController;
use App\Http\Controllers\Admin\Rest\PagesController;
use App\Http\Controllers\Admin\Rest\ProjectsController;
use App\Http\Controllers\Admin\Users\UsersController;
use App\Http\Controllers\PublicPart\HomeController;
use App\Http\Controllers\PublicPart\Blog\BlogController as PublicBlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicPart\AuthController;
use App\Http\Controllers\PublicPart\ContactUsController;

/**
 *  Public routes; Data visible to all visitors
 */

Route::prefix('')->middleware(['public-middleware'])->group(function () {
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
        Route::post('/send-us-message',                [ContactUsController::class, 'sendUsMessage'])->name('public.part.send-us-message');
    });

    /**
     *  Blogging system
     */
    Route::prefix('/blog')->group(function (){
        Route::get('/',                                [PublicBlogController::class, 'index'])->name('public-part.blog');
        Route::get('/category/{id}',                   [PublicBlogController::class, 'indexWithCategories'])->name('public-part.blog.with-categories');
        Route::get('/preview/{id}',                    [PublicBlogController::class, 'preview'])->name('public-part.blog.preview');

        Route::get('/tags/{tag}',                      [PublicBlogController::class, 'tags'])->name('public-part.blog.tag');
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

    Route::prefix('projects')->group(function () {
        Route::get('/',                          [ProjectsController::class, 'index'])->name('system.projects.index');
        Route::get ('/create',                   [ProjectsController::class, 'create'])->name('system.projects.create');
        Route::post('/save',                     [ProjectsController::class, 'save'])->name('system.projects.save');
        Route::get ('/preview/{id}',             [ProjectsController::class, 'preview'])->name('system.projects.preview');
        Route::get ('/edit/{id}',                [ProjectsController::class, 'edit'])->name('system.projects.edit');
        Route::post('/update',                   [ProjectsController::class, 'update'])->name('system.projects.update');
        Route::get ('/delete/{id}',              [ProjectsController::class, 'delete'])->name('system.projects.delete');
    });

    /**
     *  Website Blog part
     */

    Route::prefix('blog')->group(function () {
        Route::get ('/',                                         [BlogController::class, 'index'])->name('system.blog');
        Route::get ('/create-post',                              [BlogController::class, 'createPost'])->name('system.blog.create-post');
        Route::post('/save-blog-image',                          [BlogController::class, 'saveBlogImage'])->name('system.blog.save-blog-image');
        Route::post('/save-post',                                [BlogController::class, 'savePost'])->name('system.blog.save-post');
        Route::get ('/preview-post/{id}',                        [BlogController::class, 'previewPost'])->name('system.blog.preview-post');
        Route::get ('/edit-post/{id}',                           [BlogController::class, 'editPost'])->name('system.blog.edit-post');
        Route::post('/update-post',                              [BlogController::class, 'updatePost'])->name('system.blog.update-post');
        Route::get ('/delete-post/{id}',                         [BlogController::class, 'deletePost'])->name('system.blog.delete-post');

        /**
         *  Add blog text content via magic editor
         */
        Route::prefix('text-content')->group(function () {
            Route::get ('/create/{post_id}',                      [BlogTextController::class, 'create'])->name('system.blog.text-content.create');
            Route::post('/save',                                  [BlogTextController::class, 'save'])->name('system.blog.text-content.save');
            Route::get ('/edit/{id}',                             [BlogTextController::class, 'edit'])->name('system.blog.text-content.edit');
            Route::post('/update',                                [BlogTextController::class, 'update'])->name('system.blog.text-content.update');
            Route::get ('/delete/{id}',                           [BlogTextController::class, 'delete'])->name('system.blog.text-content.delete');
        });

        /**
         *  Add double images as content of post
         */
        Route::prefix('double-images')->group(function () {
            Route::get ('/create/{post_id}',                      [BlogImagesController::class, 'create'])->name('system.blog.double-images.create');
            Route::post('/save',                                  [BlogImagesController::class, 'save'])->name('system.blog.double-images.save');
            Route::post('/save-image',                            [BlogImagesController::class, 'saveImage'])->name('system.blog.double-images.save-image');
            Route::get ('/edit/{id}',                             [BlogImagesController::class, 'edit'])->name('system.blog.double-images.edit');
            Route::post('/update',                                [BlogImagesController::class, 'update'])->name('system.blog.double-images.update');
            Route::get ('/delete/{id}',                           [BlogImagesController::class, 'delete'])->name('system.blog.double-images.delete');
        });

        /*
         * Blog categories -- cannot use anymore keywords, since it requires an image for category
         * According to that, new option with image upload has to be created
         */

        Route::prefix('blog-categories')->group(function () {
            Route::get ('/',                               [BlogCategoriesController::class, 'index'])->name('system.blog.categories');
            Route::post('/save-image',                     [BlogCategoriesController::class, 'saveImage'])->name('system.blog.categories.save-image');
            Route::get ('/create',                         [BlogCategoriesController::class, 'create'])->name('system.blog.categories.create');
            Route::post('/save',                           [BlogCategoriesController::class, 'save'])->name('system.blog.categories.save');
            Route::get ('/edit/{id}',                      [BlogCategoriesController::class, 'edit'])->name('system.blog.categories.edit');
            Route::post('/update',                         [BlogCategoriesController::class, 'update'])->name('system.blog.categories.update');
            Route::get ('/delete/{id}',                    [BlogCategoriesController::class, 'delete'])->name('system.blog.categories.delete');
        });
    });

    /**
     *  API System
     */
    Route::prefix('api-system')->group(function () {
        Route::get('/',                          [APIController::class, 'index'])->name('system.api-system.api.index');
        Route::get ('/create',                   [APIController::class, 'create'])->name('system.api-system.api.create');
        Route::post('/save',                     [APIController::class, 'save'])->name('system.api-system.api.save');
        Route::get ('/preview/{id}',             [APIController::class, 'preview'])->name('system.api-system.api.preview');
        Route::get ('/edit/{id}',                [APIController::class, 'edit'])->name('system.api-system.api.edit');
        Route::post('/update',                   [APIController::class, 'update'])->name('system.api-system.api.update');
        Route::get ('/delete/{id}',              [APIController::class, 'delete'])->name('system.api-system.api.delete');
    });
});
