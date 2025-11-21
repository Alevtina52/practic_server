<?php
namespace Controller;
use Src\View;
use Model\User;
use Src\Request;
use Src\Auth\Auth;
class Site
{
    public function index(): string
    {
        $view = new View();
        return $view->render('site.hello', ['message' => 'index
working']);
    }
    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello
working']);
    }
    public function signup(Request $request): string
    {
        if ($request->method === 'POST' && User::create($request->all()))
        {
            app()->route->redirect('/go');
        }
        return new View('site.signup');
    }

    public function login(Request $request): string
    {
//Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
//Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        }
//Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин
или пароль']);
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

            // Присваиваем роль вручную
            $data['role'] = 'registrar';


            // Создаём пользователя
            if (\Model\User::create($data)) {
                return new \Src\View('site.registrar-add', [
                    'message' => 'Сотрудник регистратуры успешно добавлен!'
                ]);
            }

            return new \Src\View('site.registrar-add', [
                'message' => 'Ошибка при добавлении сотрудника'
            ]);
        }

        return new \Src\View('site.registrar-add');
    }


}

