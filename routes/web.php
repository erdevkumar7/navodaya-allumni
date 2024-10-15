<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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
})->name('index');

Route::prefix('allumni')->group(function(){
    Route::get('/register', [AuthController::class, 'registerNavodayanForm'])->name('user.registerNavodayanForm');
    Route::post('/register', [AuthController::class, 'registerNavodayanFormSubmit'])->name('user.registerNavodayanFormSubmit');

});

Route::prefix('admin')->group(function(){
    Route::get('/register',[AuthController::class, 'registerAdminForm'])->name('admin.registerAdminForm');
    Route::post('/register',[AuthController::class, 'registerAdminFormSubmit'])->name('admin.registerAdminFormSubmit');

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/allumni-list', [AdminController::class, 'allumniList'])->name('admin.allumniList');
});

