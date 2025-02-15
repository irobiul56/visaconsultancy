<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicesController;
use App\Models\Appointment;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::get('/dashboard', [AppointmentController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', action: [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    //Appointment
    Route::patch('/appointments/{appointment}/done', [AppointmentController::class, 'done'])->name('appointment.done');

    //Services
    Route::get('/services', [ServicesController::class, 'addservices'])->name('services.add');
    Route::resource('service', controller: ServicesController::class);
});

Route::get(uri: '/services/all', action: [ServicesController::class, 'allservices'])->name('services.all');
Route::resource('appointment', AppointmentController::class);

require __DIR__.'/auth.php';
