<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\villasController;
use App\Http\Controllers\Authentication\AuthenticationController;
use App\Http\Controllers\travelista\BookingController;
use App\Http\Controllers\travelista\DashboardController;
use App\Http\Controllers\travelista\SearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('travelista-layout.master');
// });

//::::::::::::::::::::::::::: site pages Routes ::::::::::::::::::::::::::::::::::://
Route::get('/', [DashboardController::class, 'index']);
Route::get('/about-us', [DashboardController::class, 'AboutUs']);
Route::get('/contact-us', [DashboardController::class, 'ContactUs']);
Route::get('/insurance', [DashboardController::class, 'insurance']);
Route::get('/blogs', [DashboardController::class, 'blogs']);
Route::get('/blog-Details', [DashboardController::class, 'BlogDetails']);
Route::get('/packages', [DashboardController::class, 'Packages']);
Route::get('/hotels', [DashboardController::class, 'Hotels']);
Route::get('/villas', [DashboardController::class, 'villaPage']);
Route::get('/villa-details', [DashboardController::class, 'villaDetails'])->name('villa.details');
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::://

Route::get('/autocomplete', [SearchController::class, 'autocomplete']);
Route::post('/search', [SearchController::class, 'search']);

//:::::::::::::::::::::: Authentication Routes ::::::::::::::::::::::::::::::::::::::::://
Route::get('/login', [AuthenticationController::class, 'LoginPage']);
Route::get('/register', [AuthenticationController::class, 'RegisterPage']);
Route::post('/register-process', [AuthenticationController::class, 'registerProcess']);
Route::post('/login-process', [AuthenticationController::class, 'loginProcess']);
Route::get('/logout', [AuthenticationController::class, 'logout']);

Route::group(['middleware' => 'admin'], function () {
    //:::::::::::::::::::::::: Admin Routes :::::::::::::::::::::::::::://
    Route::get('/admin-dashboard', [AdminDashboardController::class, 'index']);
    Route::get('/admin-dashboard/add-villa', [villasController::class, 'AddVillaPage']);
    Route::post('/store-villa', [villasController::class, 'storevilla']);
    Route::get('/admin-dashboard/all-villas', [villasController::class, 'Allvillas']);
});
//::::::::::::::::::::: Booking villa :::::::::::::::::::::::::::::::://
Route::post('/book-villa', [BookingController::class, 'Bookvilla']);

//::::::::::::::: testing datepicker ::::::::::::::::::::::://
Route::get('/test',[DashboardController::class,'test']);