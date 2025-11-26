<?php
namespace Controller;

use Model\User;
use Src\Auth\Auth;
use Src\Request;
use Src\View;
use Src\Validator\SimpleValidator;

class Site
{
    public function index(): string
    {
        return (new View())->render('site.hello', ['message' => 'index working']);
    }

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST') {

            $data = $request->all();

            // Валидатор
            $validator = new SimpleValidator($data, [
                'name'     => ['not_empty', 'min:2'],
                'login'    => ['not_empty', 'unique:users,login'],
                'password' => ['not_empty', 'min:4']
            ]);

            if ($validator->fails()) {
                return new View('site.signup', [
                    'errors' => $validator->errors(),
                    'old' => $data
                ]);
            }

            if (User::create($data)) {
                app()->route->redirect('/login');
            }

            return new View('site.signup', [
                'message' => 'Ошибка при создании пользователя'
            ]);
        }

        return new View('site.signup');
    }


    public function login(Request $request): string
    {
        if ($request->method === 'GET') {
            return new View('site.login');
        }

        if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        }

        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }

    public function addRegistrar(Request $request): string
    {
        if ($request->method === 'POST') {

            $data = $request->all();

            // Валидируем через SimpleValidator
            $validator = new SimpleValidator($data, [
                'name'     => ['not_empty', 'min:2'],
                'login'    => ['not_empty', 'unique:users,login'],
                'password' => ['not_empty', 'min:4'],
            ]);

            if ($validator->fails()) {
                return new View('site.registrar-add', [
                    'errors' => $validator->errors(),
                    'old' => $data
                ]);
            }

            // Назначаем роль
            $data['role'] = 'registrar';

            if (User::create($data)) {
                return new View('site.registrar-add', [
                    'message' => 'Сотрудник регистратуры успешно добавлен!'
                ]);
            }

            return new View('site.registrar-add', [
                'message' => 'Ошибка при добавлении сотрудника'
            ]);
        }

        return new View('site.registrar-add');
    }
}
