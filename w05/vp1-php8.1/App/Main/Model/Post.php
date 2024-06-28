<?php
namespace App\Main\Model;
use Illuminate\Database\Eloquent\Model;
use Base\Context as Context;
use App\User\Model\Base;

class Post extends Model
{
    public $table = "posts";
    protected $primaryKey = 'id';
    protected $connection = CONNECTION_SECOND;

    protected $fillable = [
        'user_id',
        'text',
        'image'
    ];

    public function userdata()
    {
        return $this->belongsTo(Base::class, 'user_id', 'id');
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }

    public function initByData(array $data)
    {
        $this->user_id = $data['user_id'];
        $this->text = $data['text'];
    }

    public function loadFile(string $file)
    {
        if (file_exists($file)) {
            $this->image = $this->genFileName();
            move_uploaded_file($file,getcwd() . '/images/' . $this->image);
            chmod(getcwd() . '/images/' . $this->image, 0777);
        }
    }

    private function genFileName()
    {
        return sha1(microtime(1) . mt_rand(1, 100000000)) . '.jpg';
    }

    public function saveToDb()
    {

        $data = [
            'text' => $this->text,
            'user_id' => $this->user_id,
            'image' => $this->image
        ];
        Post::create($data);

    }
    public static function deleteMessage(int $messageId)
    {
        Post::destroy($messageId);
    }

}
