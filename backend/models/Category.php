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
            [['name'], 'required', 'message' => '分类名不能为空！'],
            ['name', 'string', 'length' => [1, 6]],
            ['created_at', 'default', 'value' => time()],
            ['updated_at', 'default', 'value' => time()]
        ];
    }
}