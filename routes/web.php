<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleOAuthController;
use App\Http\Controllers\FacebookOAuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

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

/**
 *   Client related routes
 */

Route::prefix('clients')->middleware(['auth'])->group(function () {

    // Client Model related routes
    Route::get('/', [ClientController::class, 'index'])->name('client.index');
    Route::get('/create-new', [ClientController::class, 'create'])->name('client.create');
    Route::post('/create-new', [ClientController::class, 'store'])->name('client.store');
    Route::get('/edit/{client}', [ClientController::class, 'edit'])->name('client.edit');
    Route::put('/update/{client}', [ClientController::class, 'update'])->name('client.update');
    Route::delete('/delete/{client}', [ClientController::class, 'destroy'])->name('client.delete');

});

/**
 *   Profile related routes
 */
Route::prefix('profile')->middleware(['auth'])->group(function () {

    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/upload', [ProfileController::class, 'upload']);
    Route::put('/{user}', [ProfileController::class, 'update'])->name('profile.update');
});

/**
 *   Project related routes
 */
Route::prefix('projects')->middleware(['auth'])->group(function () {

    Route::get('/', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/create-new', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/create-new', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/edit/{project}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/update/{project}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/delete/{project}', [ProjectController::class, 'destroy'])->name('project.delete');

});


/**
 *   Task related routes
 */
Route::prefix('tasks')->middleware(['auth'])->group(function () {

    Route::get('/{project}', [TaskController::class, 'index'])->name('task.index');
    Route::get('/create/{project}', [TaskController::class, 'create'])->name('task.create');
    Route::post('/create-new', [TaskController::class, 'store'])->name('task.store');
    Route::get('/edit/{task}', [TaskController::class, 'edit'])->name('task.edit');
    Route::put('/update/{task}', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/delete/{task}', [TaskController::class, 'destroy'])->name('task.delete');

});

/**
* Files related route
*/
// Route::prefix('files')->middleware(['auth'])->group(function () {

//     Route::get('/', [FileController::class, 'index'])->name('file.index');
//     Route::get('/add-file', [FileController::class, 'create'])->name('file.create');
//     Route::post('/add-file', [FileController::class, 'store'])->name('file.store');
    // Route::post('/upload', [FileController::class, 'upload'])->name('file.upload');
    // Route::get('/edit/{task}', [TaskController::class, 'edit'])->name('task.edit');
    // Route::put('/update/{task}', [TaskController::class, 'update'])->name('task.update');
    // Route::delete('/delete/{task}', [TaskController::class, 'destroy'])->name('task.delete');

// });
