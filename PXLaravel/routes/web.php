<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\FaceController;
use App\Http\Controllers\CellController;
use App\Http\Controllers\PrisonerController;

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
    Route::group(['prefix' => 'prisoner'], function () {
        Route::get('/', [PrisonerController::class, 'index'])->name('prisoner.index');
        Route::get('/create', [PrisonerController::class, 'create'])->name('prisoner.create');
        Route::get('/edit', [PrisonerController::class, 'edit'])->name('prisoner.edit');
        Route::post('/store', [PrisonerController::class, 'store'])->name('prisoner.store');
        Route::post('/update', [PrisonerController::class, 'update'])->name('prisoner.update');
        Route::delete('/delete', [PrisonerController::class, 'delete'])->name('prisoner.delete');
    });
    Route::group(['prefix' => 'cell'], function () {
        Route::get('/', [CellController::class, 'index'])->name('cell.index');
        Route::get('/create', [CellController::class, 'create'])->name('cell.create');
        Route::get('/edit', [CellController::class, 'edit'])->name('cell.edit');
        Route::post('/store', [CellController::class, 'store'])->name('cell.store');
        Route::post('/update', [CellController::class, 'update'])->name('cell.update');
        Route::delete('/delete', [CellController::class, 'delete'])->name('cell.delete');
    });
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    });
    Route::group(['prefix' => 'scan'], function () {
        Route::get('/', [ScanController::class, 'index'])->name('scan.index');
        Route::get('/create', [ScanController::class, 'create'])->name('scan.create');
        Route::get('/create2', [ScanController::class, 'create2'])->name('scan.create2');
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
