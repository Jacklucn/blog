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
            [['name', 'created_at', 'updated_at'], 'required'],
            ['name', 'string', 'length' => [1, 6]],
            ['name', 'unique', 'targetClass' => '\backend\models\Category', 'message' => '已存在！'],
        ];
    }
}