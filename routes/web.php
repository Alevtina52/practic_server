<?php
use Src\Route;
use Controller\ScheduleController;

/*
|--------------------------------------------------------------------------
| Авторизация и базовые страницы
|--------------------------------------------------------------------------
*/

// Главная страница после входа (доступна только авторизованным)
Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');

// Регистрация нового пользователя
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);

// Авторизация
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);

// Выход
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);


/*
|--------------------------------------------------------------------------
| Управление сотрудниками регистратуры (только админ)
|--------------------------------------------------------------------------
*/

// Добавление сотрудника регистратуры
Route::add(['GET','POST'], '/registrar/add',
    [Controller\Site::class, 'addRegistrar'])
    ->middleware('auth', 'role:admin');


/*
|--------------------------------------------------------------------------
| Управление пациентами (регистратор + админ)
|--------------------------------------------------------------------------
*/

// Добавление пациента
Route::add(['GET','POST'], '/registrar/patient/add',
    [Controller\RegistrarController::class, 'addPatient'])
    ->middleware('auth', 'role:registrar,admin');

// Список всех пациентов
Route::add('GET', '/patients',
    [Controller\PatientController::class, 'list'])
    ->middleware('auth', 'role:registrar,admin');

// Врачи, у которых был пациент
Route::add('GET', '/patient/doctors/{id}',
    [Controller\PatientController::class, 'doctors'])
    ->middleware('auth', 'role:registrar,admin');

// История записей конкретного пациента
Route::add('GET', '/patients/{id}/appointments',
    [Controller\PatientController::class, 'patientAppointments'])
    ->middleware('auth', 'role:registrar,admin');


/*
|--------------------------------------------------------------------------
| Управление врачами (регистратор + админ)
|--------------------------------------------------------------------------
*/

// Добавление врача
Route::add(['GET','POST'], '/registrar/doctor/add',
    [Controller\RegistrarController::class, 'addDoctor'])
    ->middleware('auth', 'role:registrar,admin');

// Список врачей
Route::add('GET', '/doctors',
    [Controller\DoctorController::class, 'list'])
    ->middleware('auth', 'role:registrar,admin');


/*
|--------------------------------------------------------------------------
| Записи к врачу (регистратор + админ)
|--------------------------------------------------------------------------
*/

// Создание записи пациента к врачу
Route::add(['GET', 'POST'], '/appointment/add',
    [Controller\AppointmentController::class, 'add'])
    ->middleware('auth', 'role:registrar,admin');

// Список всех записей + фильтр по пациенту
Route::add('GET', '/appointments',
    [Controller\AppointmentController::class, 'list'])
    ->middleware('auth', 'role:registrar,admin');

// Отмена записи
Route::add('GET', '/appointments/cancel/{id}',
    [Controller\AppointmentController::class, 'cancelAppointment'])
    ->middleware('auth', 'role:registrar,admin');


/*
|--------------------------------------------------------------------------
| Расписание врачей (регистратор + админ)
|--------------------------------------------------------------------------
*/

// Список расписаний всех врачей
Route::add('GET', '/schedule',
    [ScheduleController::class, 'list'])
    ->middleware('auth', 'role:admin,registrar');

// Форма добавления расписания
Route::add('GET', '/schedule/add',
    [ScheduleController::class, 'add'])
    ->middleware('auth', 'role:registrar,admin');

// Обработка добавления расписания
Route::add('POST', '/schedule/add',
    [ScheduleController::class, 'add'])
    ->middleware('auth', 'role:registrar,admin');

// Удаление расписания
Route::add('GET', '/schedule/delete/{id}',
    [ScheduleController::class, 'delete'])
    ->middleware('auth', 'role:registrar,admin');

// Расписание конкретного врача
Route::add('GET', '/schedule/doctor/{id}',
    [Controller\ScheduleController::class, 'doctorSchedule'])
    ->middleware('auth', 'role:registrar,admin');
