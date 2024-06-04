<?php
namespace App\Controller;
use App\Model\Post as PostModel;
use App\Model\User as UserModel;
use Base\AbstractController;

class Post extends AbstractController
{
    function indexAction()
    {
        if (!$this->user) {
            $this->redirect('/user/register');
        }

        if ($this->user->getId() == ADMIN) {
            $this->redirect('/post/admin');
        }

        $posts = PostModel::getResentPosts(20);

        return $this->view->render('Post/index.phtml', [
            'user' => $this->user,
            'posts' => $posts
        ]);
    }

    function adminAction()
    {
        if (!$this->user) {
            $this->redirect('/user/register');
        }

        $posts = PostModel::getResentPosts(99999999999);

        return $this->view->render('Post/admin.phtml', [
            'user' => $this->user,
            'posts' => $posts
        ]);
    }

    public function deleteAction()
    {

        $id = trim($_POST['id']);
        $success = true;
            if ($success) {
                PostModel::delete($id);
                $this->redirect('/post/admin');
            }
    }

    public function sendAction()
    {
        $text = trim($_POST['text']);
        $linkinbase='';
        $success = true;
        if (isset($_POST['text'])) {

            if (!$text) {
                $this->view->assign('error', 'Сообщение не может быть пустым');
                $success = false;
            }

            if (is_uploaded_file($_FILES['user_file']['tmp_name'])) {
                $uploaddir = '/srv/blog/html/upload/';
                $uploadfile = $uploaddir . basename($_FILES['user_file']['name']);
                move_uploaded_file($_FILES['user_file']['tmp_name'], $uploadfile);
                chmod($uploadfile, 0777);
                $linkinbase='/upload/'. basename($_FILES['user_file']['name']);
            }

            if ($success) {
                $post = (new PostModel())
                    ->setUserID($this->user->getId())
                    ->setText($text)
                    ->setPostedAt(date('Y-m-d'))
                    ->setImage($linkinbase);

                $post->save();
                $this->redirect('/post/index');
            }
        }
    }

    function jsonAction()
    {
        $user_id = trim($_GET['user_id']);
        $posts = trim($_GET['posts']);
        $success = true;

        if ($this->user->getId() != ADMIN) {
            echo 'You are not allowed to do this';
            $success = false;
        }

        if (!$user_id) {
            echo 'Укажите id пользователя';
            $success = false;
        } elseif (!UserModel::getById($user_id)) {
            echo 'Такого пользователя не существует';
            $success = false;
        } elseif (!$posts) {
            echo 'Укажите количестово постов';
            $success = false;
        }

        if ($success) {

            $json = PostModel::getUserPosts($user_id, $posts);
            $json = json_encode($json);
            echo $json;
        }
    }

}
