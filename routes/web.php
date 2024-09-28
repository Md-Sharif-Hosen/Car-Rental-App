<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Middleware\TokenVerificationMiddleware;
use App\Models\Rental;
use Doctrine\Common\Lexer\Token;
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
//     return view('welcome');
// });

//api Route login/registration
Route::post('/customer_registration',[CustomerController::class,'CustomerRegistration'])->name('customer_registration');
Route::post('/customer_login',[CustomerController::class,'CustomerLogin'])->name('customer_login');
Route::get('/customer_logout',[CustomerController::class,'CustomerLogout'])->name('customer_logout');


Route::resource('cars', CarController::class)->middleware(['token','isadmin']);

// Route::post('/product_delete',[ProductController::class,'ProductDelete'])->middleware(TokenverificationMiddleware::class);
// Route::post('/product_by_id',[ProductController:: class,'ProductByID'])->middleware(TokenverificationMiddleware::class);
// Route::post('/product_update',[ProductController::class,'ProductUpdate'])->middleware(TokenverificationMiddleware::class);
// Route::get('/product_list',[ProductController::class,'ProductList'])->middleware(TokenverificationMiddleware::class);


//pages route
Route::get("/",[PageController::class,"Index"])->name('index');

//auth
Route::get('/userLogin',[CustomerController::class,'UserLogin'])->name('login');
Route::get('/userRegistration',[CustomerController::class,'UserRegistration'])->name('userRegistration');

//dahboard
Route::get('/dashboard',[CustomerController::class,'Dashboard'])->name('dashboard')->middleware(['token','isadmin']);
Route::get('/customersPage',[CustomerController::class,'Customers'])->name('customersPage');
Route::get('/rentalPage',[RentalController::class,'Rental'])->name('rentalPage');

//Fortend
