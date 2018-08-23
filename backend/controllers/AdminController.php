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
use common\models\Upload;
use phpDocumentor\Reflection\Types\Null_;
use xj\uploadify\UploadAction;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;

class AdminController extends Controller
{
    /**
     * 默认继承模板
     * @var string
     */
    public $layout = 'admin_layout.php';

    public function actions()
    {
        return [
            's-upload' => [
                'class' => UploadAction::className(),
                'basePath' => '@webroot/upload',
                'baseUrl' => '@web/upload',
                'enableCsrf' => true, // default
                'postFieldName' => 'Filedata', // default
                //BEGIN CLOSURE BY TIME
                'format' => function (UploadAction $action) {
                    $fileext = $action->uploadfile->getExtension();
                    $filehash = sha1(uniqid() . time());
                    $p1 = substr($filehash, 0, 2);
                    $p2 = substr($filehash, 2, 2);
                    return "{$p1}/{$p2}/{$filehash}.{$fileext}";
                },
                //END CLOSURE BY TIME
                'validateOptions' => [
                    'extensions' => ['jpg', 'png'],
                    'maxSize' => 1 * 1024 * 1024, //file size
                ],
                'beforeValidate' => function (UploadAction $action) {
                    //throw new Exception('test error');
                },
                'afterValidate' => function (UploadAction $action) {
                },
                'beforeSave' => function (UploadAction $action) {
                },
                'afterSave' => function (UploadAction $action) {
                    $action->output['fileUrl'] = $action->getWebUrl();
                    $action->getFilename(); // "image/yyyymmddtimerand.jpg"
                    $action->getWebUrl(); //  "baseUrl + filename, /upload/image/yyyymmddtimerand.jpg"
                    $action->getSavePath(); // "/var/www/htdocs/upload/image/yyyymmddtimerand.jpg"
                },
            ],
        ];
    }

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

    public function actionUpload()
    {
        $model = new Upload();
        $uploadSuccessPath = "";
        if (\Yii::$app->request->isPost) {
            $model->coverImage = UploadedFile::getInstance($model, "coverImage");
            //文件上传存放的目录
            $dir = "../web/uploads/" . date("Ymd");
            if (!is_dir($dir)) {
                mkdir($dir);
                chmod($dir, 777);
            }
            if ($model->validate('coverImage')) {
                //文件名
                $fileName = date("HiiHsHis") . $model->coverImage->baseName . "." . $model->coverImage->extension;
                $dir = $dir . "/" . $fileName;
                $model->coverImage->saveAs($dir);
                $uploadSuccessPath = "/uploads/" . date("Ymd") . "/" . $fileName;
            }
        }
        var_dump($uploadSuccessPath);
    }

    /**
     * 对文章的添加和修改
     * @param int $id
     * @return string|Response
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\Exception
     * @throws \yii\db\StaleObjectException
     */
    public function actionForms($id = 0)
    {
        $model = new Article();
        if (\Yii::$app->request->isPost) {
            $request = \Yii::$app->request;
            $session = \Yii::$app->session;
            $transaction = \Yii::$app->db->beginTransaction();
            $id = $_POST['Article']['id'];
            if ($id) {
                $model = Article::findOne($id);
            }
            if (!$model->load($request->post()) || !$model->save()) {
                $transaction->rollBack();
                $session->setFlash('error', '文章保存失败！');
                return $this->redirect(['forms']);
            }
            $category_ids = $request->post('category_ids');
            $access_model = new ArticleCategoryAccess();
            $article_id = $model->id;
            // 有选择标签且是修改文章的时候
            if ($category_ids && $id) {
                $access = $access_model->getAccessByArticleId($id);
                // 文章已经有标签存在
                if ($access) {
                    // 删除取消选择的关系记录
                    foreach ($access as $value) {
                        if (!in_array($value['category_id'], $category_ids)) {
                            $access = ArticleCategoryAccess::findOne($value['id']);
                            if ($access && $access->delete()) {
                                continue;
                            } else {
                                $transaction->rollBack();
                                $session->setFlash('error', '文章保存失败！');
                                return $this->redirect(['forms', 'id' => $id]);
                            }
                        }
                    }
                }
                // 删除处理完成之后再获取一次关系记录
                $access = $access_model->getAccessByArticleId($id);
                if ($access) {
                    $access_category = array_column($access, 'category_id');
                    foreach ($category_ids as $value) {
                        // 判断如果当前关系不存在则添加
                        if (!in_array($value, $access_category)) {
                            $access_result = $access_model->saveAccess($article_id, $value);
                            if (!$access_result) {
                                $transaction->rollBack();
                                $session->setFlash('error', '文章保存失败！');
                                return $this->redirect(['forms', 'id' => $id]);
                            }
                        }
                    }
                    $transaction->commit();
                    $session->setFlash('success', '文章保存成功！');
                    return $this->redirect(['tables']);
                }
            }
            // 文章目前没有任何标签的时候当作添加文章时处理
            foreach ($request->post('category_ids') as $value) {
                $access_result = $access_model->saveAccess($article_id, $value);
                if (!$access_result) {
                    $transaction->rollBack();
                    $session->setFlash('error', '文章保存失败！');
                    return $this->redirect(['forms']);
                }
            }
            $transaction->commit();
            $session->setFlash('success', '文章保存成功！');
            return $this->redirect(['tables']);
        }
        $category_list = Category::find()->asArray()->all();
        $article = NULL;
        if ($id) {
            $article = Article::findOne($id);
        }
        return $this->render('forms', [
            'model' => $model,
            'article' => $article,
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