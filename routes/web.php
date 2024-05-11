<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ChamberController;
use App\Http\Controllers\BannerVideoController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\AboutContactController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //  profile edit
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Sidenavbar

    //Admin user management
    Route::get('/adminuser', [AdminController::class, 'adminuser']);
    Route::post('registeradmin', [RegisteredUserController::class, 'store']);
    Route::get('/deleteadmin', [AdminController::class, 'deleteadmin']);
    Route::get('editadmin/{id}', [AdminController::class, 'editadmin']);
    Route::post('updateadminuser', [AdminController::class, 'updateadminuser']);

    //Admin service management
    Route::get('/adminservice', [ServiceController::class, 'adminservice']);
    Route::post('addservice', [ServiceController::class, 'addservice']);
    Route::get('editservice/{id}', [ServiceController::class, 'editservice']);
    Route::get('/deleteservice', [ServiceController::class, 'deleteservice']);
    Route::post('updateservice', [ServiceController::class, 'updateservice']);

    //Admin chamber management
    Route::get('/adminchember', [ChamberController::class, 'adminchamber']);
    Route::post('addchamber', [ChamberController::class, 'addchamber']);
    Route::get('/deletechamber', [ChamberController::class, 'deletechamber']);
    Route::get('editchamber/{id}', [ChamberController::class, 'editchamber']);
    Route::post('updatechamber', [ChamberController::class, 'updatechamber']);

    // Manage banner and videos
    Route::get('/managebannervideo', [BannerVideoController::class, 'managebannervideo']);
    Route::post('addbannervideo', [BannerVideoController::class, 'addbannervideo']);
    Route::get('/deletebannervideo', [BannerVideoController::class, 'deletebannervideo']);
    Route::get('editbannervideo/{id}', [BannerVideoController::class, 'editbannervideo']);
    Route::post('updatebannervideo', [BannerVideoController::class, 'updatebannervideo']);

    //Manage Social Links
    Route::get('/adminsocial', [SocialController::class, 'adminsocial']);
    Route::post('addsociallink', [SocialController::class, 'addsociallink']);
    Route::get('/visibilitylink', [SocialController::class, 'visibilitylink']);
    Route::get('/addeditsocials', [SocialController::class, 'addeditsocials']);






    Route::get('/adminappointment', [AppointmentController::class, 'adminappointment']);
    Route::get('/adminclient', [AdminController::class, 'dashboard']);
    Route::get('/seodetails', [AdminController::class, 'dashboard']);

    Route::get('/manageblog', [AdminController::class, 'dashboard']);
    Route::get('/magageaboutcontactus', [AboutContactController::class, 'magageaboutcontactus']);
    Route::get('/managecontactus', [ContactusController::class, 'managecontactus']);
});

require __DIR__ . '/auth.php';
