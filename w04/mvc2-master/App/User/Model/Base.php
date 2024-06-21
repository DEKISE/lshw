<?php
namespace App\User\Model;

use Base\Context;
use Base\Model\ModelAbstract;
use Base\Session;

class Base extends ModelAbstract
{
    protected $_name;
    protected $_id;
    protected $_email;
    protected $_passwordHash;
    protected $_password;
    protected $_createdAt;

    public function __construct()
    {
    }

    public function getName()
    {
        return $this->_name;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @return mixed
     */
    public function getPasswordHash()
    {
        return $this->_passwordHash;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->_createdAt;
    }

    public function getTable()
    {
       return 'users';
    }

    public function initByDbData(array $data)
    {
        $this->_id = $data['id'];
        $this->_name = $data['name'];
        $this->_email = $data['email'];
        $this->_passwordHash = $data['password_hash'];
        $this->_createdAt = $data['created_at'];
    }

    public function initByData($data)
    {
        $this->_email = $data['email'];
        $this->_password = $data['password'];
    }

    public function setName($name)
    {
        $this->_name = $name;
    }

    public function saveToDb()
    {
        $db = Context::getInstance()->getDbConnection();
        $table = $this->getTable();
        $passwordHash = $this->generatePasswordHash();
        $date = date('Y-m-d H:i:s', time());
        $insert = "INSERT INTO $table (`name`, email, password_hash, created_at)
          VALUES(:name, :email, '$passwordHash', '$date')";

        return $db->exec($insert, __METHOD__, [
            ':name' => $this->_name,
            ':email' => $this->_email
        ]);
    }

    public function updateInDb()
    {

        $db = Context::getInstance()->getDbConnection();
        $table = $this->getTable();
        $passwordHash = $this->generatePasswordHash();
        $update = "UPDATE $table SET `name` = :name, `email` = :email, `password_hash` = :password_hash WHERE `id`=:id";

        return $db->exec($update, __METHOD__, [
            ':name' => $this->_name,
            ':email' => $this->_email,
            ':password_hash' => $passwordHash,
            ':id' => $this->_id
        ]);
    }

    public function generatePasswordHash()
    {
        $salt = ',.fdf4';
//        $hash = sha1($salt . '_' . $this->_password);
        $hash = sha1($salt . $this->_password);
        return $hash;
    }

    /**
     * @throws \Base\Exception
     */
    public function authorize()
    {
        $db = Context::getInstance()->getDbConnection();
        $select = "SELECT * FROM users WHERE `email` = :email AND password_hash = :password_hash";
        $data = $db->fetchOne($select, __METHOD__, [
            ':email' => $this->_email,
            ':password_hash' => $this->generatePasswordHash()
        ]);
        if ($data) {
            $session = Session::instance();
            $session->save((int)$data['id']);
            return true;
        }

        return false;
    }

    public static function checkEmail(string $email)
    {
        $db = Context::getInstance()->getDbConnection();

        $idStr = '';
        if (func_num_args() > 1) {
            $id =  func_get_arg(1);
            if (is_int($id)) {
                $idStr = " AND `id` != $id";
            }
        }
        $select = "SELECT email FROM users WHERE `email` = :email{$idStr}";
        $data = $db->fetchOne($select, __METHOD__, [
            ':email' => $email,
        ]);

        if (!$data) {
            return null;
        }

        return $data['email'];
    }

    public function isAdmin(): bool
    {
        return in_array($this->_id, ADMIN_IDS);
    }

}