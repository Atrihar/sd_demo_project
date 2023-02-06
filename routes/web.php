<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LayoutController;

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

Route::get('/service/{running}', [HomeController::class, 'services']);

Route::get('/business/{a}/{b}', [HomeController::class, 'business']);


// Employee related tasks

Route::get('/create-employee', [EmployeeController::class, 'create']);
Route::post('/store-employee', [EmployeeController::class, 'store']);
Route::get('/employees', [EmployeeController::class, 'all']);
Route::get('/edit-employee/{id}', [EmployeeController::class, 'edit']);
Route::post('/update-employee/{id}', [EmployeeController::class, 'update']);
Route::get('/delete-employee/{id}', [EmployeeController::class, 'delete']);

//admin
Route::get('admin/dashboard', [LayoutController::class, 'dashboard']);
Route::get('admin/form', [LayoutController::class, 'form']);
Route::get('admin/table', [LayoutController::class, 'table']);

// website 
Route::get('website/home',[LayoutController::class, 'home']);