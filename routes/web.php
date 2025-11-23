<?php
use Src\Route;
use Controller\ScheduleController;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class,
    'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class,
    'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);

Route::add(['GET','POST'], '/registrar/add', [Controller\Site::class, 'addRegistrar'])
    ->middleware('auth', 'role:admin');

Route::add(['GET','POST'], '/registrar/patient/add',
    [Controller\RegistrarController::class, 'addPatient'])
    ->middleware('auth', 'role:registrar,admin');

Route::add(['GET','POST'], '/registrar/doctor/add',
    [Controller\RegistrarController::class, 'addDoctor'])
    ->middleware('auth', 'role:registrar,admin');

Route::add(['GET', 'POST'], '/appointment/add',
    [Controller\AppointmentController::class, 'add'])
    ->middleware('auth', 'role:registrar,admin');

Route::add('GET', '/appointments',
    [Controller\AppointmentController::class, 'list'])
    ->middleware('auth', 'role:registrar,admin');

Route::add('GET', '/appointments/cancel/{id}', [Controller\AppointmentController::class, 'cancelAppointment'])
    ->middleware('auth', 'role:registrar,admin');

Route::add('GET', '/schedule', [ScheduleController::class, 'list'])
    ->middleware('auth', 'role:admin,registrar');

Route::add('GET', '/schedule/add', [ScheduleController::class, 'add'])
    ->middleware('auth', 'role:registrar,admin');

Route::add('POST', '/schedule/add', [ScheduleController::class, 'add'])
    ->middleware('auth', 'role:registrar,admin');

Route::add('GET', '/schedule/delete/{id}', [ScheduleController::class, 'delete'])
    ->middleware('auth', 'role:registrar,admin');

// Список врачей
Route::add('GET', '/doctors',
    [Controller\DoctorController::class, 'list'])
    ->middleware('auth', 'role:registrar,admin');

// Расписание конкретного врача
Route::add('GET', '/schedule/doctor/{id}',
    [Controller\ScheduleController::class, 'doctorSchedule'])
    ->middleware('auth', 'role:registrar,admin');

// Список всех пациентов
Route::add('GET', '/patients',
    [Controller\PatientController::class, 'list'])
    ->middleware('auth', 'role:registrar,admin');

// Врачи конкретного пациента
Route::add('GET', '/patient/doctors/{id}',
    [Controller\PatientController::class, 'doctors'])
    ->middleware('auth', 'role:registrar,admin');

Route::add('GET', '/patients/{id}/appointments',
    [Controller\PatientController::class, 'patientAppointments'])
    ->middleware('auth', 'role:registrar,admin');