<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminAboutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AdminDoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ManagerDoctorController;
use App\Http\Controllers\AdminTreatmentController;
use App\Http\Controllers\AdminDepartmentController;
use App\Http\Controllers\AdminAppointmentController;
use App\Http\Controllers\AdminTestimonialController;
use App\Http\Controllers\ManagerTreatmentController;
use App\Http\Controllers\ManagerDepartmentController;
use App\Http\Controllers\ManagerAppointmentController;

// Frontend Routes
Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/doctor', [FrontController::class, 'doctor'])->name('doctor');
Route::get('/treatment', [FrontController::class, 'treatment'])->name('treatment');
Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');
Route::get('/client', [FrontController::class, 'client'])->name('client');

// Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// Contacts Routes
Route::prefix('/contacts')->middleware('web')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('/store', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('/{contact}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});

// Appointments Routes
Route::prefix('/appointments')->middleware('web')->group(function () {
    Route::get('/', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/store', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/{appointment}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
    Route::put('/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');
    Route::delete('/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
});

// Doctors Routes
Route::prefix('/doctors')->middleware('web')->group(function () {
    Route::get('/', [DoctorController::class, 'index'])->name('doctors.index');
    Route::get('/create', [DoctorController::class, 'create'])->name('doctors.create');
    Route::post('/store', [DoctorController::class, 'store'])->name('doctors.store');
    Route::get('/{doctor}/edit', [DoctorController::class, 'edit'])->name('doctors.edit');
    Route::put('/{doctor}', [DoctorController::class, 'update'])->name('doctors.update');
    Route::delete('/{doctor}', [DoctorController::class, 'destroy'])->name('doctors.destroy');
});

// Departments Routes
Route::prefix('/departments')->middleware('web')->group(function () {
    Route::get('/', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/create', [DepartmentController::class, 'create'])->name('departments.create');
    Route::post('/store', [DepartmentController::class, 'store'])->name('departments.store');
    Route::get('/{department}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
    Route::put('/{department}', [DepartmentController::class, 'update'])->name('departments.update');
    Route::delete('/{department}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
});

// Abouts Routes
Route::prefix('/abouts')->middleware('web')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('abouts.index');
    Route::get('/create', [AboutController::class, 'create'])->name('abouts.create');
    Route::post('/store', [AboutController::class, 'store'])->name('abouts.store');
    Route::get('/{about}/edit', [AboutController::class, 'edit'])->name('abouts.edit');
    Route::put('/{about}', [AboutController::class, 'update'])->name('abouts.update');
    Route::delete('/{about}', [AboutController::class, 'destroy'])->name('abouts.destroy');
});



Route::group(['middleware' => 'web'], function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // Logout route
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});

// All Normal Users
Route::middleware(['auth', 'user-access:user'])->group(function(){
    Route::get('/home', [HomeController::class, 'home'])->name('home');



});


// All Admin Users
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin_home');

    // Doctors Routes
    Route::prefix('/admin/doctors')->middleware('web')->group(function () {
        Route::get('/', [AdminDoctorController::class, 'index'])->name('admin.doctors.index');
        Route::get('/create', [AdminDoctorController::class, 'create'])->name('admin.doctors.create');
        Route::post('/store', [AdminDoctorController::class, 'store'])->name('admin.doctors.store');
        Route::get('/{doctor}/edit', [AdminDoctorController::class, 'edit'])->name('admin.doctors.edit');
        Route::put('/{doctor}', [AdminDoctorController::class, 'update'])->name('admin.doctors.update');
        Route::delete('/{doctor}', [AdminDoctorController::class, 'destroy'])->name('admin.doctors.destroy');
    });

    // Departments Routes
    Route::prefix('/admin/departments')->middleware('web')->group(function () {
        Route::get('/', [AdminDepartmentController::class, 'index'])->name('admin.departments.index');
        Route::get('/create', [AdminDepartmentController::class, 'create'])->name('admin.departments.create');
        Route::post('/store', [AdminDepartmentController::class, 'store'])->name('admin.departments.store');
        Route::get('/{department}/edit', [AdminDepartmentController::class, 'edit'])->name('admin.departments.edit');
        Route::put('/{department}', [AdminDepartmentController::class, 'update'])->name('admin.departments.update');
        Route::delete('/{department}', [AdminDepartmentController::class, 'destroy'])->name('admin.departments.destroy');
    });

    // Abouts Routes
    Route::prefix('/admin/abouts')->middleware('web')->group(function () {
        Route::get('/', [AdminAboutController::class, 'index'])->name('admin.abouts.index');
        Route::get('/create', [AdminAboutController::class, 'create'])->name('admin.abouts.create');
        Route::post('/store', [AdminAboutController::class, 'store'])->name('admin.abouts.store');
        Route::get('/{about}/edit', [AdminAboutController::class, 'edit'])->name('admin.abouts.edit');
        Route::put('/{about}', [AdminAboutController::class, 'update'])->name('admin.abouts.update');
        Route::delete('/{about}', [AdminAboutController::class, 'destroy'])->name('admin.abouts.destroy');
    });

    // Treatments Routes
    Route::prefix('/admin/treatments')->middleware('web')->group(function () {
        Route::get('/', [AdminTreatmentController::class, 'index'])->name('admin.treatments.index');
        Route::get('/create', [AdminTreatmentController::class, 'create'])->name('admin.treatments.create');
        Route::post('/store', [AdminTreatmentController::class, 'store'])->name('admin.treatments.store');
        Route::get('/{treatment}/edit', [AdminTreatmentController::class, 'edit'])->name('admin.treatments.edit');
        Route::put('/{treatment}', [AdminTreatmentController::class, 'update'])->name('admin.treatments.update');
        Route::delete('/{treatment}', [AdminTreatmentController::class, 'destroy'])->name('admin.treatments.destroy');
    });

    // Appointments Routes
    Route::prefix('/admin/appointments')->middleware('web')->group(function () {
        Route::get('/', [AdminAppointmentController::class, 'index'])->name('admin.appointments.index');
        Route::get('/create', [AdminAppointmentController::class, 'create'])->name('admin.appointments.create');
        Route::post('/store', [AdminAppointmentController::class, 'store'])->name('admin.appointments.store');
        Route::get('/{appointment}/edit', [AdminAppointmentController::class, 'edit'])->name('admin.appointments.edit');
        Route::put('/{appointment}', [AdminAppointmentController::class, 'update'])->name('admin.appointments.update');
        Route::delete('/{appointment}', [AdminAppointmentController::class, 'destroy'])->name('admin.appointments.destroy');
    });

    // Testimonials Routes
    Route::prefix('/admin/testimonials')->middleware('web')->group(function () {
        Route::get('/', [AdminTestimonialController::class, 'index'])->name('admin.testimonials.index');
        Route::get('/create', [AdminTestimonialController::class, 'create'])->name('admin.testimonials.create');
        Route::post('/store', [AdminTestimonialController::class, 'store'])->name('admin.testimonials.store');
        Route::get('/{testimonial}/edit', [AdminTestimonialController::class, 'edit'])->name('admin.testimonials.edit');
        Route::put('/{testimonial}', [AdminTestimonialController::class, 'update'])->name('admin.testimonials.update');
        Route::delete('/{testimonial}', [AdminTestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');
    });
});


// All Manager Users
Route::middleware(['auth', 'user-access:manager'])->group(function(){
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager_home');

    // Doctors Routes
    Route::prefix('/manager/doctors')->middleware('web')->group(function () {
        Route::get('/', [ManagerDoctorController::class, 'index'])->name('manager.doctors.index');
        Route::get('/create', [ManagerDoctorController::class, 'create'])->name('manager.doctors.create');
        Route::post('/store', [ManagerDoctorController::class, 'store'])->name('manager.doctors.store');
        Route::get('/{doctor}/edit', [ManagerDoctorController::class, 'edit'])->name('manager.doctors.edit');
        Route::put('/{doctor}', [ManagerDoctorController::class, 'update'])->name('manager.doctors.update');
        Route::delete('/{doctor}', [ManagerDoctorController::class, 'destroy'])->name('manager.doctors.destroy');
    });

    // Departments Routes
    Route::prefix('/manager/departments')->middleware('web')->group(function () {
        Route::get('/', [ManagerDepartmentController::class, 'index'])->name('manager.departments.index');
        Route::get('/create', [ManagerDepartmentController::class, 'create'])->name('manager.departments.create');
        Route::post('/store', [ManagerDepartmentController::class, 'store'])->name('manager.departments.store');
        Route::get('/{department}/edit', [ManagerDepartmentController::class, 'edit'])->name('manager.departments.edit');
        Route::put('/{department}', [ManagerDepartmentController::class, 'update'])->name('manager.departments.update');
        Route::delete('/{department}', [ManagerDepartmentController::class, 'destroy'])->name('manager.departments.destroy');
    });

    // Treatments Routes
    Route::prefix('/manager/treatments')->middleware('web')->group(function () {
        Route::get('/', [ManagerTreatmentController::class, 'index'])->name('manager.treatments.index');
        Route::get('/create', [ManagerTreatmentController::class, 'create'])->name('manager.treatments.create');
        Route::post('/store', [ManagerTreatmentController::class, 'store'])->name('manager.treatments.store');
        Route::get('/{treatment}/edit', [ManagerTreatmentController::class, 'edit'])->name('manager.treatments.edit');
        Route::put('/{treatment}', [ManagerTreatmentController::class, 'update'])->name('manager.treatments.update');
        Route::delete('/{treatment}', [ManagerTreatmentController::class, 'destroy'])->name('manager.treatments.destroy');
    });

    // Appointments Routes
    Route::prefix('/manager/appointments')->middleware('web')->group(function () {
        Route::get('/', [ManagerAppointmentController::class, 'index'])->name('manager.appointments.index');
        Route::get('/create', [ManagerAppointmentController::class, 'create'])->name('manager.appointments.create');
        Route::post('/store', [ManagerAppointmentController::class, 'store'])->name('manager.appointments.store');
        Route::get('/{appointment}/edit', [ManagerAppointmentController::class, 'edit'])->name('manager.appointments.edit');
        Route::put('/{appointment}', [ManagerAppointmentController::class, 'update'])->name('manager.appointments.update');
        Route::delete('/{appointment}', [ManagerAppointmentController::class, 'destroy'])->name('manager.appointments.destroy');
    });
});

