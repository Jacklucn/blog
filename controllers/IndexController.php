<?php
/**
 * Author: jacklu
 * Date: 2017/4/19
 * Time: 15:54
 * Comment:
 */

namespace app\controllers;


use app\models\Article;
use yii\data\Pagination;
use yii\web\Controller;

class IndexController extends Controller
{
    public function actionIndex()
    {
        $query = Article::find()->where(['is_show' => 1]);
        $count = $query->count();
        $pagination = new Pagination([
            'totalCount' => $count,
            'pageSize' => \Yii::$app->params['pageSize'],
        ]);
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('index', [
            'articles' => $articles,
            'pagination' => $pagination

        ]);
    }

    public function actionDetail()
    {
        return $this->render('detail', [

        ]);
    }
}