<?php
/**
 * Created by PhpStorm.
 * User: jacklu
 * Date: 2018/2/9
 * Time: 下午1:50
 */

namespace app\controllers;

use yii\web\Controller;

class BlogController extends Controller
{
    public $layout = false;

    /**
     * 首页
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 文章
     * @return string
     */
    public function actionArticle()
    {
        return $this->render('article');
    }

    /**
     * 归档
     * @return string
     */
    public function actionArchives()
    {
        return $this->render('archives');
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