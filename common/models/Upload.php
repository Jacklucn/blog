<?php
/**
 * Created by PhpStorm.
 * User: jacklu
 * Date: 2018/5/9
 * Time: 下午5:21
 */

namespace common\models;


use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Upload extends ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $coverImage;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['coverImage'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
}