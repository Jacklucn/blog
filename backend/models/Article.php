<?php
/**
 * Created by PhpStorm.
 * User: jacklu
 * Date: 2018/4/17
 * Time: 下午1:32
 */

namespace backend\models;


use yii\db\ActiveRecord;

class Article extends ActiveRecord
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['title', 'summary', 'content', 'sort'], 'required'],
            ['title', 'string', 'length' => [1, 15]],
            ['sort', 'integer', 'max' => 99, 'min' => 1],
            ['title', 'unique', 'targetClass' => '\backend\models\Article', 'message' => '已存在！'],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasMany(ArticleCategoryAccess::className(), ['article_id' => 'id'])->select('article_id,category_id');
    }
}