<?php
namespace App\Main\Model;

use Base\Model\ModelAbstract;
use Base\Context as Context;

class Post extends ModelAbstract
{
    protected $_id;
    protected $_text;
    protected $_userId;
    protected $_createdAt;
    protected $_image;

    public function __construct()
    {
    }

    public function getText()
    {
        return $this->_text;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getUserId()
    {
        return $this->_userId;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->_createdAt;
    }

    public function getImage()
    {
        return $this->_image;
    }

    public function setImage(string $image)
    {
        $this->_image = $image;
    }

    public function getTable()
    {
        return 'posts';
    }

    public function initByDbData(array $data)
    {
        $this->_id = $data['id'];
        $this->_text = $data['text'];
        $this->_userId = $data['user_id'];
        $this->_createdAt = $data['created_at'];
        $this->_image = $data['image'];
    }

    public function initByData(array $data)
    {
        $this->_userId = $data['user_id'];
        $this->_text = $data['text'];
        $this->_image = $data['image'];
    }

    public function loadFile(string $file)
    {
        if (file_exists($file)) {
            $this->_image = $this->genFileName();
            move_uploaded_file($file,getcwd() . '/images/' . $this->_image);
       #     chmod(getcwd() . '/images/' . $this->_image, 0777);
        }
    }

    private function genFileName()
    {
        return sha1(microtime(1) . mt_rand(1, 100000000)) . '.jpg';
    }

    public function saveToDb()
    {
        $db = Context::getInstance()->getDbConnection();
        $table = $this->getTable();
        $date = date('Y-m-d H:i:s', time());
        $insert = "INSERT INTO $table (user_id, `text`, created_at, image)
          VALUES(:user_id, :text, '$date', :image)";

        return $db->exec($insert, __METHOD__, [
            ':text' => $this->_text,
            ':user_id' => $this->_userId,
            ':image' => $this->_image
        ]);
    }

    public static function deleteMessage(int $messageId)
    {
        $db = Context::getInstance()->getDbConnection();
        $model = new Post();
        $table = $model->getTable(); //сделать этот метод static?
        $delete = "DELETE FROM $table WHERE id = $messageId";
        return $db->exec($delete, __METHOD__);
    }

}
