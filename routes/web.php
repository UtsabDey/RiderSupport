<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RCRController;
use App\Http\Controllers\Admin\SOPController;
use App\Http\Controllers\Admin\ToolsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Agent\FeatureController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Ramsey\Uuid\FeatureSet;

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
  Route::resource('sop', SOPController::class);
  Route::resource('rcr', RCRController::class);


  Route::get('showTool', [FeatureController::class, 'showTool'])->name('showTool');
  Route::get('showSop', [FeatureController::class, 'showSop'])->name('showSop');
  Route::get('showRcr', [FeatureController::class, 'showRcr'])->name('showRcr');
});
