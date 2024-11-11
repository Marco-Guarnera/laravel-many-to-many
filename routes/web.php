<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

// Homepage
Route::get('/', [AdminProjectController::class, 'index'])->name('homepage');

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Projects
Route::prefix('/admin')->name('admin.projects.')->group(function() {
    // Create
    Route::get('/projects/create', [AdminProjectController::class, 'create'])->name('create');
    // Store
    Route::post('/projects', [AdminProjectController::class, 'store'])->name('store');
    // Index
    Route::get('/projects', [AdminProjectController::class, 'index'])->name('index');
    // Show
    Route::get('/projects/{project}', [AdminProjectController::class, 'show'])->name('show');
    // Edit
    Route::get('/projects/{project}/edit', [AdminProjectController::class, 'edit'])->name('edit');
    // Update
    Route::put('/projects/{project}', [AdminProjectController::class, 'update'])->name('update');
    // Delete
    Route::delete('/projects/{project}', [AdminProjectController::class, 'destroy'])->name('delete');

    // Route::resource('/projects', [AdminProjectController::class]);
});
