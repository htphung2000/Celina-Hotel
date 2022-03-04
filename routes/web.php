<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BookingController;

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


/*==================  GUEST ==================*/

Route::get('/', function () {
    return view('home');
});
Route::get('/intro', function() {
    return view('introduce');
});
Route::get('/payment', function() {
    return view('payment');
});
Route::get('/contact', function() {
    return view('contact');
});
Route::get('/help', function() {
    return view('help');
});
Route::get('/booking', [BookingController::class, 'index']);
Route::post('/booking', [BookingController::class, 'search']);
Route::get('/booking/search', [BookingController::class, 'show']);
Route::post('/booking/search', [BookingController::class, 'add_into_cart']);


/*================== CUSTOMER ==================*/

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [CustomerController::class, 'register']);
Route::post('/login', [CustomerController::class, 'login']);
Route::get('/logout', [CustomerController::class, 'logout']);
Route::get('/personal', function() {
    return view('personal_info');
});
Route::get('/personal/update', [CustomerController::class, 'update_get']);
Route::post('/personal/update', [CustomerController::class, 'update_post']);
Route::get('/history', [CustomerController::class, 'history']);

Route::get('/cart', [BookingController::class, 'show_cart']);
Route::get('/cart/{id}/delete', [BookingController::class, 'del']);
Route::post('/cart', [BookingController::class, 'booking']);
Route::get('/bill', [BookingController::class, 'create_bill']);
Route::get('/bill/{id}', [BookingController::class, 'show_bill_detail']);


/*==================  ADMIN ==================*/

Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin', [AdminController::class, 'login']);
Route::get('/admin/logout', [AdminController::class, 'logout']);
Route::get('/admin/home', [AdminController::class, 'home']);
Route::get('/admin/{id}/add', [AdminController::class, 'add']);
Route::get('/admin/{id}/delete', [AdminController::class, 'del']);

Route::get('/admin/department', [DepartmentController::class, 'index']);
Route::get('/admin/department/{id}/update', [DepartmentController::class, 'update_get']);
Route::post('/admin/department/{id}/update', [DepartmentController::class, 'update_post']);
Route::get('/admin/department/add', [DepartmentController::class, 'add']);
Route::post('/admin/department/add', [DepartmentController::class, 'store']);
Route::get('/admin/department/{id}/delete', [DepartmentController::class, 'del']);

Route::get('/admin/room-type', [TypeController::class, 'index']);
Route::get('/room-type/add', [TypeController::class, 'add']);
Route::post('/room-type/add', [TypeController::class, 'store']);
Route::get('/admin/room-type/{id}/update', [TypeController::class, 'update_get']);
Route::post('/admin/room-type/{id}/update', [TypeController::class, 'update_post']);
Route::get('/admin/room-type/{id}/delete', [TypeController::class, 'del']);

Route::get('/admin/room', [RoomController::class, 'index']);
Route::get('/admin/room/{id}/update', [RoomController::class, 'update_get']);
Route::post('/admin/room/{id}/update', [RoomController::class, 'update_post']);
Route::get('/admin/room/add', [RoomController::class, 'add']);
Route::post('/admin/room/add', [RoomController::class, 'store']);
Route::get('/admin/room/{id}/delete', [RoomController::class, 'del']);

Route::get('/admin/employee', [EmployeeController::class, 'index']);
Route::get('/admin/employee/{id}', [EmployeeController::class, 'info']);
Route::get('/admin/employee/{id}/update', [EmployeeController::class, 'update_get']);
Route::post('/admin/employee/{id}/update', [EmployeeController::class, 'update_post']);
Route::get('/employee/add', [EmployeeController::class, 'add']);
Route::post('/employee/add', [EmployeeController::class, 'store']);
Route::get('/admin/employee/{id}/delete', [EmployeeController::class, 'del']);

Route::get('/admin/position', [SalaryController::class, 'index']);
Route::get('/position/add', [SalaryController::class, 'add']);
Route::post('/position/add', [SalaryController::class, 'store']);
Route::get('/admin/position/{id}/update', [SalaryController::class, 'update_get']);
Route::post('/admin/position/{id}/update', [SalaryController::class, 'update_post']);
Route::get('/admin/position/{id}/delete', [SalaryController::class, 'del']);

Route::get('/admin/customer', [CustomerController::class, 'index']);
Route::get('/admin/customer/{id}', [CustomerController::class, 'info']);
Route::get('/admin/customer/{id}/delete', [CustomerController::class, 'del']);

Route::get('/admin/bill', [BookingController::class, 'bill']);
Route::get('/admin/bill/{id}', [BookingController::class, 'detail']);
Route::post('/admin/bill/check-in', [BookingController::class, 'check_in']);
Route::post('/admin/bill/check-out', [BookingController::class, 'check_out']);

Route::get('/admin/statistics', [BookingController::class, 'statistics']);