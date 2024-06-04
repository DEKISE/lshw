<?php
namespace App\Controller;

use App\Model\User as UserModel;
use Base\AbstractController;

class User extends AbstractController
{

    public function loginAction()
    {
        $email = trim($_POST['email']);

        if ($email) {
            $password = $_POST['password'];
            $user = UserModel::getByEmail($email);
            if (!$user) {
                $this->view->assign('error', 'Неверный логин и пароль');
            }

            if ($user) {
                if ($user->getPassword() != UserModel::getPasswordHash($password)) {
                    $this->view->assign('error', 'Неверный логин и пароль');
                } else {
                    $_SESSION['id'] = $user->getId();
                    $this->redirect('/post/index');
                }
            }
        }

        return $this->view->render('User/register.phtml', [
            'user' => UserModel::getById((int) $_GET['id'])
        ]);
    }
    public function registerAction()
    {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $password2 = trim($_POST['password2']);

        $success = true;
        if (isset($_POST['name'])) {

            if (!$name) {
                $this->view->assign('error', 'Имя не может быть пустым');
                $success = false;
            }

            if (!$email) {
                $this->view->assign('error', 'Email не может быть пустым');
                $success = false;
            }

            if (!$password) {
                $this->view->assign('error', 'Пароль не может быть пустым');
                $success = false;
            } elseif (iconv_strlen($password) < 4) {
                $this->view->assign('error', 'Длина пароля не может быть менее 4-ех символов');
                $success = false;
            } elseif (!$password2) {
                $this->view->assign('error', 'Пароль необходимо повторить');
                $success = false;
            } elseif ($password2!==$password) {
                $this->view->assign('error', 'Пароли не совпадают');
                $success = false;
            }

            $user = UserModel::getByEmail($email);
            if ($user) {
                $this->view->assign('error', 'Пользователь с таким email уже существует');
                $success = false;
            }

            if ($success) {
                $user = (new UserModel())
                    ->setName($name)
                    ->setEmail($email)
                    ->setPassword(UserModel::getPasswordHash($password))
                    ->setCreatedAt(date('Y-m-d'));

                $user->save();

                $_SESSION['id'] = $user->getId();
                $this->setUser($user);

                $this->redirect('/post/index');
            }
        }

        return $this->view->render('User/register.phtml', [
            'user' => UserModel::getById((int) $_GET['id'])
        ]);

    }

    public function profileAction()
    {
        return $this->view->render('User/profile.phtml', [
                        'user' => $this->user
        ]);

    }


    public function editAction()
    {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $password2 = trim($_POST['password2']);
        $id = (int)$_SESSION['id'];

        $success = true;

        if (isset($_POST['password'])) {

            if (!$name) {
                $this->view->assign('error', 'Имя не может быть пустым');
                $success = false;
            }

            if (!$email) {
                $this->view->assign('error', 'Email не может быть пустым');
                $success = false;
            }

            $user = UserModel::checkEmail($email, $id);
            if ($user) {
                $this->view->assign('error', "Пользователь с email $email уже существует");
                $success = false;
            }

            if (!$password) {
                $this->view->assign('error', 'Пароль не может быть пустым');
                $success = false;
            } elseif (iconv_strlen($password) < 4) {
                $this->view->assign('error', 'Длина пароля не может быть менее 4-ех символов');
                $success = false;
            } elseif (!$password2) {
                $this->view->assign('error', 'Пароль необходимо повторить');
                $success = false;
            } elseif ($password2!==$password) {
                $this->view->assign('error', 'Пароли не совпадают');
                $success = false;
            }

            if ($success) {
                $this->user->setName($name);
                $this->user->setEmail($email);
                $this->user->setPassword(UserModel::getPasswordHash($password));

                $this->user->edit();

                $this->redirect('/user/profile');

            }
        }

        return $this->view->render('User/edit.phtml', [
            'user' => $this->user
        ]);

    }

    public function logoutAction()
    {
        session_destroy();

        $this->redirect('/user/login');

    }
}
