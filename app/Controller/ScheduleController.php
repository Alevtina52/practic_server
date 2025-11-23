<?php

namespace Controller;

use Src\Request;
use Src\View;
use Model\Doctor;
use Model\DoctorSchedule;

class ScheduleController
{
    // Список расписаний
    public function list(): string
    {
        $schedules = DoctorSchedule::with('doctor')->get();

        return new View('schedule.list', [
            'schedules' => $schedules
        ]);
    }

    // Добавление расписания врача
    public function add(Request $request): string
    {
        $doctors = Doctor::all();

        if ($request->method === 'POST') {
            DoctorSchedule::create([
                'doctor_id' => $request->doctor_id,
                'weekday'   => $request->weekday,
                'time_from' => $request->time_from,
                'time_to'   => $request->time_to,
            ]);

            return new View('schedule.add', [
                'message' => 'Расписание добавлено!',
                'doctors' => $doctors
            ]);
        }

        return new View('schedule.add', [
            'doctors' => $doctors
        ]);
    }

    // Удаление расписания (если нужно)
    public function delete($id): void
    {
        $schedule = DoctorSchedule::find($id);

        if ($schedule) {
            $schedule->delete();
        }

        app()->route->redirect('/schedule');
    }

    public function doctorSchedule($doctor_id): string
    {
        $doctor = \Model\Doctor::find($doctor_id);

        if (!$doctor) {
            return new \Src\View('errors.404', [
                'message' => 'Врач не найден'
            ]);
        }

        $schedule = \Model\Schedule::where('doctor_id', $doctor_id)->get();

        return new \Src\View('schedule.doctor', [
            'doctor' => $doctor,
            'schedule' => $schedule
        ]);
    }

}
