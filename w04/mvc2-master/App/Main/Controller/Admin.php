<?php

namespace App\Main\Controller;

use App\Main\Model\Post;
use Base\Context;
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
        echo "Admin";
    }

    public function deleteMessageAction()
    {
        $messageId = (int) $_GET['id'];
        Post::deleteMessage($messageId);
        $this->redirect('/');
    }
}