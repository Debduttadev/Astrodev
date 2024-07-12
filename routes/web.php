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
use App\Http\Controllers\AlttagController;
use App\Http\Controllers\SeodetailsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HoroscopesController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;
// frontend controller
use App\Http\Controllers\HomeController;

// Route::get('/phpinfo', function () {
//     return phpinfo();
// });
// Route::get('/datepicker', function () {
//     return view("date");
// });
//frontend roots
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/aboutus', [AboutContactController::class, 'frontabout']);


Route::get('/services', [ServiceController::class, 'servicelists']);
Route::get('/service/{nameurl}', [ServiceController::class, 'servicedetails'])->name('service');

Route::get('/blogs', [BlogController::class, 'bloglist'])->name('blogs');
Route::get('/blogs/{page}', [BlogController::class, 'bloglistpagination'])->name('blogs');
Route::get('/blog/{nameurl}', [BlogController::class, 'blog'])->name('blog');
Route::get('/searchblog', [BlogController::class, 'searchblog']);


Route::get('/chambers', [ChamberController::class, 'chamber'])->name('chambers');


Route::get('/appointment', [AppointmentController::class, 'appointment']);
Route::post('addappointment', [AppointmentController::class, 'addappointment']);
Route::post('paymentlinkcreate', [InvoiceController::class, 'paymentlinkcreate']);


Route::get('contactus', [ContactusController::class, 'contactus']);
Route::post('addcontactus', [ContactusController::class, 'addcontactus']);


Route::get('/dailyhoroscope', [HomeController::class, 'shipping'])->name('dailyhoroscope');

//pages for
Route::get('/terms_conditions', [HomeController::class, 'terms_conditions'])->name('terms-conditions');

Route::get('/privacy_policy', [HomeController::class, 'privacy_policy'])->name('privacy_policy');

Route::get('/refund_policy', [HomeController::class, 'refund_policy'])->name('refund_policy');

Route::get('/shipping_policy', [HomeController::class, 'shipping'])->name('shipping');

// admin roots
Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //  profile edit
    // usertype = 0 , admin
    Route::middleware(['admin'])->group(function () {

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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

        //manage blog
        Route::get('/manageblog', [BlogController::class, 'manageblog']);
        Route::post('addblog', [BlogController::class, 'addblog']);
        Route::get('/deleteblog', [BlogController::class, 'deleteblog']);
        Route::get('editblog/{id}', [BlogController::class, 'editblog']);
        Route::post('updateblog', [BlogController::class, 'updateblog']);

        //manage about us and contact us details
        Route::get('/magageaboutcontactus', [AboutContactController::class, 'magageaboutcontactus']);
        Route::post('updateaboutus', [AboutContactController::class, 'updateaboutus']);
        Route::post('updatecontactus', [AboutContactController::class, 'updatecontactus']);

        //manage contact us page form details
        Route::get('/managecontactus', [ContactusController::class, 'managecontactus']);
        Route::get('/deletecontactdetails', [ContactusController::class, 'deletecontactdetails']);

        // seo details and alt tag for every image
        Route::get('/alttag', [AlttagController::class, 'alttag']);
        // add edit alt tag for every images of the website mainly service ,blog ,banner video thumbnail, about us page
        Route::post('updatealttag', [AlttagController::class, 'updatealttag']);
        //seo detail page.
        Route::get('/seodetails', [SeodetailsController::class, 'seodetails']);
        Route::get('editseo/{pagetype}/{nameurl}', [SeodetailsController::class, 'editseo']);
        Route::post('updateseo', [SeodetailsController::class, 'updateseo']);

        //appoinment 
        Route::get('/adminappointment', [AppointmentController::class, 'adminappointment']);
        Route::get('/appoinmentdetails/{id}', [AppointmentController::class, 'adminappoinmentdetails']);
        // Route::get('/paymentlinkcreateform/{id}', [AppointmentController::class, 'paymentlinkcreateform']);


        Route::get('/adminclient', [AdminController::class, 'adminclient']);

        //horoscope
        Route::get('/adminhoroscope', [HoroscopesController::class, 'adminshow']);
        Route::post('updatehoroscope', [HoroscopesController::class, 'updatehoroscope']);
    });

    // usertype = 1 , subadmin
    Route::middleware(['subadmin'])->group(function () {

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

        //manage blog
        Route::get('/manageblog', [BlogController::class, 'manageblog']);
        Route::post('addblog', [BlogController::class, 'addblog']);
        Route::get('/deleteblog', [BlogController::class, 'deleteblog']);
        Route::get('editblog/{id}', [BlogController::class, 'editblog']);
        Route::post('updateblog', [BlogController::class, 'updateblog']);

        //manage about us and contact us details
        Route::get('/magageaboutcontactus', [AboutContactController::class, 'magageaboutcontactus']);
        Route::post('updateaboutus', [AboutContactController::class, 'updateaboutus']);
        Route::post('updatecontactus', [AboutContactController::class, 'updatecontactus']);

        //manage contact us page form details
        Route::get('/managecontactus', [ContactusController::class, 'managecontactus']);
        Route::get('/deletecontactdetails', [ContactusController::class, 'deletecontactdetails']);

        // seo details and alt tag for every image
        Route::get('/alttag', [AlttagController::class, 'alttag']);
        // add edit alt tag for every images of the website mainly service ,blog ,banner video thumbnail, about us page
        Route::post('updatealttag', [AlttagController::class, 'updatealttag']);
        //seo detail page.
        Route::get('/seodetails', [SeodetailsController::class, 'seodetails']);
        Route::get('editseo/{pagetype}/{nameurl}', [SeodetailsController::class, 'editseo']);
        Route::post('updateseo', [SeodetailsController::class, 'updateseo']);

        //appoinment 
        Route::get('/adminappointment', [AppointmentController::class, 'adminappointment']);
        Route::get('/appoinmentdetails/{id}', [AppointmentController::class, 'adminappoinmentdetails']);
        // Route::get('/paymentlinkcreateform/{id}', [AppointmentController::class, 'paymentlinkcreateform']);


        Route::get('/adminclient', [AdminController::class, 'adminclient']);

        //horoscope
        Route::get('/adminhoroscope', [HoroscopesController::class, 'adminshow']);
        Route::post('updatehoroscope', [HoroscopesController::class, 'updatehoroscope']);
    });

    // usertype = 2 , seo
    Route::middleware(['seo'])->group(function () {

        // seo details and alt tag for every image
        Route::get('/alttag', [AlttagController::class, 'alttag']);
        // add edit alt tag for every images of the website mainly service ,blog ,banner video thumbnail, about us page
        Route::post('updatealttag', [AlttagController::class, 'updatealttag']);
        //seo detail page.
        Route::get('/seodetails', [SeodetailsController::class, 'seodetails']);
        Route::get('editseo/{pagetype}/{nameurl}', [SeodetailsController::class, 'editseo']);
        Route::post('updateseo', [SeodetailsController::class, 'updateseo']);

        //Manage Social Links
        Route::get('/adminsocial', [SocialController::class, 'adminsocial']);
        Route::post('addsociallink', [SocialController::class, 'addsociallink']);
        Route::get('/visibilitylink', [SocialController::class, 'visibilitylink']);
        Route::get('/addeditsocials', [SocialController::class, 'addeditsocials']);
    });

    // usertype = 4 , appointment
    Route::middleware(['appointment'])->group(function () {
        //appoinment 
        Route::get('/adminappointment', [AppointmentController::class, 'adminappointment']);
        Route::get('/appoinmentdetails/{id}', [AppointmentController::class, 'adminappoinmentdetails']);
        // Route::get('/paymentlinkcreateform/{id}', [AppointmentController::class, 'paymentlinkcreateform']);
        Route::get('/adminclient', [AdminController::class, 'adminclient']);
    });

    // usertype = 5 , blog
    Route::middleware(['blog'])->group(function () {

        //manage blog
        Route::get('/manageblog', [BlogController::class, 'manageblog']);
        Route::post('addblog', [BlogController::class, 'addblog']);
        Route::get('/deleteblog', [BlogController::class, 'deleteblog']);
        Route::get('editblog/{id}', [BlogController::class, 'editblog']);
        Route::post('updateblog', [BlogController::class, 'updateblog']);

        //manage about us and contact us details
        Route::get('/magageaboutcontactus', [AboutContactController::class, 'magageaboutcontactus']);
        Route::post('updateaboutus', [AboutContactController::class, 'updateaboutus']);
        Route::post('updatecontactus', [AboutContactController::class, 'updatecontactus']);

        //manage contact us page form details
        Route::get('/managecontactus', [ContactusController::class, 'managecontactus']);
        Route::get('/deletecontactdetails', [ContactusController::class, 'deletecontactdetails']);

        //Admin service management
        Route::get('/adminservice', [ServiceController::class, 'adminservice']);
        Route::post('addservice', [ServiceController::class, 'addservice']);
        Route::get('editservice/{id}', [ServiceController::class, 'editservice']);
        Route::get('/deleteservice', [ServiceController::class, 'deleteservice']);
        Route::post('updateservice', [ServiceController::class, 'updateservice']);
    });
});

require __DIR__ . '/auth.php';
