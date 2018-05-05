<?php
/**
 * Created by PhpStorm.
 * User: jacklu
 * Date: 2018/4/13
 * Time: 上午9:58
 */

namespace backend\controllers;


use common\models\Article;
use common\models\ArticleCategoryAccess;
use common\models\Category;
use common\models\LoginForm;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\Response;

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
//    public function beforeAction($action)
//    {
//        $path = \Yii::$app->request->pathInfo;
//        if (in_array($path, $this->ignoreList)) {
//            return true;
//        }
//        if (\Yii::$app->user->isGuest) {
//            return $this->redirect(['admin/login']);
//        } else {
//            return true;
//        }
//    }

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
            ->orderBy(['a.created_at' => SORT_DESC])
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
        $list = $model::find()->offset($page->offset)->limit($page->limit)->orderBy(['created_at' => SORT_DESC])->all();
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
     * 文章的隐藏和显示
     * @return array
     * @throws \yii\db\Exception
     */
    public function actionOperateArticle()
    {
        $id = \Yii::$app->request->post('id');
        $status = \Yii::$app->request->post('status');
        \Yii::$app->response->format = Response::FORMAT_JSON;
        if (!isset($id) || !isset($status)) {
            return ['code' => 109, 'message' => '错误的操作！'];
        }
        if (!\Yii::$app->db->createCommand()->update('article', ['status' => $status, 'updated_at' => time()], 'id = ' . $id)->execute()) {
            return ['code' => 110, 'message' => '错误的操作！'];
        }
        \Yii::$app->session->setFlash('success', '文章操作成功！');
        return ['code' => 200, 'message' => '操作成功'];
    }

    /**
     * 对标签的操作（删除）
     * @return array
     * @throws \yii\db\Exception
     */
    public function actionRemoveCategory()
    {
        $id = \Yii::$app->request->post('id');
        \Yii::$app->response->format = Response::FORMAT_JSON;
        if (!isset($id)) {
            return ['code' => 109, 'message' => '错误的操作！'];
        }
        if (ArticleCategoryAccess::find()->where(['category_id' => $id])->one()) {
            \Yii::$app->session->setFlash('error', '删除失败，正在被应用的标签或分类不允许被删除。');
            return ['code' => 200, 'message' => ''];
        }
        if (!\Yii::$app->db->createCommand()->delete('category', 'id = ' . $id)->execute()) {
            return ['code' => 110, 'message' => '错误的操作！'];
        }
        \Yii::$app->session->setFlash('success', '标签删除成功！');
        return ['code' => 200, 'message' => '操作成功'];
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
        $this->layout = false;
        return $this->render('404');
    }
}