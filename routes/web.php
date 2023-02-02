<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    // Routes Redirect
    Route::get('/dashboard',[HomeController::class,'redirectUser'])->name('dashboard');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','role:user'])->group(function () {
    //User Routes
    Route::get('/home', function () {
        return view('dashboard');
    })->name('user.dashboard');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','role:admin'])->group(function () {
    //Admin Routes
    Route::get('/admin/dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');
});
