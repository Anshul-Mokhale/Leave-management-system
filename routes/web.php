<?php

use App\Http\Controllers\UserLeaveController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin'); // Replace with your dashboard view
})->middleware('auth')->name('admin');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('auth');
Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard')->middleware('auth');

Route::get('/sign-up', function () {
    return view('register');
})->name('register.form');

Route::get('/sign-in', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('submit.login');

Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// admin 

Route::get('/admin/user', [AdminUserController::class, 'index'])->name('admin.users');

// Fetch users data for DataTable
Route::get('/admin/user/data', [AdminUserController::class, 'getUsersData'])->name('admin.users.data');


// users leaves
Route::get('/user/leaves', [UserLeaveController::class, 'Leaves'])->name('user.leave')->middleware('auth');
Route::get('/user/leaves/new-request', function () {
    return view('newleave');
})->middleware('auth');
Route::post('/leaves/submit', [UserLeaveController::class, 'submitLeave'])->name('leaves.submit');