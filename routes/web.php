<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['auth:sanctum', 'verified'], 'prefix' => 'dashboard'], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // CRUDs
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', App\Http\Livewire\Dashboard\Category\Index::class)->name('d-category-index'); // List
        Route::get('/create', App\Http\Livewire\Dashboard\Category\Save::class)->name('d-category-create'); // Create
        Route::get('/edit/{id}', App\Http\Livewire\Dashboard\Category\Save::class)->name('d-category-edit'); // Edit
    });

});

Route::group(['prefix' => 'contact'], function () {
    Route::get('/', App\Http\Livewire\contact\General::class)->name('contact');
});

// general

// company - person

// ditail
