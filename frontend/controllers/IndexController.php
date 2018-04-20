<?php
/**
 * Created by PhpStorm.
 * User: jacklu
 * Date: 2018/4/13
 * Time: 下午1:00
 */

namespace frontend\controllers;


use backend\models\Article;
use yii\data\Pagination;
use yii\web\Controller;

class IndexController extends Controller
{
    public $layout = 'index_layout';

    /**
     * 首页
     * @return string
     */
    public function actionIndex()
    {
        $model = new Article();
        $page = new Pagination(['totalCount' => $model::find()->count()]);
        $list = $model::find()
            ->select('a.id,a.cover_image,a.title,a.summary,a.read_count,a.status,a.sort,a.created_at,a.updated_at')
            ->offset($page->offset)
            ->limit($page->limit)
            ->alias('a')
            ->all();
        return $this->render('index', [
            'model' => $model,
            'pages' => $page,
            'list' => $list
        ]);
    }

    /**
     * 文章
     * @return string
     */
    public function actionArticle()
    {
        $id = \Yii::$app->request->get('id');
//        if (!$id) {
//
//        }
        $model = new Article();
        $article = $model::findOne($id);
        $prev_article = $model::find()
            ->select('id,title')
            ->where(['status' => '1'])
            ->andwhere(['<', 'id', $id])
            ->orderBy(['id' => SORT_DESC])
            ->limit(1)
            ->one();
        $next_article = $model::find()
            ->select('id,title')
            ->where(['status' => '1'])
            ->andwhere(['>', 'id', $id])
            ->orderBy(['id' => SORT_ASC])
            ->limit(1)
            ->one();
        return $this->render('article', [
            'article' => $article,
            'prev_article' => $prev_article,
            'next_article' => $next_article
        ]);
    }

    /**
     * 归档
     * @return string
     */
    public function actionArchives()
    {
        $model = new Article();
        $years = $model::find()
            ->select('year')
            ->groupBy('year')
            ->where(['status' => 1])
            ->orderBy(['year' => SORT_DESC])
            ->all();
        return $this->render('archives', [
            'years' => $years
        ]);
    }

    /**
     * 关于
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}