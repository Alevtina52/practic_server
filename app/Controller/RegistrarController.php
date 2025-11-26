<?php
namespace Controller;

use Src\View;
use Src\Request;
use Model\Patient;
use Model\Doctor;
use Src\Validator\SimpleValidator;
use Src\Validator\DateValidator;

class RegistrarController
{
    public function addPatient(Request $request): string
    {
        if ($request->method === 'POST') {

            $data = $request->all();
            $errors = [];

            // ==== 1) Валидация полей ====
            $validator = new SimpleValidator($data, [
                'lastname'   => ['not_empty', 'min:2'],
                'firstname'  => ['not_empty', 'min:2'],
                'birthdate'  => ['not_empty'],
            ]);

            if ($validator->fails()) {
                $errors = array_merge($errors, $validator->errors());
            }

            // ==== 2) ВАЛИДАЦИЯ ДАТЫ РОЖДЕНИЯ ====
            if (!empty($data['birthdate'])) {
                $dateError = \Src\Validator\DateValidator::notFuture($data['birthdate'], 'Дата рождения');
                if ($dateError) {
                    $errors['birthdate'][] = $dateError;
                }
            }

            // ==== Если есть ошибки — возвращаем форму ====
            if (!empty($errors)) {
                return new View('registrar.patient-add', [
                    'errors' => $errors,
                    'old' => $data
                ]);
            }

            // ==== Создание пациента ====
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
            $errors = [];

            // === VALIDATION ===
            $validator = new SimpleValidator($data, [
                'lastname'      => ['not_empty', 'min:2'],
                'firstname'     => ['not_empty', 'min:2'],
                'position'      => ['not_empty'],
                'specialization'=> ['not_empty'],
                'birthdate'     => ['not_empty']
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
            }

            // Проверка даты рождения — НЕ будущая
            if (!empty($data['birthdate'])) {
                $dateError = DateValidator::notFuture($data['birthdate'], 'Дата рождения');
                if ($dateError) {
                    $errors['birthdate'][] = $dateError;
                }
            }

            // Если есть ошибки → вернуть форму
            if (!empty($errors)) {
                return new View('registrar.doctor-add', [
                    'errors' => $errors,
                    'old' => $data
                ]);
            }

            // === Обработка загрузки фото ===
            if (!empty($_FILES['photo']['name'])) {

                $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/practic/public/uploads/doctors/";
                if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

                $filename = time() . "_" . basename($_FILES['photo']['name']);
                $targetFile = $uploadDir . $filename;

                if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
                    $data['photo'] = $filename;
                } else {
                    return new View('registrar.doctor-add', [
                        'errors' => ['photo' => ["Ошибка загрузки файла"]],
                        'old' => $data
                    ]);
                }
            }

            if (Doctor::create($data)) {
                return new View('registrar.doctor-add', [
                    'message' => 'Врач успешно добавлен!'
                ]);
            }

            return new View('registrar.doctor-add', [
                'errors' => ['global' => ['Ошибка при добавлении врача']],
                'old' => $data
            ]);
        }

        return new View('registrar.doctor-add');
    }



}
