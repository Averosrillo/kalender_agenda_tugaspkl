<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']);
Route::post('/manage-event', [EventController::class, 'manageEvent']);
Route::get('/search', [EventController::class, 'search']);  // New route for search page
Route::get('/kontak', [EventController::class, 'contact'])->name('contact');

// Route untuk menampilkan detail agenda
Route::get('/show/{id}', 'EventController@show')->name('events.show');

// Route untuk menampilkan form edit agenda
Route::get('/edit/{id}', 'EventController@edit')->name('events.edit');

// Route untuk memperbarui agenda
Route::put('update/{id}', 'EventController@update')->name('events.update');

// Route untuk menghapus agenda
Route::delete('delete/{id}', 'EventController@destroy')->name('events.destroy');

Route::resource('events', EventController::class);

