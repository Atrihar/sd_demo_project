<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
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

Route::get('/', [HomeController::class, 'home']);

Route::get('/about-us', [HomeController::class, 'about']);

Route::get('/service/{running}', [HomeController::class, 'service']);

Route::get('business/{p}/{q}', [HomeController::class, 'business']);

// Employee related tasks
Route::get('/create-employee', [EmployeeController::class, 'create']);
Route::post('/store-employee', [EmployeeController::class, 'store']);

Route::get('/employees', [EmployeeController::class, 'all']);

Route::get('/edit-employee/{id}', [EmployeeController::class, 'edit']);
Route::post('/update-employee/{id}', [EmployeeController::class, 'update']);
Route::get('/delete-employee/{id}', [EmployeeController::class, 'delete']);

Route::get('admin/dashboard', [LayoutController::class, 'dashboard']);
Route::get('admin/form', [LayoutController::class, 'form']);
Route::get('admin/table', [LayoutController::class, 'table']);

Route::get('admin/register',[AuthController::class, 'register']);
Route::post('admin/user-register',[AuthController::class, 'userRegister']);
Route::get('admin/login',[AuthController::class, 'login']);
Route::post('admin/user-login',[AuthController::class, 'userLogin']);

Route::get('admin/users',[UserController::class, 'allUsers']);

Route::middleware(['CheckIfLogin'])->group(function () {
    Route::get('admin/users',[UserController::class, 'allUsers']);
    Route::get('admin/approve/{userId}', [UserController::class, 'approve']);
    
    Route::middleware(['CheckIfTeacher'])->group(function () {
        Route::get('admin/give_marks',function(){
            echo 'This is a page for teacher';
        });
    });

    Route::middleware(['CheckIfStudent'])->group(function () {
        Route::get('admin/my_marks',function(){
            echo 'This is a page for student';
        });
    });

    Route::get('signout',[AuthController::class, 'signout']);

});


// creating routes for pdf
Route::get('create-employee/view-pdf', [EmployeeController::class, 'viewPDF']);
Route::get('create-employee/dwonload-pdf', [EmployeeController::class, 'dwonloadPDF']);

Route::get('location',[LocationController::class, 'location']);

