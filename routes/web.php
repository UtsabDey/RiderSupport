<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ToolsController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes([

    'register' => false, // Register Routes...
  
    'reset' => false, // Reset Password Routes...
  
    'verify' => false, // Email Verification Routes...
  
]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin
Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function(){
  Route::get('/',[DashboardController::class, 'index'])->name('dashboard');
  Route::resource('users', UserController::class);
  Route::resource('tools', ToolsController::class);
});
