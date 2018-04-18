<?php
/**
 * Created by PhpStorm.
 * User: jacklu
 * Date: 2018/4/13
 * Time: 下午5:19
 */

namespace backend\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            ['name', 'string', 'length' => [1, 10]],
            ['name', 'unique', 'targetClass' => '\backend\models\Category', 'message' => '已存在！'],
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