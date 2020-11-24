<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\FaceController;

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
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::get('/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::post('/update', [UserController::class, 'update'])->name('user.update');
        Route::delete('/delete', [UserController::class, 'delete'])->name('user.delete');
    });
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    });
    Route::group(['prefix' => 'scan'], function () {
        Route::get('/', [ScanController::class, 'index'])->name('scan.index');
        Route::get('/create', [ScanController::class, 'create'])->name('scan.create');
        Route::post('/store', [ScanController::class, 'store'])->name('scan.store');
        Route::delete('/delete', [ScanController::class, 'delete'])->name('scan.delete');
    });
    Route::group(['prefix' => 'face'], function () {
        Route::get('/create',  [FaceController::class, 'create'])->name('face.create');
        Route::get('/edit', [FaceController::class, 'edit'])->name('face.edit');
        Route::post('/store', [FaceController::class, 'store'])->name('face.store');
        Route::post('/update', [FaceController::class, 'update'])->name('face.update');
        Route::delete('/delete', [FaceController::class, 'delete'])->name('face.delete');
    });
    Route::group(['prefix' => 'role'], function () {
        Route::get('/', [RoleController::class, 'index'])->name('role.index');
    });
});
