<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\ProfileController;

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
    return view('index');
});

// ********************************User related pages

Route::prefix('user')->middleware(['auth', 'verified'])->name('user.')->group(function () {
Route::get('profile', ProfileController::class)->name('profile');
    

});

// Dung resource thi khong dung duoc syntax [UserController::class, 'fucntion']
// What is resource here? Hoang bach answer
// Route::resource('/producttest', UserController::class);

// Route for testing purposes
// Route::view('test', 'usertest');

// **************** ADMIN  ****************

Route::prefix('admin')->middleware(['auth', 'auth.isAdmin', 'verified'])->name('admin.')->group(function() {
    // auth: default in laravel phải login, auth.isAdmin: middleware customize, verified: default in laravel: verify_at email
    Route::resource('/users', UserController::class);


});


// Route::group([
//     'name'=>'admin.',
//     'prefix'=>'admin',
// ],function() {
//     Route::resource('/users', UserController::class);
// });