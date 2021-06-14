<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

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

// Dung resource thi khong dung duoc syntax [UserController::class, 'fucntion']
// What is resource here? Hoang bach answer
// Route::resource('/producttest', UserController::class);

// Route for testing purposes
// Route::view('test', 'usertest');

// **************** ADMIN  ****************
Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('/users', UserController::class);

});


// Route::group([
//     'name'=>'admin.',
//     'prefix'=>'admin',
// ],function() {
//     Route::resource('/users', UserController::class);
// });