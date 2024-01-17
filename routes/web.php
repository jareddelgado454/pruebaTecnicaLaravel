<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ProfileController::class, 'showUsers'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/edituser/{user}', [UserController::class, 'edit'])->name('user.edit');
Route::patch('/edituser/{user}', [UserController::class, 'update'])->name('user.update');
Route::put('/edituser/{user}', [UserController::class, 'update_password'])->name('user.updatepassword');
Route::delete('/edituser/{user}',[UserController::class, 'delete_user'])->name('user.delete');

require __DIR__.'/auth.php';
