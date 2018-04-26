<?php
/**
 * Created by PhpStorm.
 * User: jacklu
 * Date: 2018/4/17
 * Time: 下午2:17
 */

namespace common\models;


use yii\db\ActiveRecord;

class ArticleCategoryAccess extends ActiveRecord
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory_name()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id'])->select('id,name');
    }
}