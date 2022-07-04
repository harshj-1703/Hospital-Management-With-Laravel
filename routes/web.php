<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorregistrationController;
use App\Http\Controllers\PatientregistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DoctorprofileController;
use App\Http\Controllers\PatientProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RazorpayController;
use App\http\Controllers\DoctordashboardController;
use App\http\Controllers\PatientdashboardController;
use App\http\Controllers\AdminController;
use App\http\Controllers\PatientSearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//status for user table 1=>admin , 2=>doctor , 3=>patient

Route::get('/',[HomeController::class,'doctorprofiles']);

Route::get('/login', function () {
    return view('login');
});
Route::get('/forgotpassword', function () {
    return view('forgotpassword');
});
Route::get('/patientregistration', function () {
    return view('patientregistration');
});
Route::get('/doctorregistration', function () {
    return view('doctorregistration');
});
Route::get('/logout',[LoginController::class,'logout']);
Route::get('/blogs',[HomeController::class,'goToBlog']);
Route::post('/blogs',[HomeController::class,'goToBlogPost']);
Route::get('/blog/detail/{id}',[HomeController::class,'goToBlogFull']);
Route::get('/doctor/profile/{id}',[HomeController::class,'godoctorprofile']);

Route::post('/patient/search',[PatientSearchController::class,'searchIndex']);
Route::post('/patient/searchAjax',[PatientSearchController::class,'searchAjax']);

Route::get('/patient/search',[PatientSearchController::class,'indexget']);

Route::get('/sendhtmlemail',[LoginController::class,'html_email']);
//----------------

//post without login middleware
Route::post('/login',[LoginController::class,'login']);
Route::post('/forgotpassword',[LoginController::class,'forgotpassword']);
Route::post('/doctorregistration',[DoctorregistrationController::class,'doctorregistration']);
Route::post('/patientregistration',[PatientregistrationController::class,'patientregistration']);

//After Doctor Login
Route::middleware(['DoctorGuard'])->group(function () {
    Route::get('/doctor/dashboard',[DoctordashboardController::class,'index']);
    //doctors
    Route::get('/doctor/profilesetting',[DoctorprofileController::class,'profilesetting']);
    Route::get('/doctor/socialmedia',[DoctorprofileController::class,'socialmedia']);
    Route::get('/doctor/profilesetting/{id}',[DoctorprofileController::class,'deleteclinicimage']);
    Route::get('/doctor/changepassword',[DoctorprofileController::class,'changepassword']);
    Route::get('/doctor/timeschedules',[DoctorprofileController::class,'doctorschedules']);
    Route::get('/doctor/dashboard/scheduleconfirm/{id}',[DoctordashboardController::class,'confirmschedule']);
    Route::get('/doctor/dashboard/schedulecancled/{id}',[DoctordashboardController::class,'cancleschedule']);
    Route::get('/doctor/dashboard/schedulereset/{id}',[DoctordashboardController::class,'resetschedule']);
    Route::get('/doctor/mypatients',[DoctordashboardController::class,'mypatients']);
    Route::get('/doctor/appointments',[DoctordashboardController::class,'appointments']);
    Route::get('/doctor/lastappointments',[DoctordashboardController::class,'lastappointments']);
    Route::get('/doctor/invoices',[DoctordashboardController::class,'allinvoices']);
    Route::get('/doctor/invoice/{id}', [DoctordashboardController::class, 'invoicebyid']);
    Route::get('/doctor/reviews', [DoctordashboardController::class, 'reviews']);
    Route::get('/doctor/appointment/missed/{id}',[DoctordashboardController::class,'missed']);
    Route::get('/doctor/appointment/notmissed/{id}',[DoctordashboardController::class,'notmissed']);
    Route::get('/deleteblogdr/{id}',[HomeController::class,'deleteBlog']);
    Route::get('/updateblogdr/{id}',[HomeController::class,'updateBlog']);
    Route::post('/updateblogdr/{id}',[HomeController::class,'updateBlogPost']);

    //days schedule
    Route::get('/doctor/timeschedules/delete/{id}',[DoctorprofileController::class,'doctorschedulesdelete']);

    //Post methods
    Route::post('/doctor/profilesetting',[DoctorprofileController::class,'postprofilesetting']);
    Route::post('/doctor/changepassword',[DoctorprofileController::class,'changepasswordpost']);
    Route::post('/doctor/socialmedia',[DoctorprofileController::class,'socialmediapost']);
    Route::post('/doctor/doctorreply',[DoctordashboardController::class,'mainreply']);

    //edit and delete schedules of days
    Route::post('/doctor/timeschedules/editsunday',[DoctorprofileController::class,'doctorscheduleseditsunday']);
    Route::post('/doctor/timeschedules/addsunday',[DoctorprofileController::class,'doctorschedulesaddsunday']);
    Route::post('/doctor/timeschedules/editmonday',[DoctorprofileController::class,'doctorscheduleseditmonday']);
    Route::post('/doctor/timeschedules/addmonday',[DoctorprofileController::class,'doctorschedulesaddmonday']);
    Route::post('/doctor/timeschedules/edittuesday',[DoctorprofileController::class,'doctorschedulesedittuesday']);
    Route::post('/doctor/timeschedules/addtuesday',[DoctorprofileController::class,'doctorschedulesaddtuesday']);
    Route::post('/doctor/timeschedules/editwednesday',[DoctorprofileController::class,'doctorscheduleseditwednesday']);
    Route::post('/doctor/timeschedules/addwednesday',[DoctorprofileController::class,'doctorschedulesaddwednesday']);
    Route::post('/doctor/timeschedules/editthursday',[DoctorprofileController::class,'doctorscheduleseditthursday']);
    Route::post('/doctor/timeschedules/addthursday',[DoctorprofileController::class,'doctorschedulesaddthursday']);
    Route::post('/doctor/timeschedules/editfriday',[DoctorprofileController::class,'doctorscheduleseditfriday']);
    Route::post('/doctor/timeschedules/addfriday',[DoctorprofileController::class,'doctorschedulesaddfriday']);
    Route::post('/doctor/timeschedules/editsaturday',[DoctorprofileController::class,'doctorscheduleseditsaturday']);
    Route::post('/doctor/timeschedules/addsaturday',[DoctorprofileController::class,'doctorschedulesaddsaturday']);
});

Route::middleware(['Patientguard'])->group(function () {
    //patients
    Route::get('/patient/dashboard',[PatientdashboardController::class,'godashboard']);
    Route::get('/patient/profilesetting',[PatientProfileController::class,'goprofilesetting']);
    Route::get('/patient/changepassword',[PatientProfileController::class,'gochangepassword']);
    Route::post('/patient/profilesetting',[PatientProfileController::class,'postprofilesetting']);
    Route::post('/patient/changepassword',[PatientProfileController::class,'postchangepassword']);
    Route::get('/doctor/booking/{id}',[BookingController::class,'gobooking']);
    Route::get('/fixschedule/{id}',[BookingController::class,'fixschedule']);
    Route::get('/checkout',[BookingController::class,'checkoutback']);
    Route::post('/checkout',[BookingController::class,'checkout']);
    Route::post('/buy', [RazorpayController::class, 'paymentrazorpay'])->name('paymentrazorpay');
    Route::get('/buy', [RazorpayController::class, 'index']);
    Route::get('/patient/bookingsuccess', [RazorpayController::class, 'bookingsuccess']);
    Route::get('/patient/invoice', [RazorpayController::class, 'invoice']);
    Route::get('/patient/invoice/{id}', [PatientdashboardController::class, 'invoicebyid']);
    Route::get('/patient/favourite/{id}', [HomeController::class, 'favourite']);
    Route::get('/patient/favourite', [PatientProfileController::class, 'favourite']);
    // Route::get('/doctor/profile/{id}',[HomeController::class,'godoctorprofile']);
    Route::post('/doctor/profile',[HomeController::class,'reviewpost']);
    Route::get('/doctorprofileyes/{id}',[HomeController::class,'recomendyes']);
    Route::get('/doctorprofileno/{id}',[HomeController::class,'recomendno']);
    Route::post('/doctor/mainreply',[HomeController::class,'mainreply']);
});

//After Admin Login
Route::middleware(['AdminGuard'])->group(function () {
//Admin get methods
Route::get('/admindashboard',[AdminController::class,'index']);
Route::get('/deleteblog/{id}',[HomeController::class,'deleteBlog']);
Route::get('/updateblog/{id}',[HomeController::class,'updateBlog']);
Route::post('/updateblog/{id}',[HomeController::class,'updateBlogPost']);
Route::get('/admin/appointmentlist',[AdminController::class,'appointments']);
Route::get('/admin/doctorlist',[AdminController::class,'doctors']);
Route::get('/admin/patientlist',[AdminController::class,'patients']);
Route::get('/admin/reviews',[AdminController::class,'reviews']);
Route::get('/admin/transections',[AdminController::class,'transections']);
Route::get('/admin/profile',[AdminController::class,'profile']);
Route::get('/admin/delete/transection/{id}',[AdminController::class,'deletetransections']);
Route::get('/doctor-a/profile/{id}',[HomeController::class,'godoctorprofile1']);
Route::get('/admin/doapp/{id}',[AdminController::class,'doapp']);
Route::get('/admin/doctorstatus/{id}',[AdminController::class,'drstatus']);
Route::get('/admin/deletereview/{id}',[AdminController::class,'deletereview']);
Route::get('/admin/invoice/{id}', [AdminController::class, 'invoicebyid']);
Route::get('/admin/clearnotifications', [AdminController::class, 'clearnotifications']);

//Admin post methods
Route::post('/admin/profile/update',[AdminController::class,'profileupdate']);
Route::post('/admin/profile/password/update',[AdminController::class,'passwordupdate']);
Route::post('/admin/adddoctor',[AdminController::class,'adddoctor']);
});