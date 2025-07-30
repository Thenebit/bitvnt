<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('landingpage');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
	Route::get('/home', [EventController::class, 'dashboard'])->name('event.dashboard');

	Route::get('/events', [EventController::class, 'index'])->name('event.index');

	Route::get('/create', [EventController::class, 'create'])->name('event.create');

	Route::post('/store', [EventController::class, 'store'])->name
	('event.store');

	Route::get('/show/{id}', [EventController::class, 'show'])->name
	('event.show');

	Route::get('/edit/{id}', [EventController::class, 'edit'])->name
	('event.edit');

	Route::put('/update/{id}', [EventController::class, 'update'])
	->name('event.update');

	Route::delete('/delete/{id}', [EventController::class, 'destroy'])->name('event.destroy');
});