<?php

namespace Middlewares;

use Src\Auth\Auth;

class RoleMiddleware
{
    public function handle($request, $roles)
    {
        // roles приходит как строка "admin" или "admin,registrar"
        $rolesArray = array_map('trim', explode(',', $roles));

        $user = Auth::user();

        // Если не авторизован
        if (!$user) {
            redirect('/login');
        }

        // Если роль не входит в список разрешённых
        if (!in_array($user->role, $rolesArray)) {
            die('Доступ запрещён');
        }
    }
}
