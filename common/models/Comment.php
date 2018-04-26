<?php
/**
 * Created by PhpStorm.
 * User: jacklu
 * Date: 2018/4/26
 * Time: 下午2:50
 */

namespace common\models;


use yii\db\ActiveRecord;

class Comment extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nickname', 'email', 'article_id'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            ['url', 'string'],
            ['content', 'string'],
            // verifyCode needs to be entered correctly
//            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return bool
     */
    public function afterValidate()
    {
        parent::afterValidate();
        $this->created_at = time();
        $this->updated_at = time();
        return true;
    }
}