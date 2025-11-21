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
}
