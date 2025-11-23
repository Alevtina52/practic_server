<?php

namespace Controller;

use Src\View;
use Model\Doctor;

class DoctorController
{
    public function list(): string
    {
        $doctors = Doctor::all();

        return new View('doctor.list', [
            'doctors' => $doctors
        ]);
    }
}
