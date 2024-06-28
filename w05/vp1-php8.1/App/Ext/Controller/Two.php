<?php
namespace App\Ext\Controller;

use Base\Exception;
use GUMP;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Typography\FontFactory;

class Two extends \Base\ControllerAbstract
{

    protected static $_imagePath;

    public function preAction()
    {
        parent::preAction();
        $this->noRender();
        self::$_imagePath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'images/';
    }

    /**
     * @throws Exception
     */
    public function indexAction()
    {
        $this->redirect('/ext/two/gump');
    }

    public function gumpAction()
    {
        $this->noRender();

        $data = [
            'username'    => 'sdfasfsadf',
            'password'    =>  'ывраыаф',
            'email'       =>  'darazum@mail.ru',
            'gender'      =>  'f',
            'credit_card' =>  '52df3 2437 3988 8083',
            'url'         => '://vk.com',
            'ip'          => '123.123.123.2152'
        ];

        $validated = GUMP::is_valid($data, array(
            'username'    => 'required|alpha_numeric|max_len,100|min_len,6',
            'password'    => 'required|max_len,100|min_len,6',
            'email'       => 'required|valid_email',
            'gender'      => 'required|exact_len,1|contains,m f',
            'credit_card' => 'required|valid_cc',
            'ip'          => 'valid_ip',
            'url'         => 'valid_url'
        ));

        if($validated === true) {
            echo "Valid Street Address!";
        } else {
            var_dump($validated);
        }
    }

    /**
     * Изменяет размер картинки
     */
    public function imageAction()
    {
        $source = self::$_imagePath . 'saturn.jpg';
        $result = self::$_imagePath . 'saturn_new.jpg';
        // create image manager with desired driver
        $manager = new ImageManager(new Driver());
        // read image from file system
        $image = $manager->read($source);
        // resize image proportionally to 200px width
        $image->scale(width: 200);
        // insert watermark
        self::watermark($image);

        $image->save($result, 100);


        echo "Image successfully saved!";
        echo "<br><img src='/images/saturn_new.jpg'>";
    }

    /**
     * Наносит watermark
     */
    public static function watermark($image)
    {
        $image->text("mark", 70, 70,
            function (FontFactory $font) {
                $font->filename(self::$_imagePath . 'arial.ttf');
                $font->size(50);
                $font->color('fff');
                $font->stroke('ff5500', 2);
                $font->align('center');
                $font->valign('middle');
                $font->lineHeight(1.6);
                $font->angle(10);
                $font->wrap(250);
        });
    }
}