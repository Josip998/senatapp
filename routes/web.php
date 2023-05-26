<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\MaterialController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('meetings', MeetingController::class);

Route::prefix('/meetings/{meeting}')->group(function () {
    Route::get('/points/create', [PointController::class, 'create'])->name('meetings.points.create');
    Route::post('/points', [PointController::class, 'store'])->name('meetings.points.store');
    Route::get('/points/{point}/edit', [PointController::class, 'edit'])->name('meetings.points.edit');
    Route::put('/points/{point}', [PointController::class, 'update'])->name('meetings.points.update');
    Route::delete('/points/{point}', [PointController::class, 'destroy'])->name('meetings.points.destroy');

    Route::get('/materials/create', [MaterialController::class, 'create'])->name('meetings.materials.create');
    Route::post('/materials', [MaterialController::class, 'store'])->name('meetings.materials.store');
    Route::get('/materials/{material}/edit', [MaterialController::class, 'edit'])->name('meetings.materials.edit');
    Route::put('/materials/{material}', [MaterialController::class, 'update'])->name('meetings.materials.update');
    Route::delete('/materials/{material}', [MaterialController::class, 'destroy'])->name('meetings.materials.destroy');
});





