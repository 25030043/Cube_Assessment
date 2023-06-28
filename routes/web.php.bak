<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DevProjectDataController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    // Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Dev Project Data
	Route::get('/devprojectdata', [DevProjectDataController::class, 'index'])->name('devprojectdata.index');
	Route::get('/devprojectdata/create', [DevProjectDataController::class, 'create'])->name('devprojectdata.create');
	Route::post('/devprojectdata', [DevProjectDataController::class, 'store'])->name('devprojectdata.store');
	Route::get('/devprojectdata/{devprojectdata}', [DevProjectDataController::class, 'show'])->name('devprojectdata.show');
	Route::get('/devprojectdata/{devprojectdata}/edit', [DevProjectDataController::class, 'edit'])->name('devprojectdata.edit');
	Route::put('/devprojectdata/{devprojectdata}', [DevProjectDataController::class, 'update'])->name('devprojectdata.update');
	Route::delete('/devprojectdata/{devprojectdata}', [DevProjectDataController::class, 'destroy'])->name('devprojectdata.destroy');
	Route::get('/devprojectdata/{devprojectdata}/variants', [DevProjectDataController::class, 'showVariants'])->name('devprojectdata.variants');

});


