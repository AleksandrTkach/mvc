<?php

namespace App\controllers;

use App\core\Controller;

class AccountController extends Controller
{
    private string $layout = 'auth';

    /**
     * AccountController constructor.
     * @param $route
     */
    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = $this->layout;
    }

    public function loginAction()
    {
        if (!empty($_POST['login']) && !empty($_POST['password'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $user = $this->model->userAuth(compact('login', 'password'));

            if (isset($user['id'])) {
                $_SESSION['id'] = (int) $user['id'];
                $_SESSION['login'] = $user['login'];
                $_SESSION['role_id'] = (int) $user['role_id'];
                $this->view->redirect('tasks');
            } else {
                $this->view->render('Sing in', $this->message('Incorrect login or password'));
            }

        } else {
            $this->view->render('Sing in');
        }
    }

    public function registrationAction()
    {
        if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['password_confirmation'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $passwordConfirmation = $_POST['password_confirmation'];

            if ($password !== $passwordConfirmation) {
                $this->view->render(
                    'Sing up',
                    $this->message('Password confirmation does not match password !')
                );
                exit();
            }

            $_POST = null;

            $this->model->userStore(compact('login', 'password'))
                ? $this->view->redirect('login')
                : $this->view->render('Sing up', $this->message('User login must be unique'));

        } else {
            $this->view->render('Sing up');
        }
    }

    public function logoutAction()
    {
        session_destroy();
        $this->view->redirect('login');
    }
}
