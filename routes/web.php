<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use Database\Factories\EmployeeFactory;
use Illuminate\Support\Facades\Route;

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



Route::controller(UserController::class)->group(function(){

 Route::get('/login', 'create')->name('login')->middleware('guest');

Route::post('/login/process', 'process');

Route::get('/register', 'register')->middleware('guest');;

Route::post('/store', 'store');

Route::post('/logout', 'logout');

    
} );

Route::controller(EmployeeController::class)->group(function(){

Route::get('/addnew', 'addStudent')->middleware('auth');
Route::post('login/storeStudent', [EmployeeController::class, 'storeStudent']);
Route::get('/student/{id}', 'showStudent')->middleware('auth');
Route::put('/update/{id}', 'update'); 
Route::post('/delete/{id}', 'destroy'); 
Route::get('/student','studentList')->middleware('auth');
Route::get('/','index')->middleware('auth');

});


