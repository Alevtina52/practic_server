<?php

namespace Controller;

use Src\View;
use Model\Doctor;
use Src\Request;

class DoctorController
{
    public function list(Request $request): string
    {
        $search = trim($request->get('search') ?? '');

        // Базовый запрос
        $query = Doctor::query();

        // Если есть поисковый текст — фильтруем
        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('lastname', 'like', "%$search%")
                    ->orWhere('firstname', 'like', "%$search%")
                    ->orWhere('middlename', 'like', "%$search%")
                    ->orWhere('position', 'like', "%$search%")
                    ->orWhere('specialization', 'like', "%$search%");
            });
        }

        $doctors = $query->get();

        return new View('doctor.list', [
            'doctors' => $doctors,
            'search'  => $search
        ]);
    }
}
