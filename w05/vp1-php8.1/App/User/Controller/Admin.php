<?php

namespace App\User\Controller;

use App\User\Model\Base;
use Base\ControllerAbstract;

class Admin extends ControllerAbstract
{
    public function preAction()
    {
        parent::preAction();
        if(!$this->USER || !$this->USER->isAdmin()) {
            $this->redirect('/');
        }
    }

    public function indexAction()
    {
        $users = Base::query()->get();
        $this->view->users = $users;
        $this->view->user = $this->USER;
        $this->view->title = 'Администрирование пользователей';
        $this->view->setRenderType(2);
        $this->tpl = 'index.twig';
    }

    public function editUserAction()
    {
        if ((int) $_GET['id']){
            $id = (int) $_GET['id'];
            $user = Base::query()->where('id', '=', $id)->first();
        } else {
            $user = false;
        }
        $name = $this->p('name');
        $email = $this->p('email');
        $password = $this->p('password');
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
        } elseif (Base::checkEmail($email, $id)) {
            $error = "Пользователь с email $email уже существует";
            $success = false;
        } elseif (!$password) {
            $error =  'Не задан пароль';
            $success = false;
        } elseif (mb_strlen($password) < 5) {
            $error = 'Пароль слишком короткий';
            $success = false;
        }
        if ($success) {
            $user->setName($name);
            $user->initByData([
                'email' => $email,
                'password' => $password,
            ]);
            $user->updateInDb();
            $this->redirect('/admin/');
        }
        $this->view->user = $user;
        $this->view->title = 'Редактировать профиль';
        $this->view->error = $error;
        $this->view->setRenderType(2);
        $this->tpl = 'editUser.twig';
    }

    public function createUserAction()
    {
        $name = $this->p('name');
        $email = $this->p('email');
        $password = $this->p('password');
        $success = true;

        if (!$name) {
            $error =  'Не заданo имя';
            $success = false;
        } elseif (!$email) {
            $error =  'Не задан email';
            $success = false;
        } elseif (Base::checkEmail($email)) {
            $error = "Пользователь с email $email уже существует";
            $success = false;
        } elseif (!$password) {
            $error =  'Не задан пароль';
            $success = false;
        } elseif (mb_strlen($password) < 5) {
            $error =  'Пароль слишком короткий';
            $success = false;
        }
        if ($success) {
            $user = new Base();
            $user->setName($name);
            $user->initByData([
                'email' => $email,
                'password' => $password,
            ]);
            $user->saveToDb();
            $this->redirect('/admin/');
        }
        $this->view->title = 'Администрирование пользователей';
        $users = Base::query()->get();
        $this->view->users = $users;
        $this->view->error = $error;
        $this->view->setRenderType(2);
        $this->tpl = 'index.twig';
    }
    public function deleteUserAction()
    {
        $userId = (int) $_GET['id'];
        Base::deleteUser($userId);
        $this->redirect('/admin/');
    }

}