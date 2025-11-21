<?php

namespace Controller;

use Src\View;
use Src\Request;
use Model\Patient;
use Model\Doctor;
use Model\Appointment;

class AppointmentController
{
    public function add(Request $request): string
    {
        $patients = Patient::all();
        $doctors  = Doctor::all();

        if ($request->method === 'POST') {
            $data = $request->all();

            // Проверяем — свободно ли время у врача
            $exists = Appointment::where('doctor_id', $data['doctor_id'])
                ->where('datetime', $data['datetime'])
                ->exists();

            if ($exists) {
                return new View('appointment.add', [
                    'patients' => $patients,
                    'doctors'  => $doctors,
                    'message'  => 'Ошибка: выбранное время занято'
                ]);
            }

            if (Appointment::create($data)) {
                return new View('appointment.add', [
                    'patients' => $patients,
                    'doctors'  => $doctors,
                    'message'  => 'Запись успешно создана'
                ]);
            }

            return new View('appointment.add', [
                'patients' => $patients,
                'doctors'  => $doctors,
                'message'  => 'Ошибка при создании записи'
            ]);
        }

        return new View('appointment.add', [
            'patients' => $patients,
            'doctors'  => $doctors
        ]);
    }

    public function list(): string
    {
        $appointments = Appointment::with(['patient', 'doctor'])->get();

        return new View('appointment.list', [
            'appointments' => $appointments
        ]);
    }

    public function cancelAppointment($id, Request $request): string
    {
        $appointment = \Model\Appointment::find($id);

        if (!$appointment) {
            $_SESSION['error'] = 'Запись не найдена';
            app()->route->redirect('/appointments');
            return '';
        }

        // Меняем статус
        $appointment->status = 'canceled';
        $appointment->save();

        // Flash-сообщение
        $_SESSION['success'] = 'Запись успешно отменена';

        // Редирект обратно
        app()->route->redirect('/appointments');
        return '';
    }


}
