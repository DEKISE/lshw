<?php
namespace App\User\Model;

use App\Main\Model\Post;
use Base\Context;
use Base\Session;
use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    public $table = "users";
    protected $primaryKey = 'id';
    protected $connection = CONNECTION_DEFAULT;

    protected $fillable = [
        'name',
        'email',
        'password_hash',
        'password'];//разрешено редактировать только это, остальное запрещено
//    protected $guarded = ['id']; //запрещено редактировать только это, все остальное разрешено

    public function posts()
    {
        // users.id == posts.user_id
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function initByData($data)
    {
        $this->email = $data['email'];
        $this->password = $data['password'];
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function saveToDb()
    {

        $passwordHash = $this->generatePasswordHash();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'password_hash' => $passwordHash
            ];
        Base::create($data);

    }

    public function updateInDb()
    {

        $passwordHash = $this->generatePasswordHash();

        $user = Base::find($this->getId());
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password_hash = $passwordHash;
        $user->save();
    }

    public function generatePasswordHash()
    {
        $salt = ',.fdf4';
        $hash = sha1($salt . '_' . $this->password);
        return $hash;
    }

    /**
     * @throws \Base\Exception
     */
    public function authorize()
    {
        $data = Base::query()->where([
            'email' => $this->getEmail(),
            'password_hash' => $this->generatePasswordHash()
            ])->first();
        if ($data) {
            $session = Session::instance();
            $session->save((int)$data['id']);
            return true;
        }

        return false;
    }

    public static function checkEmail(string $email)
    {

        if (func_num_args() > 1) {
            $id =  func_get_arg(1);
        }
        if (isset($id) && is_int($id) && $id > 0) {
            $data = Base::query()->where([
                'email' => $email
            ])->where('id', '!=', $id)->first();
        } else {
            $data = Base::query()->where([
                'email' => $email
            ])->first();
        }

        if (!$data) {
            return null;
        }

        return $data['email'];
    }

    public static function deleteUser(int $userId)
    {
        Base::destroy($userId);
    }

    public function isAdmin(): bool
    {
        return in_array($this->id, ADMIN_IDS);
    }

}