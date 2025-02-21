<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\StudyAbroadController;
use App\Models\Appointment;
use App\Models\StudyAbroad;
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
    Route::resource('study-abroad', controller: StudyAbroadController::class);
    Route::get('/study-abroad/create', [StudyAbroadController::class, 'addform'])->name('studyabroad.create');
});

Route::get(uri: '/services/all', action: [ServicesController::class, 'allservices'])->name('services.all');
Route::resource('appointment', AppointmentController::class);
Route::get(uri: '/registration', action: [RegistrationController::class, 'registrationpage'])->name('registration.page');
Route::resource('registrations', controller: RegistrationController::class);
Route::get(uri: '/about', action: [FrontendController::class, 'aboutpage'])->name('about.page');
Route::get(uri: '/contact-us', action: [FrontendController::class, 'contactus'])->name('contact.us');
Route::post(uri: '/contact-us', action: [FrontendController::class, 'storecontactdata'])->name('store.contact');
Route::get(uri: '/requirment', action: [FrontendController::class, 'requirment'])->name('requirment.page');
Route::get(uri: '/study-abroad-all', action: [StudyAbroadController::class, 'allstudyabroad'])->name('studyabroad.all');
Route::get('/studyabroad/{id}', [StudyAbroadController::class, 'show'])->name('studyabroad.show');

require __DIR__.'/auth.php';
