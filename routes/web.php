<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleOAuthController;
use App\Http\Controllers\FacebookOAuthController;

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
    return redirect()->route('login');
});

Auth::routes();

/**
 * Social Login Routes
 */
Route::prefix('auth')->group(function () {

    Route::get('/facebook/redirect', [FacebookOAuthController::class, 'redirect'])->name('facebook.redirect');
    Route::get('/facebook/callback', [FacebookOAuthController::class, 'callback'])->name('facebook.callback');

    Route::get('/google/redirect', [GoogleOAuthController::class, 'redirect'])->name('google.redirect');
    Route::get('/google/callback', [GoogleOAuthController::class, 'callback'])->name('google.callback');

});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');



});

Route::prefix('clients')->middleware(['auth'])->group(function () {

    // Client Model related routes
    Route::get('/', [ClientController::class, 'index'])->name('client.index');
    Route::get('/create-new', [ClientController::class, 'create'])->name('client.create');
    Route::post('/create-new', [ClientController::class, 'store'])->name('client.store');
    Route::get('/edit/{client}', [ClientController::class, 'edit'])->name('client.edit');
    Route::put('/update/{client}', [ClientController::class, 'update'])->name('client.update');
    Route::delete('/delete/{client}', [ClientController::class, 'destroy'])->name('client.delete');

});

Route::prefix('profile')->middleware(['auth'])->group(function () {

    // Profile related routes
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/upload', [ProfileController::class, 'upload']);
    Route::put('/{user}', [ProfileController::class, 'update'])->name('profile.update');
});

