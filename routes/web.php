<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DemoCategorySelectionController;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\JuryController; 
use App\Http\Controllers\AboutUsSectionController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/save-demo-categories', [DemoCategorySelectionController::class, 'store']);
Route::get('/fetch-demo-categories', [DemoCategorySelectionController::class, 'fetch']);

Route::prefix('admin')->group(function () {
    Route::get('/signin', [RegisterController::class, 'showRegistrationForm'])->name('admin.signin');
    Route::post('/signin', [RegisterController::class, 'register'])->name('admin.register.submit');

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');

    Route::get('/users', [UserController::class, 'index'])->name('admin.user');
    Route::patch('/admin/user/{id}/toggle-status', [UserController::class, 'toggleStatus'])->name('admin.toggleUserStatus');

    Route::get('/payment', [DemoCategorySelectionController::class, 'fetch'])->name('admin.payment');

    Route::get('/contest', [ContestController::class, 'index'])->name('admin.contest');
    Route::post('/contest/store', [ContestController::class, 'store'])->name('admin.contest.store');

    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');

    Route::post('/upload', [SubmissionController::class, 'upload'])->name('file.upload');


    
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::get('/dashboard2', function () {
        return view('admin.dashboard2');
    })->name('admin.dashboard2');

    Route::get('/add_jury', [JuryController::class, 'create'])->name('admin.add_jury');
    Route::post('/add_jury', [JuryController::class, 'store'])->name('admin.jury.store');
    Route::get('/jury_list', [JuryController::class, 'index'])->name('admin.jury_list');

    Route::get('/jury/{id}/edit', [JuryController::class, 'edit'])->name('admin.jury.edit');
Route::put('/jury/{id}', [JuryController::class, 'update'])->name('admin.jury.update');
Route::delete('/jury/{id}', [JuryController::class, 'destroy'])->name('admin.jury.destroy');





Route::get('/manage_about', [AboutUsSectionController::class, 'manage'])->name('admin.manage_about');
Route::post('/about/store', [AboutUsSectionController::class, 'store'])->name('admin.about.store');
Route::get('/about_us', [AboutUsSectionController::class, 'index'])->name('about_us');
Route::get('/admin/about-us/{id}/edit', [AboutUsSectionController::class, 'edit'])->name('about_edit');
Route::put('/admin/about-us/{id}', [AboutUsSectionController::class, 'update'])->name('about-us.update');


    Route::get('/manage_category', function () {
        return view('admin.manage_category');
    })->name('admin.manage_category');

    Route::get('/submissons', function () {
        return view('admin.submissions');
    })->name('admin.submissions');
});

// File Upload Route for Submissions


Auth::routes();

Route::get('/about_us', [AboutUsSectionController::class, 'index'])->name('about_us');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
