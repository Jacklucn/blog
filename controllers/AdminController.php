<?php
/**
 * Created by PhpStorm.
 * User: jacklu
 * Date: 2018/2/26
 * Time: 下午3:44
 */

namespace app\controllers;


use yii\web\Controller;

class AdminController extends Controller
{
    public $layout = false;

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        return $this->render('login');
    }

    public function actionTable()
    {
        return $this->render('tables');
    }

    public function actionAdd()
    {
        return $this->render('add');
    }
}