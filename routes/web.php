<?php
use Src\Route;
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