<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\userController;

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

Route::view('/','auth.login')->name('home');

Auth::routes();

Route::group(['prefix' => 'user', 'as' => 'user.'], function() {
    Route::get('/profile', [ProfileController::class, 'show'])->name('Profile');
    Route::view('/Ajou', 'user.Ajou')->name('Ajou');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::view('/test', 'layouts.body');

Route::get('/admin/Afficher', [AdminController::class, 'Afficher'])->name('admin.Afficher');
// Route::get('/admin/showAfficher', [AdminController::class, 'showAfficher'])->name('admin.showAfficher');


Route::resource('admin', \App\Http\Controllers\AdminController::class);
Route::resource('user', \App\Http\Controllers\userController::class);
// Route::get('/user', [UserController::class, 'index'])->name('user.index');

// Route::get('admin/{id}/edit', [\App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit');

Route::put('admin/{id}', [\App\Http\Controllers\AdminController::class, 'update'])->name('admin.update');

Route::get('admin/edit/{id}', function ($id){
    return view('admin.edit',['id' => $id]);
})->name('admin.edit');

Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');

// Route::middleware(['auth', 'is_admin'])->group(function () {
//     Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
// });
