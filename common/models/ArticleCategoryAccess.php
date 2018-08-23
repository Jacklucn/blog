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

    /**
     * @param $id
     * @return array|ActiveRecord[]
     */
    public function getAccessByArticleId($id)
    {
        return $this::find()->select('id,article_id,category_id')->where(['article_id' => $id])->asArray()->all();
    }

    /**
     * @param $article_id
     * @param $category_id
     * @return bool
     */
    public function saveAccess($article_id, $category_id)
    {
        $access_model = new ArticleCategoryAccess();
        $access_model->article_id = $article_id;
        $access_model->category_id = $category_id;
        $access_model->created_at = time();
        return $access_model->save();
    }
}