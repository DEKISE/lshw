<?php
namespace App\User\Controller;

use Base\ControllerAbstract as ControllerAbstract;
use App\User\Model\Base as UserModel;
use Base\Exception;

class Login extends ControllerAbstract
{
    public function registerAction()
    {

    }

    /**
     * @throws \Base\RedirectException
     */
    public function createUserAction()
    {
        $name = $this->p('name');
        $email = $this->p('email');
        $password = $this->p('password');
        $password2 = $this->p('password_2');
        $success = true;

        if (!$name) {
            $error =  'Не заданo имя';
            $success = false;
        } elseif (!$email) {
            $error =  'Не задан email';
            $success = false;
        } elseif (UserModel::checkEmail($email)) {
            $error = "Пользователь с email $email уже существует";
            $success = false;
        } elseif (!$password) {
            $error =  'Не задан пароль';
            $success = false;
        } elseif (mb_strlen($password) < 5) {
            $error =  'Пароль слишком короткий';
            $success = false;
        } elseif ($password !== $password2) {
            $error =  'Введенные пароли не совпадают';
            $success = false;
        }
        if ($success) {
            $user = new UserModel();
            $user->setName($name);
            $user->initByData([
                'email' => $email,
                'password' => $password,
            ]);
            $user->saveToDb();
            $user->authorize();
            $this->redirect('/');
        }
        $this->view->error = $error;
        $this->view->setRenderType(2);
        $this->tpl = 'register.twig';

    }

    public function loginAction()
    {
        $success = false;

        $email = $this->p('email');
        $password = $this->p('password');

        if (!$email && !$password) {
            $error = '';
        } elseif (!$email) {
            $error = 'Не задан email';
        } elseif (!$password) {
            $error = 'Не задан пароль';
        } else {
            $user = new UserModel();
            $user->initByData([
                'email' => $email,
                'password' => $password,
            ]);

            try {
                $success = $user->authorize();
                if (!$success) {
                    $error = 'Wrong login or password';
                }
            } catch
                (Exception $e) {
                $error = 'Sever error';
                trigger_error($e->getMessage());
                $success = false;
            }
        }

        if ($success) {
            $this->redirect('/user/profile/');
        } else {
            $this->view->title = 'Авторизация';
            $this->view->error = $error;
            $this->view->setRenderType(2);
            $this->tpl = 'register.twig';
        }
    }

    public function profileAction()
    {
        $this->view->setRenderType(2);
        $this->view->user = $this->USER;
        $this->view->title = 'Профиль';
        $this->tpl = 'profile.twig';
    }

    public function logoutAction()
    {
        session_destroy();

        $this->redirect('/user/login');

    }

    public function editUserAction()
    {
        $id = $this->USER->getId();
        $name = $this->p('name');
        $email = $this->p('email');
        $password = $this->p('password');
        $password2 = $this->p('password_2');
        $success = true;
        if (!$name && !$email && !$password) {
            $error =  '';
            $success = false;
        } elseif (!$name) {
            $error =  'Не заданo имя';
            $success = false;
        } elseif (!$email) {
            $error =  'Не задан email';
            $success = false;
        } elseif (UserModel::checkEmail($email, $id)) {
            $error = "Пользователь с email $email уже существует";
            $success = false;
        } elseif (!$password) {
            $error =  'Не задан пароль';
            $success = false;
        } elseif (mb_strlen($password) < 5) {
            $error =  'Пароль слишком короткий';
            $success = false;
        } elseif ($password !== $password2) {
            $error =  'Введенные пароли не совпадают';
            $success = false;
        }
        if ($success) {
            $this->USER->setName($name);
            $this->USER->initByData([
                'email' => $email,
                'password' => $password,
            ]);
            $this->USER->updateInDb();
            $this->redirect('/user/profile');
        }
        $this->view->user = $this->USER;
        $this->view->title = 'Редактировать профиль';
        $this->view->error = $error;
        $this->view->setRenderType(2);
        $this->tpl = 'edit.twig';

    }

    public function testAction()
    {

        $this->tpl = 'test.phtml';

    }


}