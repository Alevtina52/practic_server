<?php
namespace Controller;

use Src\View;
use Src\Request;
use Model\Patient;
use Model\Doctor;

class RegistrarController
{
    public function addPatient(Request $request): string
    {
        if ($request->method === 'POST') {
            $data = $request->all();

            if (Patient::create($data)) {
                return new View('registrar.patient-add', [
                    'message' => 'Пациент успешно добавлен!'
                ]);
            }

            return new View('registrar.patient-add', [
                'message' => 'Ошибка при добавлении пациента'
            ]);
        }

        return new View('registrar.patient-add');
    }


    public function addDoctor(Request $request): string
    {
        if ($request->method === 'POST') {
            $data = $request->all();

            if (Doctor::create($data)) {
                return new View('registrar.doctor-add', [
                    'message' => 'Врач успешно добавлен!'
                ]);
            }

            return new View('registrar.doctor-add', [
                'message' => 'Ошибка при добавлении врача'
            ]);
        }

        return new View('registrar.doctor-add');
    }
}
