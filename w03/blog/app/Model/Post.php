<?php
namespace App\Model;

use Base\AbstractModel;
use Base\Db;

class Post extends AbstractModel
{
    private $id;
    private $user_name;
    private $user_id;
    private $text;
    private $image;
    private $posted_at;


    public function __construct($data = [])
    {
        if ($data) {
            $this->id = $data['id'];
            $this->user_id = $data['user_id'];
            $this->user_name = $data['user_name'];
            $this->text = $data['text'];
            $this->image = $data['image'];
            $this->posted_at = $data['posted_at'];
        }
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text)
    {
        $this->text = $text;
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
        return $this;
    }

    public function getPostedAt(): string
    {
        return $this->posted_at;
    }

    public function setPostedAt(string $posted_at)
    {
        $this->posted_at = $posted_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setPostId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getUserName(): string
    {
        return $this->user_name;
    }

    /**
     * @param mixed $user_name
     */
    public function setUserName(string $user_name): self
    {
        $this->user_name = $user_name;
        return $this;
    }

    public function save()
    {
        $db = Db::getInstance();
        $insert = "INSERT INTO posts (`user_id`, `text`, `posted_at`, `image`) VALUES (
            :user_id, :text, :postedAt, :image
        )";
        $db->exec($insert, __METHOD__, [
            'user_id' => $this->user_id,
            'text' => $this->text,
            'postedAt' => $this->posted_at,
            'image' => $this->image
        ]);

        $id = $db->lastInsertId();
        $this->id = $id;

        return $id;
    }

    public static function delete(int $id)
    {
        $db = Db::getInstance();
        $insert = "DELETE FROM posts WHERE `id`= :id";
        $db->exec($insert, __METHOD__, [
            'id' => $id
        ]);
    }

    public static function getResentPosts(int $maks): array
    {
        $db = Db::getInstance();
        $select = "
            SELECT
                posts.id,
                posts.text,
                posts.posted_at,
                posts.image,
                users.name
            FROM
                `posts`
            LEFT JOIN users ON posts.user_id = users.id
            ORDER BY
                id
            DESC
            LIMIT $maks;
            ";
        $data = $db->fetchAll($select, __METHOD__, [
         //   'maks' => $maks //метод подстановки значения выдает ошибку синтаксиса SQL
        ]);

        if (!$data) {
            return [];
        }

        $posts =[];
        foreach ($data as $elem) {
            $post = new self($elem);
            $post->id = $elem['id'];
            $post->text = $elem['text'];
            $post->image = $elem['image'];
            $post->posted_at = $elem['posted_at'];
            $post->user_name = $elem['name'];
            $posts[] = $post;
        }

        return $posts;
    }

    public static function getUserPosts(int $user_id, int $posts): array
    {
        $db = Db::getInstance();
        $select = "
            SELECT
                posts.id,
                posts.text,
                posts.posted_at,
                posts.image,
                users.name
            FROM
                `posts`
            LEFT JOIN users ON posts.user_id = users.id
            WHERE
                user_id = :user_id
            ORDER BY
                id
            DESC
            LIMIT $posts;
            ";
        $data = $db->fetchAll($select, __METHOD__, [
            'user_id' => $user_id
        ]);

        if (!$data) {
            return [];
        }

        $posts =[];
        foreach ($data as $elem) {
            $posts[] = $elem;
        }

        return $posts;
    }

}
