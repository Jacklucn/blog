<?php
/**
 * Created by PhpStorm.
 * User: jacklu
 * Date: 2018/4/13
 * Time: 上午9:58
 */

namespace backend\controllers;


use backend\models\Category;
use common\models\LoginForm;
use yii\web\Controller;

class AdminController extends Controller
{
    /**
     * 默认继承模板
     * @var string
     */
    public $layout = 'admin_layout.php';

    /**
     * 忽略列表
     * @var array
     */
    private $ignoreList = [
        'admin/login',
        'admin/logout',
    ];

    /**
     * 在程序执行之前，对访问的方法进行权限验证.
     * @param \yii\base\Action $action
     * @return mixed
     */
    public function beforeAction($action)
    {
        $path = \Yii::$app->request->pathInfo;
        if (in_array($path, $this->ignoreList)) {
            return true;
        }
        if (\Yii::$app->user->isGuest) {
            return $this->redirect(['admin/login']);
        } else {
            return true;
        }
    }

    /**
     * 登录
     * @return string|\yii\web\Response
     */
    public function actionLogin()
    {
        $this->layout = false;
        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['admin/index']);
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * 退出登录
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        \Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * 首页
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * article list
     * @return string
     */
    public function actionTables()
    {
        return $this->render('tables');
    }

    /**
     * category list
     * @return string
     */
    public function actionCategory()
    {
        return $this->render('category');
    }

    /**
     * Forms
     * @return string
     */
    public function actionForms()
    {
        return $this->render('forms');
    }

    /**
     * Blank
     * @return string
     */
    public function actionBlank()
    {
        return $this->render('blank');
    }

    /**
     * @return \yii\web\Response
     */
    public function actionAddCategory()
    {
        $request = \Yii::$app->request;
        $session = \Yii::$app->session;
        if ($request->isPost) {
            $model = new Category();
            if ($model->load($request->post()) && $model->save()) {
                $session->addFlash('success', '添加分类标签成功！');
                return $this->redirect(['category']);
            }
        }
        return $this->redirect(['category']);
    }
}