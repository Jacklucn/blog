<?php
/**
 * Created by PhpStorm.
 * User: jacklu
 * Date: 2018/4/13
 * Time: 上午9:58
 */

namespace backend\controllers;


use backend\models\Article;
use backend\models\ArticleCategoryAccess;
use backend\models\Category;
use common\models\LoginForm;
use yii\data\Pagination;
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
        $model = new Article();
        $page = new Pagination(['totalCount' => $model::find()->count()]);
        $list = $model::find()
            ->select('a.id,a.cover_image,a.title,a.summary,a.read_count,a.status,a.sort,a.created_at,a.updated_at')
            ->offset($page->offset)
            ->limit($page->limit)
            ->alias('a')
            ->all();
        return $this->render('tables', [
            'model' => $model,
            'pages' => $page,
            'list' => $list
        ]);
    }

    /**
     * category
     * @return string
     */
    public function actionCategory()
    {
        $model = new Category();
        if (\Yii::$app->request->isPost) {
            $request = \Yii::$app->request;
            $session = \Yii::$app->session;
            if ($model->load($request->post()) && $model->save()) {
                $session->setFlash('success', '添加分类成功！');
            } else {
                $session->setFlash('error', '添加分类失败！');
            }
            return $this->redirect(['category']);
        }
        $page = new Pagination(['totalCount' => $model::find()->count()]);
        $list = $model::find()->offset($page->offset)->limit($page->limit)->all();
        return $this->render('category', [
            'model' => $model,
            'pages' => $page,
            'list' => $list
        ]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws \yii\db\Exception
     */
    public function actionForms()
    {
        $model = new Article();
        if (\Yii::$app->request->isPost) {
            $request = \Yii::$app->request;
            $session = \Yii::$app->session;
            $transaction = \Yii::$app->db->beginTransaction();
            if (!$model->load($request->post()) || !$model->save()) {
                $transaction->rollBack();
                $session->setFlash('error', '文章发布失败！');
                return $this->redirect(['forms']);
            }
            if ($request->post('category_ids')) {
                $article_id = $model->id;
                foreach ($request->post('category_ids') as $value) {
                    $article_category_access_model = new ArticleCategoryAccess();
                    $article_category_access_model->article_id = $article_id;
                    $article_category_access_model->category_id = $value;
                    $article_category_access_model->created_at = time();
                    $article_category_access_model->updated_at = time();
                    if (!$article_category_access_model->save()) {
                        $transaction->rollBack();
                        $session->setFlash('error', '文章发布失败！');
                        return $this->redirect(['forms']);
                    }
                }
            }
            $transaction->commit();
            $session->setFlash('success', '文章发布成功！');
            return $this->redirect(['tables']);
        }
        $category_list = Category::find()->asArray()->all();
        return $this->render('forms', [
            'model' => $model,
            'category_list' => $category_list
        ]);
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
     * @return string
     */
    public function actionError()
    {
        return $this->render('error');
    }
}