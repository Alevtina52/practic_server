<?php

namespace Controller;

use Model\Patient;
use Model\Doctor;
use Model\Appointment;
use Src\Request;
use Src\View;

class PatientController
{
    // Список всех пациентов
    public function list(Request $request): string
    {
        $search = trim($request->get('search') ?? '');

        $query = Patient::query();

        if ($search !== '') {
            $query->whereRaw("CONCAT(lastname, ' ', firstname, ' ', middlename) LIKE ?", ["%$search%"]);
        }

        $patients = $query->get();

        return new View('patient.list', [
            'patients' => $patients,
            'search' => $search
        ]);
    }


    // Врачи, к которым был записан пациент
    public function doctors($id): string
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return new View('errors.404', ['message' => 'Пациент не найден']);
        }

        // Врачи, у которых была запись конкретного пациента
        $doctors = Doctor::whereIn(
            'id',
            Appointment::where('patient_id', $id)->pluck('doctor_id')
        )->get();

        return new View('patient.doctors', [
            'patient' => $patient,
            'doctors' => $doctors
        ]);
    }

    public function patientAppointments($id): string
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return new View('errors.404', ['message' => 'Пациент не найден']);
        }

        // История всех записей пациента
        $appointments = Appointment::with('doctor')
            ->where('patient_id', $id)
            ->orderBy('datetime', 'desc')
            ->get();

        return new View('patient.appointments', [
            'patient' => $patient,
            'appointments' => $appointments
        ]);
    }

}
